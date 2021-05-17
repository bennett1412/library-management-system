<?php
    if(isset($_POST["reset-password-submit"])){
        
        $selector = $_POST["selector"];
        $validator = $_POST["validator"];
        $password = $_POST["pwd"];
        $passwordrepeat = $_POST["pwd-repeat"];


        if(empty($password) || empty($passwordrepeat)){
            header("Location: ../admin-create-new-password.php?newpwd-empty");
            exit();
        }
        else if ($password != $passwordrepeat){
            header("Location: ../admin-create-new-password.php?newpwd=pwdnotsame");
            exit();
        }

        $currentDate = date("U");

        require "../../../server/db_connect.php";

        $sql = "SELECT * FROM pwdreset WHERE pwdResetSelector = ? AND pwdResetExpires >= ?;";
        
        $stmt = mysqli_stmt_init($conn);
        if(!mysqli_stmt_prepare($stmt , $sql)){
            echo mysqli_stmt_error($stmt);
            exit();
        }
        else{
            mysqli_stmt_bind_param($stmt , "ss" , $selector, $currentDate);
            mysqli_stmt_execute($stmt);

            $result = mysqli_stmt_get_result($stmt);
            if(!$row = mysqli_fetch_assoc($result)){
                echo "You need to re-submit your reset request. statement err";
                exit();
            }
            else{
                $tokenBin = hex2bin($validator);
                $tokenCheck = password_verify($tokenBin , $row["pwdResetToken"]);

                if($tokenCheck === false){
                    echo "You need to re-submit your reset request. wrong token";
                    exit();
                }
                elseif($tokenCheck === true){
                    $tokenEmail = $row['pwdResetEmail'];
                    $sql = "SELECT * FROM admins WHERE email=?;";
                    $stmt = mysqli_stmt_init($conn);
                    if(!mysqli_stmt_prepare($stmt , $sql)){
                    echo mysqli_stmt_error($stmt);
                        exit();
                    }
                    else{
                        mysqli_stmt_bind_param($stmt , "s" , $tokenEmail);
                        mysqli_stmt_execute($stmt);
                        $result = mysqli_stmt_get_result($stmt);
                        if(!$row = mysqli_fetch_assoc($result)){
                        echo mysqli_stmt_error($stmt);
                            exit();
                        }
                        else{
                            $sql = "UPDATE admins SET password=? WHERE email=?";
                            $stmt = mysqli_stmt_init($conn);
                            if(!mysqli_stmt_prepare($stmt , $sql)){
                            echo mysqli_stmt_error($stmt);
                                exit();
                            }
                            else{
                                $newPwdHash = password_hash($password , PASSWORD_DEFAULT);
                                mysqli_stmt_bind_param($stmt , "ss" , $newPwdHash , $tokenEmail);
                                mysqli_stmt_execute($stmt);

                                $sql = "DELETE FROM pwdreset WHERE pwdResetEmail=?";
                                $stmt = mysqli_stmt_init($conn);
                                if(!mysqli_stmt_prepare($stmt , $sql)){
                                echo mysqli_stmt_error($stmt);
                                    exit();
                                }
                                else{
                                    mysqli_stmt_bind_param($stmt , "s" , $tokenEmail);
                                    mysqli_stmt_execute($stmt);
                                    header("Location: ../admin-login.php?newpwd=passwordupdated");
                                
                            }
                            
                        }
                    }

                }
            }
        }
    }
}
    else{
        header("Location: ../admin-login.php");
    }
