
<?php
include "./backend_inc/header.php";
include "../database/env.php";

$id = $_REQUEST['id'];
$query = "SELECT * FROM addbanners WHERE id='$id'";
$res = mysqli_query($conn, $query);
$editbanner = mysqli_fetch_assoc($res);

?>




<div class="container-fluid">
    <form action="../controller/bannerUpdate.php" method="post" enctype="multipart/form-data">
    <input type="hidden" name="id" value="<?= $editbanner['id'] ?>">    
     <div class="card">
        <div class="card-header">Edit Banner</div>
        <div class="card-body">
          <input value="<?= $editbanner['title'] ?>" name="title" type="text" class="form-control my-3" placeholder="Enter your title">
          <textarea name="detail" class="form-control my-3" placeholder="Enter you details"><?= $editbanner['detail'] ?></textarea>
         <div class="row mx-0">
            <input value="<?= $editbanner['title'] ?>" name="cta_title" type="text" class="form-control my-3 col-lg-4" placeholder="cta title">
            <input value="<?= $editbanner['title'] ?>"  name="cta_link" type="text" class="form-control my-3 col-lg-4" placeholder="cta link">
            <input value="<?= $editbanner['title'] ?>"  name="video_link" type="text" class="form-control my-3 col-lg-4" placeholder="Video link">
         </div>
         <input name="banner_img" type="file" class="form-control my-3" >

         <button class="btn btn-primary mt-4">Update Banner</button>
        </div>
     </div>

    </form>
</div>









<?php
include "./backend_inc/footer.php"
?>