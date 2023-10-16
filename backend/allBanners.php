<?php
include "./backend_inc/header.php";
include "../database/env.php"; 

$query = "SELECT id, title, detail, status, banner_img FROM addbanners";
$result = mysqli_query($conn,$query);
$banners = mysqli_fetch_all($result,1);

?>




<div class="container-fluid">
    <table class="table table-responsive text-center" >
        <tr>
            <td>#</td>
            <td>Banner Image</td>
            <td>Title</td>
            <td>detail</td>
            <td>Featured</td>
            <td>Action</td>
        </tr>
        

        <?php
        foreach($banners as $key=>$banner){
        ?>    
            <tr>
            <td><?= ++$key ?></td>
            <td>
                <img src="../uploads/banners/<?=$banner['banner_img']?>" alt="" width="80">
            </td>
            <td><?=$banner['title']?></td>
            <td><?=$banner['detail']?></td>
            <td>
                <a href="../controller/statusUpdate.php?id=<?=$banner['id']?>">
                <span class="text-warning">
                    <i class="<?= $banner['status'] == 1 ? "fas" : "far" ?> fa-star"></i>
                    <!-- <i class="fas fa-star"></i> -->
                </span>
                </a>
            </td>
            <td>
                <a href="./editBanner.php?id=<?=$banner['id']?>" class="btn btn-primary">Edit</a>
                <a href="../controller/deleteBanner.php?id=<?=$banner['id']?>" class="btn btn-danger deleteBtn">Delete</a>
            </td>
        </tr>
        <?php
        }
        ?>

    </table>
</div>









    <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <script>

     $('.deleteBtn').click(function(event){
        event.preventDefault()
            Swal.fire({
            title: 'Are you sure?',
            text: "You won't be able to revert this!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, delete it!'
              }).then((result) => {
            if (result.isConfirmed) {
              window.location.href = $(this).attr('href');
            }
              })
     })

    </script>

<?php
if(isset($_SESSION['msg'])){
?>

<script>
    const Toast = Swal.mixin({
  toast: true,
  position: 'top-end',
  showConfirmButton: false,
  timer: 3000,
  timerProgressBar: true,
  didOpen: (toast) => {
    toast.addEventListener('mouseenter', Swal.stopTimer)
    toast.addEventListener('mouseleave', Swal.resumeTimer)
  }
})

Toast.fire({
  icon: 'success',
  title: 'successfully Updated'
})
</script>
<?php

}
?>




<?php
include "./backend_inc/footer.php";
unset($_SESSION['msg']);
?>


