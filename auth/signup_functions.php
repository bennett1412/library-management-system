<?php

function emptyInputSignup($name,$email,$mobile,$password,$password_confirmation){
    $result;
    if (empty($name) ||empty($email) ||empty($mobile) ||empty($password) || empty($password_confirmation)){
        $result = true;
    }
    else{
        $result = false;
    }
}

function invalidEmail($email){
    $result;
    if (preg_match("/^[a-zA-Z]")) { 
        $result = true;
    } else {
        $result = false;
    }
}