<?php
include "../php-admin/header.php";
$editUser = $_GET['editUser'];
$err = false;
$succ = false;
$selUser = "select * from user where id =  '$editUser'";
$selQuery = mysqli_query($conn,$selUser);
$users = mysqli_fetch_assoc($selQuery);

if(isset($_POST['updateUser'])){
    $name = mysqli_real_escape_string($conn,$_POST['name']);
    $email = mysqli_real_escape_string($conn,$_POST['email']);
    $phone = mysqli_real_escape_string($conn,$_POST['phone']);
    $type = mysqli_real_escape_string($conn,$_POST['type']);

    $userUpsql  = "UPDATE `user` SET `name` = '$name', `email` = '$email', `phone` = '$phone', `type` = '$type' WHERE `user`.`id` = '$editUser'";
    if(mysqli_query($conn,$userUpsql)){
        $succ = true;
        $succMsg =  "User Updated Successfully";
    }
}
?>
<div class="container-fluid">
<form class="card customCard col-sm-6 p-5" action="edit-user.php?editUser=<?php echo $users['id'] ?>" method="post">
<?php
    if ($succ) {



    ?>

      <div class="alert alert-success" role="alert">
        <?php echo $succMsg ?>
      </div>
    <?php
    } if($err) {


    ?>

      <div class="alert alert-danger" role="alert">
        <?php echo $errMsg ?>
      </div>
    <?php  } ?>
    <div class="form-group">
        <label for="">Name</label>
        <input type="text" class="form-control" value="<?php echo $users['name'] ?>" name="name">
    </div>
    <div class="form-group mt-2">
    <label for="">Email</label>
        <input type="text" class="form-control" value="<?php echo $users['email'] ?>" name="email">
    </div>
    <div class="form-group mt-2">
    <label for="">Phone</label>
        <input type="text" class="form-control" value="<?php echo $users['phone'] ?>" name="phone">
    </div>
    <div class="form-group mt-2">
    <label for="">Type</label>
      <select name="type" id="" class="form-control">
        <?php if($users['type']==1){

         ?>
        <option value="1">Admin</option>
        <option value="0">User</option>
        <?php
        }else{
        ?>
           <option value="">User</option>
        <option value="">Admin</option>
        <?php   } ?>
     
       
      </select>
      <div class="form-group mt-2">
            <button class="btn btn-primary" name="updateUser">Update</button>
    </div>
    </div>
</form>
</div>

<?php
include "../php-admin/footer.php"

?>