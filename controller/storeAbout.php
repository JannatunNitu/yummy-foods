<?php

include "../database/env.php";

$aboutImg = $_FILES['about_img'];
$aboutContact = $_REQUEST['about_contact'];
$aboutDetail = $_REQUEST['about_details'];
$aboutVideo = $_REQUEST['about_video'];
$videoImage = $_FILES['video_img'];


// *unique name
$ext = pathinfo($aboutImg['name'])['extension'];
$file_name = "About-" . uniqid() . ".$ext";

$ext = pathinfo($videoImage['name'])['extension'];
$video_file_name = "About-" . uniqid() . ".$ext";
$path = "../uploads/abouts";



if(!is_dir($path)){
   mkdir($path);
}
// move_uploaded_file($_FILES['fileToUpload']['tmp_name'], $file_location)
$uploaded_file = move_uploaded_file($aboutImg['tmp_name'], "../uploads/abouts/$file_name");
$uploaded_file = move_uploaded_file($videoImage['tmp_name'], "../uploads/abouts/$video_file_name");


if($uploaded_file){

    $query = "INSERT INTO abouts(about_img, about_contact, about_details, about_video, video_img) VALUES ('$file_name','$aboutContact','$aboutDetail','$aboutVideo','$video_file_name')";
    $res = mysqli_query($conn,$query);
    // var_dump($res);
    header("Location: ../backend/allAbouts.php");
}
// else{
    
// }