<?php

include "../database/env.php";
$title = $_REQUEST['title'];

$query = "INSERT INTO menu_categories(title) VALUES ('$title')";
$res = mysqli_query($conn, $query);

if($res){
    header("location: ../backend/addCategory.php");
}