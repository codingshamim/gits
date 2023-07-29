<?php include "../php-admin/function.php" ?>

<?php include "../php-admin/header.php" ?>

<?php
$succ = false;
$cateIds = $_GET['edit'];
$selCates = "select * from category where id = '$cateIds'";
$selCatesQuery = mysqli_query($conn, $selCates);
$cateNames = mysqli_fetch_assoc($selCatesQuery);

if (isset($_POST['cateEdit'])) {

    $catename = mysqli_real_escape_string($conn, $_POST['cateName']);
    $cateShow = mysqli_real_escape_string($conn, $_POST['cateShow']);

    $cateUpdateSql = "UPDATE `category` SET  `cateName` = '$catename', `status` = '$cateShow' WHERE `category`.`id` = '$cateIds'";
    if (mysqli_query($conn, $cateUpdateSql)) {
        $succ = true;
        $succMsg = "Category Updated Successfully";
    }
}

?>

<div class="row">
    <div class="card customCard col-8">
        <?php
        if ($succ){



        ?>

            <div class="alert alert-success" role="alert">
              <?php echo $succMsg ?>
            </div>
        <?php
        }
        ?>
        <div class="card-body">
            <h5 class="card-title">Add New Category</h5>
            <form action="edit-cate.php?edit=<?php echo $cateNames['id'] ?>" method="post">
                <div class="form-group">
                    <label for="exampleInputEmail1">Edit Category</label>
                    <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value="<?php echo $cateNames['cateName'] ?>" name="cateName" required>

                </div>
                <?php
                if ($cateNames['status'] == 1) {



                ?>
                    <div class="form-check mt-2">
                        <input type="checkbox" class="form-check-input" id="exampleCheck1" value="1" name="cateShow" checked>
                        <label class="form-check-label" for="exampleCheck1">Show Top Menu</label>
                    </div>
                <?php } else {


                ?>
                    <div class="form-check mt-2">
                        <input type="checkbox" class="form-check-input" id="exampleCheck1" value="1" name="cateShow">
                        <label class="form-check-label" for="exampleCheck1">Show Top Menu</label>
                    </div>
                <?php

                }
                ?>
                <button type="submit" class="mt-2 btn btn-primary" name="cateEdit">Update</button>
            </form>
        </div>
    </div>

</div>


<style>
    body {
        overflow-x: hidden;
    }

    .customCard {
        margin-top: 100px;
        margin-left: 10px;
        box-shadow: 5px 5px 10px #bebebe,
            -5px -5px 10px #ffffff;
        border-radius: 5px;
    }

    .tableCard {
        overflow-y: auto;
        height: 400px;
    }
</style>

<?php include "../php-admin/footer.php" ?>