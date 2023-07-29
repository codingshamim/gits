
<?php 
include "../php/conn.php";

?>

<?php include "../php-admin/function.php" ?>

<?php include "../php-admin/header.php";
$postId = $_GET['editPost'];
$selPost = "select * from posts where id = '$postId'";
$postQuery = mysqli_query($conn,$selPost);
$posts = mysqli_fetch_assoc($postQuery);

if(isset($_POST['updatePost'])){
    $postTitle = mysqli_real_escape_string($conn, $_POST['postTitle']);
    $cateGory = mysqli_real_escape_string($conn, $_POST['cateGory']);
    $postDesc = mysqli_real_escape_string($conn, $_POST['postDesc']);
    $otherDes = mysqli_real_escape_string($conn, $_POST['otherDes']);
    $defaultThum = mysqli_real_escape_string($conn, $_POST['defaultThum']);


    $postThumbName = $_FILES['postThumb']['name'];
    $postThumbTmp = $_FILES['postThumb']['tmp_name'];
    $folder = "cleaning/posts/";

    $ext = pathinfo($postThumbName, PATHINFO_EXTENSION);
    if ($ext == 'png' || $ext == 'jpg' || $ext == 'jpeg') {
     
       $uploadThumb =  move_uploaded_file($postThumbTmp, $folder . $postThumbName);
    }else{
        $err = true;
        $errMsg = "Only Jpg Jpeg Png File Supported";
    }

    if($postThumbName == ""){
        $updatePost =  "UPDATE `posts` SET `title` = '$postTitle', `cate` = '$cateGory', `Descs` = '$postDesc', `thumb` = '$defaultThum ', user = '$userId', `desOther` = '$otherDes' WHERE `posts`.`id` = '$postId'"; 
        $updateQuery =  mysqli_query($conn,$updatePost);
        if($updateQuery){
            $succ = true;
            $succMsg = "Post Updated Successfully";
        }
    }else
    {
        if($uploadThumb){
            $updatePost =  "UPDATE `posts` SET `title` = '$postTitle', `cate` = '$cateGory', `Descs` = '$postDesc', `thumb` = '$postThumbName ', user = '$userId', `desOther` = '$otherDes' WHERE `posts`.`id` = '$postId'"; 
            $updateQuery =  mysqli_query($conn,$updatePost);
              if($updateQuery){
                  $succ = true;
                  $succMsg = "Post Updated Successfully";
              }
          }
    }
    
   
}

?>
<form class="container-fluid" enctype="multipart/form-data" action="edit-post.php?editPost=<?php echo $posts['id'] ?>" method="post">
  <div class="row">

  <?php
    if ($succ) {



    ?>

      <div class="alert alert-success" role="alert">
        <?php echo $succMsg ?>
      </div>
    <?php
    }
    ?>
    <div class="col-sm-5">
      <div class="card customCard">
        
        <div class="card-body">
          <h5 class="card-title">Post Title</h5>
          <input type="text" class="form-control" value="<?php echo $posts['title'] ?>" name="postTitle">
        </div>
      </div>
      <div class="card customCard ">
        <div class="card-body">
          <h5 class="card-title">Select Post Thumbnail</h5>
          <span id="choose">Choose Thumbnail</span>
          <input id="imgInp" type="file" class="postCard form-control" placeholder="Enter Post Title" name="postThumb">
          <input type="hidden" value="<?php echo $posts['thumb'] ?>" name="defaultThum">
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
          <img id="prev" class="rks-img-bodys" src="cleaning/posts/<?php echo $posts['thumb'] ?>" alt="">
        </div>
      </div>
    </div>
  </div>

 

  <div class="card customCard">

    <div class="card-body">
      <h5 class="card-title">Post Description</h5>
      <textarea name="postDesc" id="editor" cols="30" rows="10"><?php echo $posts['Descs'] ?></textarea>
    </div>
  </div>

  <button class="btn-primary btn" name="updatePost"> Update Post</button>
</form>

<script src="ckeditor/ckeditor.js"></script>

<script>
  let editor = CKEDITOR.replace('editor')
  
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

  .postCard{
    position: relative;
    opacity: 0;
  }
 #choose{

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