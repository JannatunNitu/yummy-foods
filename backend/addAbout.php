<?php
include "./backend_inc/header.php";

?>

<style>
       .ck-editor__editable[role="textbox"] {
                /* editing area */
                min-height: 200px;

            }
</style>


<div class="container-fluid">
    <form action="../controller/storeAbout.php" method="post" enctype="multipart/form-data">
     <div class="card">
        <div class="card-header">Add about</div>
        <div class="card-body">
        <h6>About Image</h6>
          <input name="about_img" type="file" class="form-control my-3" placeholder="Enter your About Image">
          <input name="about_contact" type="text" class="form-control my-3 col-lg-4" placeholder="Enter your phone number">
          <textarea name="about_details" class="form-control my-3 content" placeholder="Enter you about details"></textarea>
          <input name="about_video" type="text" class="form-control my-3 col-lg-4" placeholder="Enter your Video Link">
          <h6>Video Thumbnail Image</h6>
          <input name="video_img" type="file" class="form-control my-3 col-lg-4" placeholder="Enter your Video Thumbnail">
         
          
         <button class="btn btn-primary mt-4">Submit about</button>
        </div>
     </div>

    </form>
</div>









<?php
include "./backend_inc/footer.php"
?>


<script src="https://cdn.ckeditor.com/ckeditor5/40.0.0/classic/ckeditor.js"></script>
<script>
    ClassicEditor
        .create( document.querySelector( '.content' ) )
        .catch( error => {
            console.error( error );
        } );
</script>