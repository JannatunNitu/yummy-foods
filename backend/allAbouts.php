<?php
include "./backend_inc/header.php";
include "../database/env.php";

$query = "SELECT * FROM abouts";
$res = mysqli_query($conn,$query);
$abouts = mysqli_fetch_all($res,1);


?>




<div class="container-fluid">
<table class="table table-responsive text-center" >
        <tr>
            <td>#</td>
            <td>About Image</td>
            <td>Phone Number</td>
            <td>About Details</td>
            <td>About Video</td>
            <td>Featured</td>
            <td>Action</td>
        </tr>
        

        <?php
        foreach($abouts as $key=>$about){
        ?>    
            <tr>
            <td><?= ++$key ?></td>
            <td>
                <img src="../uploads/abouts/<?=$about['about_img']?>" alt="" width="80">
            </td>
            <td><?=$about['about_contact']?></td>
            <td><?=$about['about_details']?></td>
            <td><?=$about['about_video']?></td>
            <td>
                <a href="../controller/statusAbout.php?id=<?=$about['id']?>">
                <span class="text-warning">
                    <i class="<?= $about['status'] == 1 ? "fas" : "far" ?> fa-star"></i>
                    <!-- <i class="fas fa-star"></i> -->
                </span>
                </a>
            </td>
            <td>
                <a href="../controller/editAbout.php?=<?$about['id']?>" class="btn btn-primary">Edit</a>
                <a href="../controller/deleteAbout.php?id=<?=$about['id']?>" class="btn btn-danger deleteBtn">Delete</a>
            </td>
        </tr>
        <?php
        }
        ?>

    </table>
</div>









<?php
include "./backend_inc/footer.php"
?>