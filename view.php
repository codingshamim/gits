<?php include "php/header.php";
error_reporting(0);
session_start();
$postId = $_GET['posts'];
$postSql = "select * from posts where id = '$postId'";
$postQuery = mysqli_query($conn,$postSql);
$postss = mysqli_fetch_assoc($postQuery);
   
// count the page view 
$id = $_GET['posts'];
$sql = "UPDATE posts SET views = views + 1 WHERE id = '$postId'"; //Suppose your table name is posts
mysqli_query($conn,$sql);

$postView = $postss['views'];

$postuser = $postss['user'];
  $selUser = "select * from user where id = '$postuser'";
  $selUserquer = mysqli_query($conn, $selUser);
  $usersName = mysqli_fetch_assoc($selUserquer)


?>
    <main>
        <section class="viewBlog">
            <div class="container">
                <div class="cateContent row itemsCenter">
                    <button class="btn"> <?php echo $postss['cate'] ?></button>
                    <p>August 12, 2021</p>
                </div>
                <div class="blogTitle">
                    <h1> <?php echo $postss['title'] ?></h1>
                </div>
                <div class="countViews row justifyBetween itemsCenter mobileRes mobileTwoRes resCol">
                    <div class="authorBox viewAthor">
                        <img src="imgs/authors/author-2.jpg" alt="">
                        <h5 class="mobileRes row itemsCenter"><?php echo $usersName['name'] ?> <span>16 mins to read</span></h5>
                    </div>
                    <div class="viewsCounter row justifyCenter itemsCenter">
                        <ion-icon name="eye-outline"></ion-icon> <h4><?php echo $postss['views'] ?> Views</h4>
                    </div>
                </div>
                

                <div class="blogMainImg">
                    <img src="shajjad/cleaning/posts/<?php echo $postss['thumb'] ?>" alt="">
                </div>
                <div class="ckContent">
                 

                       <?php echo $postss['Descs'] ?>
                 
                 
                </div>
            </div>
        </section>


    </main>

    <?php include "php/footer.php" ?>