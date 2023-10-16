<?php

include "../database/env.php";

session_start();



$id = $_SESSION['auth']['id'];
$fname = $_REQUEST['fname'];
// print_r($fname);
// exit();
$lname = $_REQUEST['lname'];
$email = $_REQUEST['email'];
$profileImage = $_FILES['profile_img'];
$errors = [];
$acceptedFiles = ['jpg', 'png', 'svg'];
$extension = pathinfo($profileImage['name'])['extension'];


// VALIDATION
if( $profileImage['size'] == 0 ){
    $errors['Profile_img_error'] = "Image is empty";
}else if(!in_array($extension, $acceptedFiles)){
    $errors['Profile_img_error'] = "Supported Types are jpg, png, svg";
} else if($profileImage['size'] > 652000){
    $errors['Profile_img_error'] = "Total image size is 500kb";
}

// REDIRECT
if(count($errors) == 0){
    //moveing file
    $file_name = "user-" . uniqid() . ".$extension";
    
    
    if(!is_dir("../uploads/users")){
        mkdir("../uploads/users");
    }
    $uploadedfiles = move_uploaded_file($profileImage['tmp_name'],"../uploads/users/$file_name");

    if($uploadedfiles){
       
    
        $query = "UPDATE users SET fname='$fname',lname='$lname',email='$email',profile_img='$file_name' WHERE id = '$id' ";
        // var_dump($query);
        // exit();
        $res = mysqli_query($conn,$query);
        
        $_SESSION['auth']['fname'] = $fname;
        $_SESSION['auth']['lname'] = $lname;
        $_SESSION['auth']['email'] = $email;
        $_SESSION['auth']['profile'] = $file_name;

        header("Location: ../backend/profile.php");
    }
    
}

else{
    // $_SESSION['profile_error'] = $errors;
    header("Location: ../backend/profile.php");
    
    
}

// if(count($errors) > 0 ){
//     $_SESSION['register_error'] = $errors;
//     header ("Location: ../backend/profile.php");
// } 
// else{
//     $query = "INSERT INTO users(fname, lname, email, profile_img) VALUES ('$fname', '$lname', '$email', '$file_name)";
//      $result = mysqli_query($conn, $query);
//      if($result){
//         // header("location: ../backend/login.php");
//      }
// }
