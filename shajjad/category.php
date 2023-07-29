<?php include "../php-admin/function.php" ?>

<?php include "../php-admin/header.php" ?>

<div class="row">
  <div class="card customCard col-11  mx-5">
    <?php
    if ($succ) {



    ?>

      <div class="alert alert-success" role="alert">
        <?php echo $succMsg ?>
      </div>
    <?php
    }
    ?>
    <div class="card-body">
      <h5 class="card-title">Add New Category</h5>
      <form action="category.php" method="post">
        <div class="form-group">
          <label for="exampleInputEmail1">Category Name</label>
          <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter Category Name" name="cateName" required>

        </div>

        <div class="form-check mt-2">
          <input  type="checkbox" class="form-check-input checks" id="exampleCheck1" value="1" name="cateShow">
          <label class="form-check-label" for="exampleCheck1">Show Top Menu</label>
        </div>
        <button type="submit" class="mt-2 btn btn-primary" name="cateSub">Create</button>
      </form>
    </div>
  </div>

  <div class="card-body tableCard m-5 p-4 col-8 customCard">
    <h5 class="card-title fw-semibold mb-4">All Category</h5>
    <div class="table-responsive">
      <table class="table text-nowrap mb-0 align-middle">
        <thead class="text-dark fs-4">
          <tr>
            <th class="border-bottom-0">
              <h6 class="fw-semibold mb-0">Id</h6>
            </th>
            <th class="border-bottom-0">
              <h6 class="fw-semibold mb-0">Category Name</h6>
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
          $selCate = "select * from category order by id desc";
          $selQuery = mysqli_query($conn, $selCate);
          $id  = 0;
          while ($selFetch = mysqli_fetch_assoc($selQuery)) {
            $id++;

          ?>
            <tr>
              <td class="border-bottom-0">
                <h6 class="fw-semibold mb-0"><?php echo $id ?></h6>
              </td>

              <td class="border-bottom-0">
                <p class="mb-0 fw-normal"><?php echo $selFetch['cateName'] ?></p>
              </td>
              <td class="border-bottom-0">
                <div class="d-flex align-items-center gap-2">
                  <span class="badge bg-success rounded-3 fw-semibold">Active</span>
                </div>
              </td>
              <td class="border-bottom-0">
                <a href="edit-cate.php?edit=<?php echo $selFetch['id'] ?>" class="btn-primary btn btn-sm">Edit</a>
                <a href="category.php?deleteCate=<?php echo $selFetch['id'] ?>" class="btn-danger btn btn-sm">Delete</a>
              </td>
            </tr>
          <?php
          }

          if (isset($_GET['deleteCate'])) {
            $deleteCate = $_GET['deleteCate'];
            $delCate = "DELETE FROM category WHERE `category`.`id` = '$deleteCate'";
            $cateQuery = mysqli_query($conn, $delCate);

            if(($cateQuery)){
              $succ  = true;
              $succMsg =  "Category Deleted Successfully";
          }
          }
          ?>
        </tbody>
      </table>
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
    border-radius: 5px;
    background: #e0e0e0;
    box-shadow: 5px 5px 10px #bebebe,
      -5px -5px 10px #ffffff;
  }

  .tableCard {
    overflow-y: auto;
    height: 400px;
  }

  input {
    border-radius: 50px;
    background: #e0e0e0;
    border: none;
    outline: none;
    box-shadow: inset 3px 3px 3px #bebebe,
      inset -3px -3px 3px #ffffff!important;
  }
  input:focus{
    border: none;
    outline: none;
    box-shadow: inset 3px 3px 3px #bebebe,
      inset -3px -3px 3px #ffffff!important;
  }
</style>

<?php include  "../php-admin/footer.php" ?>