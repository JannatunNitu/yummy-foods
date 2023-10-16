<?php
session_start();
include "../database/env.php";
$fname = $_REQUEST['fname'];
$lname = $_REQUEST['lname'];
$email = $_REQUEST['email'];
$password = $_REQUEST['password'];
$encPassword = password_hash($password, PASSWORD_BCRYPT);
$repeatPassword = $_REQUEST['repeatPassword'];
$errors=[];
if(empty($fname)){
    $errors ['fname_error'] = "Please Enter Your First Name";
}

if(empty($lname)){
    $errors ['lname_error'] = "Please Enter Your Last Name";
}

if(empty($email)){
    $errors ['email_error'] = "Please Enter Your Email";
}
else if( !filter_var($email, FILTER_VALIDATE_EMAIL)){
    $errors ['email_error'] = "Please Enter Your Valid Email";
}

if(empty($password)){
    $errors ['password_error'] = "Please Enter Your Password";
}
else if(strlen($password) < 8){
    $errors ['Fullpassword_error'] = "Please Enter Your full Password";
}
else if($password != $repeatPassword){
    $errors ['repeatPassword_error'] = "Please Enter Your Repeat Password";
}

if(count($errors) > 0){
    $_SESSION['register_error'] = $errors;
    header("Location: ../backend/register.php");
}
else{

    $query = "INSERT INTO users(fname,lname,email,Password) VALUES ('$fname','$lname','$email','$encPassword')";
    $result = mysqli_query($conn,$query);
    if($result){
        header("Location: ../backend/login.php");
    }
}
// print_r($errors);
?>
