<?php
// echo "<pre>";
// print_r($_FILES);
// echo "</pre>";
include "../database/env.php";

$title =$_REQUEST['title'];
$detail =$_REQUEST['detail'];
$cta_title =$_REQUEST['cta_title'];
$cta_link =$_REQUEST['cta_link'];
$video_link =$_REQUEST['video_link'];
$bannerImg =$_FILES['banner_img'];

// *unique name
$ext = pathinfo($bannerImg['name'])['extension'];

$file_name = "Banner-" . uniqid() . ".$ext";
$path = "../uploads/banners";



if(!is_dir($path)){
   mkdir($path);
}
// move_uploaded_file($_FILES['fileToUpload']['tmp_name'], $file_location)
$uploaded_file = move_uploaded_file($bannerImg['tmp_name'], "../uploads/banners/$file_name");
// print_r($uploaded_file);

if($uploaded_file){
    // "INSERT INTO `addbanners`(`id`, `title`, `detail`, `cta-title`, `cta-link`, `video-link`, `banner-img`, `status`) VALUES ('[value-1]','[value-2]','[value-3]','[value-4]','[value-5]','[value-6]','[value-7]','[value-8]')"
    $query = "INSERT INTO addbanners(title, detail, cta_title, cta_link, video_link, banner_img) 
    VALUES ('$title', '$detail', '$cta_title', '$cta_link', '$video_link', '$file_name')";
    $res = mysqli_query($conn,$query);
    // var_dump($res);
}
else{
}