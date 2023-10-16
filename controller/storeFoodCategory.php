<?php
include "../database/env.php";

$title = $_REQUEST['title'];
$detail = $_REQUEST['detail'];
$price = $_REQUEST['price'];
$category = $_REQUEST['category'];
$food_img = $_FILES['food_img'];

// *unique name
$ext = pathinfo($food_img['name'])['extension'];

$file_name = "Food-" . uniqid() . ".$ext";
$path = "../uploads/foods";



if(!is_dir($path)){
   mkdir($path);
}
// move_uploaded_file($_FILES['fileToUpload']['tmp_name'], $file_location)
$uploaded_file = move_uploaded_file($food_img['tmp_name'], "../uploads/foods/$file_name");
print_r($uploaded_file);

if($uploaded_file){
    $query = "INSERT INTO food_item(category_id, title, detail, price, food_img) VALUES ('$category','$title','$detail','$price','$file_name')";
    $res = mysqli_query($conn,$query);
    if($res){
        header("Location: ../backend/allFoodCategory.php");
    }
    // var_dump($res);
}
else{

}