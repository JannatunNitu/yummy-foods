<?php
// session_start();
include "./backend_inc/header.php";
?>

<div class="container-fluid">
    <h2>Profile page</h2>

    <div class="row">
        <div class="col-lg-8">
            <div class="card rounded p-3">
            <form action="../controller/profileUpdate.php" method="post" enctype="multipart/form-data">
                <div class="row">
                    <div class="col-lg-4">
                    <label for="profile_img" style="width: 100%;"><img style="width: 200px; height: 200px; object-fit:cover;" class="profile_image" src="<?= isset($_SESSION['auth']['profile']) ? "../uploads/users/" . $_SESSION['auth']['profile'] : "https://api.dicebear.com/7.x/initials/svg?seed=" . $_SESSION['auth']['fname'] ?>" alt=""></label>
                        <input name="profile_img" type="file" id="profile_img" class="profile_pic_selector d-none">
                    </div>
                    <div class="col-lg-8">
                        <input name="fname" value="<?= $_SESSION['auth']['fname'] ?>" class="form-control my-3" type="text" placeholder="first Name">
                        <input name="lname" value="<?= $_SESSION['auth']['lname'] ?>" class="form-control my-3" type="text" placeholder="Last Name">
                        <input name="email" value="<?= $_SESSION['auth']['email'] ?>" class="form-control my-3" type="text" placeholder="Email Address">
                        <button class="btn btn-primary w-100">Update</button>
            
                    </div>
                </div>
            </form>
            </div>
        </div>
        <div class="col-lg-4">
          <div class="card rounded p-3">
          <form action="../controller/updatePassword.php" method="post">
            <input name="old_password" 
            value="<?= isset($_SESSION['form_errors']['old_errors']) ? $_SESSION['form_errors']['old_errors'] : ""  ?>"
             type="password" class="form-control my-3" placeholder="Old Password">
             <?php
           if(isset($_SESSION['form_errors']['old_errors'])){
               ?>
               <span style="font-size: 14px; " class = "text-danger"> <?= $_SESSION['form_errors']['old_errors'] ?></span>
               <?php
           }
           ?>  
            <input name="password" type="password" class="form-control my-3" placeholder="New Password">
            <input name="confirm_password" type="password" class="form-control my-3" placeholder="Confirm Password">
            <button class="btn btn-primary w-100">Update</button>

          </form>
          </div>
        </div>
    </div>
</div>


<?php

include "./backend_inc/footer.php";

unset($_SESSION['form_errors']);
?>




<script>
    let profileInput = document.querySelector('.profile_pic_selector')
    let profileImage = document.querySelector('.profile_image')

    function updateImage(event){
        let url = URL.createObjectURL(event.target.files[0]);
        profileImage.src = url
        console.log(url);
    }
    profileInput.addEventListener('change', updateImage)
</script>
