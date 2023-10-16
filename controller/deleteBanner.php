<?php
include "../database/env.php";

$id = $_REQUEST['id'];

$query = "SELECT banner_img FROM addbanners WHERE id='$id'";
$res = mysqli_query($conn, $query);
$banner_img = mysqli_fetch_assoc($res);
$path = "../uploads/banners".$banner_img['banner_img'];

if(file_exists($path )){
    unlink($path);
}

$query = "DELETE from addbanners where id='$id'";
$res = mysqli_query($conn,$query);

header("location: ../backend/allBanners.php");