<?php include "../php-admin/header.php";
$err = false;
$succ = false;
 if (isset($_GET['deleteUser'])) {
            $deleteUser = $_GET['deleteUser'];
            $delCate = "DELETE FROM subs WHERE `subs`.`id` = '$deleteUser'";
            $emailDel = mysqli_query($conn, $delCate);
            if(($emailDel)){
                $succ  = true;
                $succMsg =  "Post Deleted Successfully";
            }
          }
?>

?>
<div class="container-fluid">
<div class="card-body tableCard m-5 p-4 col-11 customCard">
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

    <h5 class="card-title fw-semibold mb-4">All Post</h5>
    <div class="table-responsive">
      <table class="table text-nowrap mb-0 align-middle">
        <thead class="text-dark fs-4">
          <tr>
            <th class="border-bottom-0">
              <h6 class="fw-semibold mb-0">Id</h6>
            </th>
          
            <th class="border-bottom-0">
              <h6 class="fw-semibold mb-0">Email</h6>
            </th>
            <th class="border-bottom-0">
              <h6 class="fw-semibold mb-0">Delete</h6>
            </th>
          
           
          </tr>
        </thead>
        <tbody>
          <?php
          $selPost = "select * from subs order by id desc";
          $selPostQuery = mysqli_query($conn, $selPost);
          $id  = 0;
          while ($selFetch = mysqli_fetch_assoc($selPostQuery)) {
            $id++;
         
           
          ?>
            <tr>
              <td class="border-bottom-0">
                <h6 class="fw-semibold mb-0"><?php echo $id ?></h6>
              </td>

              <td class="border-bottom-0">
                <p class="mb-0 fw-normal"><?php echo $selFetch['email'] ?></p>
              </td>
             
           
              <td class="border-bottom-0">
              
                <a href="subscriber.php?deleteUser=<?php echo $selFetch['id'] ?>" class="btn-danger btn btn-sm">Delete</a>
              </td>
            </tr>
          <?php
          }

         
          ?>
        </tbody>
      </table>
    </div>
  </div>
</div>


<?php include "../php-admin/footer.php" ?>