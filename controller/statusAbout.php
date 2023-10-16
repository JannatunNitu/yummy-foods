<?php

include "../database/env.php";
$id =  $_REQUEST['id'];
$query = "UPDATE abouts set status = 0";
$res = mysqli_query($conn, $query);


$query = "UPDATE abouts SET status = 1 WHERE id='$id'";
$result = mysqli_query($conn, $query);
// REDIRECT
header("location:../backend/allAbouts.php");