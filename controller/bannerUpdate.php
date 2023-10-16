<?php
include "../database/env.php";
session_start();

$id = $_REQUEST['id'];
$title = $_REQUEST['title'];
$detail = $_REQUEST['detail'];
$cta_title = $_REQUEST['cta_title'];
$cta_link = $_REQUEST['cta_link'];
$video_link = $_REQUEST['video_link'];
$bannerImage = $_FILES['banner_img'];


if(count($bannerImage) > 0){
    $extension = pathinfo($bannerImage['name'])['extension'];
    $file_name = "Banner-" . uniqid() . ".$extension";
//     var_dump($file_name);
//  exit();

    $path = "../uploads/banners";
    if(!is_dir($path)){
        mkdir($path);
    }
    $uploads = move_uploaded_file($bannerImage['tmp_name'], "../uploads/banners/" .$file_name);
    if($uploads){
        $query = "SELECT banner_img from addbanners WHERE id='$id'";
        $res = mysqli_query($conn, $query);
        $updatebanner = mysqli_fetch_assoc($res);
        $path = "../uploads/banners/" .$updatebanner['banner_img'];
        
        if(file_exists($path)){
            unlink($path);
        }

        $query = "UPDATE addbanners SET title='$title',detail='$detail',cta_title='$cta_title',cta_link='$cta_link',video_link='$video_link',banner_img='$file_name' WHERE id='$id'";
        $res = mysqli_query($conn, $query);
        header("Location: ../backend/allBanners.php");

        $_SESSION['msg'] = "successfully Updated";

    }else{

        // NO IMAGE 
        $query = "UPDATE addbanners SET title='$title',detail='$detail',cta_title='$cta_title',cta_link='$cta_link',video_link='$video_link' WHERE id='$id'";
        $result = mysqli_query($conn, $query);
        header("Location: ../backend/allBanners.php");
        $_SESSION['msg'] = "successfully Updated";

    }
}
