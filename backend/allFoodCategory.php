<?php
include "./backend_inc/header.php";
include "../database/env.php";

$query = "SELECT * FROM menu_categories";
$res = mysqli_query($conn, $query);
$categories = mysqli_fetch_all($res,1);

?>




<div class="container-fluid">
    <form action="../controller/storeFoodCategory.php" method="post" enctype="multipart/form-data">
     <div class="card">
        <div class="card-header">Add Food Items</div>
        <div class="card-body">
          <input name="title" type="text" class="form-control my-3" placeholder="Enter your title">
          <textarea name="detail" class="form-control my-3" placeholder="Enter your details"></textarea>
         <div class="row mx-0 align-items-center">
            <input name="price" type="text" class="form-control my-3 col" placeholder="Enter Food Price">
            <select name="category" id="" class="form-control col">
                <?php
                foreach ($categories as $category){
                 ?>   
                    <option value="<?= $category['id'] ?>"><?= $category['title'] ?></option>
                <?php
                }
                ?>
            </select>
         </div>
         <input name="food_img" type="file" class="form-control my-3">

         <button class="btn btn-primary mt-4">Submit Food Items</button>
        </div>
     </div>

    </form>
</div>









<?php
include "./backend_inc/footer.php"
?>