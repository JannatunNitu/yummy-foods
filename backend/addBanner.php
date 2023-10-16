<?php
include "./backend_inc/header.php";

?>




<div class="container-fluid">
    <form action="../controller/storeBanner.php" method="post" enctype="multipart/form-data">
     <div class="card">
        <div class="card-header">Add Banner</div>
        <div class="card-body">
          <input name="title" type="text" class="form-control my-3" placeholder="Enter your title">
          <textarea name="detail" class="form-control my-3" placeholder="Enter you details"></textarea>
         <div class="row mx-0">
            <input name="cta_title" type="text" class="form-control my-3 col-lg-4" placeholder="cta title">
            <input name="cta_link" type="text" class="form-control my-3 col-lg-4" placeholder="cta link">
            <input name="video_link" type="text" class="form-control my-3 col-lg-4" placeholder="Video link">
         </div>
         <input name="banner_img" type="file" class="form-control my-3">

         <button class="btn btn-primary mt-4">Submit Banner</button>
        </div>
     </div>

    </form>
</div>









<?php
include "./backend_inc/footer.php"
?>