<?php
include "./backend_inc/header.php";

?>




<div class="container-fluid">
    <form action="../controller/storeCategory.php" method="post" enctype="multipart/form-data">
     <div class="card">
        <div class="card-header">Add Categories</div>
        <div class="card-body">
          <input name="title" type="text" class="form-control my-3" placeholder="Enter your title">
          

         <button class="btn btn-primary mt-4">Submit Category</button>
        </div>
     </div>

    </form>
</div>









<?php
include "./backend_inc/footer.php"
?>