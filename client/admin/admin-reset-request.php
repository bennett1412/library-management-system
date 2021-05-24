<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;


require '../phpMailer/vendor/autoload.php';

if (isset($_POST["reset-request-submit"])) {
    $selector = bin2hex(random_bytes(8));
    $token = random_bytes(32);
    //check the url afterwards
    $url = "http://localhost/lib-man-proj/client/admin/admin-create-new-password.php?selector=" . $selector . "&validator=" . bin2hex($token);
    $expires = date("U") + 900;
    //http://localhost/lib-man-proj/login.php
    require "../../server/db_connect.php";

    $adminEmail = $_POST["email"];
    //VD?3gBTf%5n3xMw(
    $sql = "DELETE FROM pwdReset WHERE pwdResetEmail = ?;";
    $stmt = mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt, $sql)) {
        echo "There was an error!";
        exit();
    } else {
        mysqli_stmt_bind_param($stmt, "s", $adminEmail);
        mysqli_stmt_execute($stmt);
    }

    $sql = "INSERT INTO pwdreset(pwdResetEmail , pwdResetSelector , pwdResetToken , pwdResetExpires) VALUES (? , ? , ? , ?);";

    $stmt = mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt, $sql)) {
        echo "There was an error!";
        exit();
    } else {
        $hashedToken = password_hash($token, PASSWORD_DEFAULT);
        mysqli_stmt_bind_param($stmt, "ssss", $adminEmail, $selector, $hashedToken, $expires);
        mysqli_stmt_execute($stmt);
    }

    mysqli_stmt_close($stmt);
    mysqli_close($conn);
    $message = 'We recieved password reset request. The link to reset your password is given as follows. If you didnt make this request, you can ignore this email.';
    $message .= " Here is your password reset link: ";
    $message .=  $url;
    $mail = new PHPMailer();
    $mail->isSMTP();
    $mail->Host = 'smtp.gmail.com';
    $mail->Port = '587';
    $mail->SMTPAuth = true;
    $mail->SMTPSecure = 'tls';
    $mail->Username = 'libme.library.system@gmail.com';
    $mail->Password = 'khiladinoek123';
    $mail->setFrom('no-reply@libMe.com');
    $mail->Subject = "Reset your password";
    $mail->Body = $message;
    $mail->addAddress($adminEmail);

    if (!$mail->send()) {
        echo 'Mailer Error: ' . $mail->ErrorInfo;
    } else {
        //echo 'Message sent!';
        //Section 2: IMAP
        //Uncomment these to save your message in the 'Sent Mail' folder.
        #if (save_mail($mail)) {
        #    echo "Message saved!";
        #}
        header("Location: admin-reset-password.php?reset=success");
    }
} else {
    header("Location: admin-login.php");
}
