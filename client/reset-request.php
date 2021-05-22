<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;


require 'phpMailer/vendor/autoload.php';

if (isset($_POST["reset-request-submit"])) {
    $selector = bin2hex(random_bytes(8));
    $token = random_bytes(32);
    //check the url afterwards
    $url = "http://localhost/lib-man-proj/client/create-new-password.php?selector=" . $selector . "&validator=" . bin2hex($token);
    $expires = date("U") + 900;
    //http://localhost/lib-man-proj/login.php
    require "../server/db_connect.php";

    $userEmail = $_POST["email"];
    //VD?3gBTf%5n3xMw(
    $sql = "DELETE FROM pwdReset WHERE pwdResetEmail = ?;";
    $stmt = mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt, $sql)) {
        echo "There was an error!";
        exit();
    } else {
        mysqli_stmt_bind_param($stmt, "s", $userEmail);
        mysqli_stmt_execute($stmt);
    }

    $sql = "INSERT INTO pwdreset(pwdResetEmail , pwdResetSelector , pwdResetToken , pwdResetExpires) VALUES (? , ? , ? , ?);";

    $stmt = mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt, $sql)) {
        echo "There was an error!";
        exit();
    } else {
        $hashedToken = password_hash($token, PASSWORD_DEFAULT);
        mysqli_stmt_bind_param($stmt, "ssss", $userEmail, $selector, $hashedToken, $expires);
        mysqli_stmt_execute($stmt);
    }

    mysqli_stmt_close($stmt);
    mysqli_close($conn);

    // $to = $userEmail;

    // $subject = "Reset your password";

    $message = 'We recieved password reset request. The link to reset your password is given as follows. If you didnt make this request, you can ignore this email.';

    $message .= " Here is your password reset link: ";

    $message .=  $url ;

    // $headers = "From LMS <jasleoyo@gmail.com>\r\n";
    // $headers .= "Reply To: jasleoyo@gmail.com\r\n";
    // $headers .= "Content-type: text/html\r\n";

    // mail($to , $subject , $message, $headers);

    $mail = new PHPMailer();
    $mail->isSMTP();
    $mail->Host = 'smtp.gmail.com';
    $mail->Port = '587';
    $mail->SMTPAuth = true;
    $mail->SMTPSecure = 'tls';
    //$mail->SMTPDebug = SMTP::DEBUG_SERVER;
    // $mail->isHTML();
    $mail->Username = 'libme.library.system@gmail.com';
    $mail->Password = 'khiladinoek123';
    $mail->setFrom('no-reply@libMe.com');
    $mail->Subject = "Reset your password";
    $mail->Body = $message;
    $mail->addAddress($userEmail);

    if (!$mail->send()) {
        echo 'Mailer Error: ' . $mail->ErrorInfo;
    } else {
        //echo 'Message sent!';
        //Section 2: IMAP
        //Uncomment these to save your message in the 'Sent Mail' folder.
        #if (save_mail($mail)) {
        #    echo "Message saved!";
        #}
        header("Location: reset-password.php?reset=success");
    }
} else {
    header("Location: ../index.php");
}
