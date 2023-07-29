<?php include "../php-admin/header.php";
$err = false;
$succ = false;
 if (isset($_GET['deletePost'])) {
            $deletePost = $_GET['deletePost'];
            $delCate = "DELETE FROM posts WHERE `posts`.`id` = '$deletePost'";
            $postQquer = mysqli_query($conn, $delCate);
            if(($postQquer)){
                $succ  = true;
                $succMsg =  "Post Deleted Successfully";
            }
          }
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
              <h6 class="fw-semibold mb-0">Title</h6>
            </th>
            <th class="border-bottom-0">
              <h6 class="fw-semibold mb-0">Thumb</h6>
            </th>
            <th class="border-bottom-0">
              <h6 class="fw-semibold mb-0">User</h6>
            </th>
            <th class="border-bottom-0">
              <h6 class="fw-semibold mb-0">Status</h6>
            </th>
            <th class="border-bottom-0">
              <h6 class="fw-semibold mb-0">Action</h6>
            </th>
          </tr>
        </thead>
        <tbody>
          <?php
          $selPost = "select * from posts order by id desc";
          $selPostQuery = mysqli_query($conn, $selPost);
          $id  = 0;
          while ($selFetch = mysqli_fetch_assoc($selPostQuery)) {
            $id++;
            $userr = $selFetch['user'];
            $selUser = "select * from user where id = '$userr'";
            $selUSerQuery = mysqli_query($conn,$selUser);
            $username = mysqli_fetch_assoc($selUSerQuery);
            $titleWrap = wordwrap( $selFetch['title'], 30, '<br>', true);
          ?>
            <tr>
              <td class="border-bottom-0">
                <h6 class="fw-semibold mb-0"><?php echo $id ?></h6>
              </td>

              <td class="border-bottom-0">
                <p class="mb-0 fw-normal"><?php echo $titleWrap ?></p>
              </td>
              <td class="border-bottom-0">
                <p class="mb-0 fw-normal">
                    <img style="width: 100px; height:50px; object-fit:cover" src="cleaning/posts/<?php echo $selFetch['thumb'] ?>" alt="">
                </p>
              </td>
              <td class="border-bottom-0">
                <p class="mb-0 fw-normal"><?php echo $username['name'] ?></p>
              </td>
             
              <td class="border-bottom-0">
                <div class="d-flex align-items-center gap-2">
                  <span class="badge bg-success rounded-3 fw-semibold">Active</span>
                </div>
              </td>
              <td class="border-bottom-0">
                <a href="edit-post.php?editPost=<?php echo $selFetch['id'] ?>" class="btn-primary btn btn-sm">Edit</a>
                <a href="all-post.php?deletePost=<?php echo $selFetch['id'] ?>" class="btn-danger btn btn-sm">Delete</a>
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