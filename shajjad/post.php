

<?php
error_reporting(0);
include "../php-admin/function.php" ?>
<?php include "../php-admin/post-admin.php" ?>

<?php 

include "../php-admin/header.php" ?>
<form class="container-fluid" action="post.php" method="post" enctype="multipart/form-data">
  <div class="row">
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
    <div class="col-sm-5">
      <div class="card customCard">
        <div class="card-body">
          <h5 class="card-title">Post Title</h5>
          <input name="postTitle" type="text" class="form-control" placeholder="Enter Post Title" required>
        </div>
      </div>
      <div class="card customCard ">
        <div class="card-body">
          <h5 class="card-title">Select Post Thumbnail</h5>
          <span id="choose">Choose Thumbnail</span>
          <input id="imgInp" type="file" class="postCard form-control" name="postThumb" required>
          <small class="mt-2">Only jpeg, jpg , png file supported</small>
        </div>
      </div>
      <div class="card customCard ">
        <div class="card-body">
          <h5 class="card-title">Post Description For Home Section Only 212 Character</h5>
          <textarea name="otherDes" id="" cols="30" rows="5" class="form-control">Write Something ..</textarea>
        </div>
      </div>
    </div>
    <div class="col-sm-5">
      <div class="card customCard">
        <div class="card-body">
          <h5 class="card-title">Select Post Category</h5>
          <select name="cateGory" class="form-control" required>
            <option value="">Select Category</option>
            <?php 
            $cate = "select * from category";
            $cateQuerys = mysqli_query($conn,$cate);
            while($cates = mysqli_fetch_assoc($cateQuerys)){

           
            
            ?>
            <option value="<?php echo $cates['id'] ?>"><?php echo $cates['cateName'] ?></option>

            <?php  } ?>
          </select>
        </div>
      </div>
      <div class="card customCard">
        <div class="card-body">
          <img id="prev" class="rks-img-bodys" src="../imgs/news/news-1.jpg" alt="">
        </div>
      </div>
    </div>
  </div>



  <div class="card customCard">

    <div class="card-body">
      <h5 class="card-title">Post Description</h5>
      <textarea name="postDesc" id="editor" cols="30" rows="10" required></textarea>
    </div>
  </div>

  <button class="btn-primary btn" name="addPost"> Add Post</button>
</form>



<script src="ckeditor/ckeditor.js"></script>

<script>
   CKEDITOR.replace( 'editor' );
  
</script>




<style>
  .inputFile input {
    opacity: 0;
    position: absolute;
    z-index: 99;
  }

  .inputFile {
    position: relative;
  }

  .inputFile span {
    position: absolute;
    z-index: 88;
    width: 100%;
    box-shadow: inset 3px 3px 3px #bebebe,
      inset -3px -3px 3px #ffffff !important;
    padding: 10px;
  }

  .catSel {
    margin-top: 70px !important;
  }

  .postCard {
    position: relative;
    opacity: 0;
  }

  #choose {

    padding: 10px 30px;
    box-shadow: 3px 3px 3px #bebebe,
      -3px -3px 3px #ffffff !important;
    position: absolute;
  }
</style>
<script>
  let imgInp = document.querySelector("#imgInp");
  imgInp.onchange = evt => {
    const [file] = imgInp.files
    if (file) {
      prev.src = URL.createObjectURL(file)
    }
  }
</script>
<?php include "../php-admin/footer.php" ?>