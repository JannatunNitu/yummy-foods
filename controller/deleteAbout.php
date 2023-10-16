<?php
include "../database/env.php";

$id = $_REQUEST['id'];

$query = "SELECT about_img FROM abouts WHERE id='$id'";
$res = mysqli_query($conn, $query);
$queryq = "SELECT video_img FROM abouts WHERE id='$id'";
$res = mysqli_query($conn, $queryq);
$aboutImage = mysqli_fetch_assoc($res);
$videoImage = mysqli_fetch_assoc($res);
$path = "../uploads/abouts".$aboutImage['about_img'];
$path1 = "../uploads/abouts".$videoImage['video_img'];
if(file_exists($path)){
    unlink($path);
}
if(file_exists($path1)){
    unlink($path1);
}
$query = "DELETE about_img from abouts where id='$id'";
$res = mysqli_query($conn,$query);

$queryd = "DELETE video_img from abouts where id='$id'";
$res = mysqli_query($conn,$queryd);

header("location: ../backend/allAbouts.php");