<?php include "php/header.php";
include "php/conn.php";
$selPost = "select * from posts order by id desc";
$selPostQuery = mysqli_query($conn, $selPost);
$selFetchPost = mysqli_fetch_assoc($selPostQuery);


$cateId = $selFetchPost['cate'];
$cateSql = "select * from  category where id = '$cateId'";;
$cateQuery = mysqli_query($conn, $cateSql);
$cateFetch = mysqli_fetch_assoc($cateQuery);

$userIds = $selFetchPost['user'];

$usernameSql = "select * from user where id = '$userIds'";
$usernameQuery = mysqli_query($conn, $usernameSql);
$userName = mysqli_fetch_assoc($usernameQuery);
// get the time ago function 

?>

<div class="container " style="padding: 0;">
    <!-- homeSection start  -->
    <div class="homeSection" id="home">
        <div class="row justifyBetween itemsCenter resCol">
            <div class="homeContent">
                <div class="cateContent row itemsCenter">
                    <button class="btn"><?php echo $cateFetch['cateName'] ?></button>
                    <p><?php echo $selFetchPost['time'] ?></p>
                </div>
                <div class="homeTextContent">
                    <h1><a href="view.php?posts=<?php echo $selFetchPost['id'] ?>"><?php echo $selFetchPost['title'] ?></a> </h1>
                    <p>
                        <?php echo $selFetchPost['desOther'] ?>

                    </p>
                    <div class="authorBox ">
                        <img src="imgs/authors//author-2.jpg" alt="">
                        <h5 class="mobileRes row itemsCenter"><?php echo $userName['name'] ?> <span><?php echo $selFetchPost['time'] ?></span></h5>
                    </div>
                </div>

            </div>
            <div class="homeImg">
                <img src="shajjad/cleaning/posts/<?php echo $selFetchPost['thumb'] ?>" alt="">
            </div>
        </div>
    </div>
    <!-- homeSection end -->
</div>


<!-- main content start  -->
<main>
    <section class="featureContainer">
        <div class="container">
            <div class="row justifyCenter itemsCenter resCol laptop">

                <?php

                $selPost2 = "select * from posts order by id desc limit 0,3";
                $selPostQuery2 = mysqli_query($conn, $selPost2);
                while ($posts2 = mysqli_fetch_assoc($selPostQuery2)) {
                    $cateId2  = $posts2['cate'];
                    $cateSql2 = "select * from  category where id = '$cateId'";;
                    $cateQuery2 = mysqli_query($conn, $cateSql2);
                    $cateFetch2 = mysqli_fetch_assoc($cateQuery2);



                ?>
                    <div class="featureBox row justifyCenter itemsCenter mobileTwoRes">
                        <div class="featureImg">
                            <img src="shajjad/cleaning/posts/<?php echo $posts2['thumb'] ?>" alt="">
                        </div>
                        <div class="featureContent">
                            <h1><a href="view.php?posts=<?php echo $posts2['id'] ?>" style="color:#222831"> <?php echo $posts2['title'] ?></a></h1>
                            <div class="timeContent mobileRes row">
                                <span class="title">Sep, 2021</span>
                                <span class="times">13k views</span>
                            </div>
                        </div>

                    </div>

                <?php     } ?>
            </div>
        </div>
    </section>

    <section class="newBlog">
        <div class="container">
            <div class="titleBox">
                <h1>New Blogs</h1>
            </div>
            <div class="row">
                <?php

                $selPost3 = "select * from posts order by id desc limit 0,6";
                $selPostQuery3 = mysqli_query($conn, $selPost3);
                while ($posts3 = mysqli_fetch_assoc($selPostQuery3)) {
                    $cateId2  = $posts3['cate'];
                    $cateSql2 = "select * from  category where id = '$cateId2'";;
                    $cateQuery2 = mysqli_query($conn, $cateSql2);
                    $cateFetch2 = mysqli_fetch_assoc($cateQuery2);



                ?>
                    <div class="blogCard">




                        <div class="cateBtnContainer">
                            <a href=""><?php echo $cateFetch2['cateName'] ?></a>
                        </div>
                        <a href="view.php?posts=<?php echo $posts3['id'] ?>" style="color: #222831;"> <img src="shajjad/cleaning/posts/<?php echo $posts3['thumb'] ?>" alt="">
                        </a> <span class="titleBar">27 September</span>
                        <h1> <a href="view.php?posts=<?php echo $posts3['id'] ?>" style="color: #222831;"> <?php echo $posts3['title'] ?></a></h1>

                    </div>

                <?php     } ?>


            </div>
        </div>
    </section>



    <section class="newsLetter">
        <div class="container">
            <div class="row flexCol justifyCenter itemsCenter resCol ">
                <div class="newsLeft">
                    <div class="newsLetterText">
                        <img src="imgs/theme/svg/send.svg" alt="">
                        <h1>Subscribe</h1>

                    </div>
                    <h1 class="newLetterTextTwo">To Our News Letter</h1>

                </div>
                <form class="newsRight row  justifyCenter itemsCenter resCol mobileRes mobileTwoRes" method="post">
                    <input type="email" placeholder="Enter Your Email" id="email" name="email" required>
                    <button id="subs" class="btn">Subscribe</button>
                </form>
            </div>


        </div>
    </section>
</main>
<!-- main content end -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script type="text/javascript">
    $(document).ready(function() {

        $('#subs').click(function(event) {
            var btns = document.querySelector('#subs').innerHTML = "Please Wait ..";
            event.preventDefault();
            var email = $('#email').val();
            if (email == "") {
                alert("please Write your email")
            } else {
                $.ajax({
                    type: "POST",
                    url: "upload.php",
                    data: {
                        email: email
                    },

                    success: function(result) {
                        ;
                        var btns = document.querySelector('#subs').innerHTML = "Subscribe";
                        alert("Subscribed");
                    }
                });
            }



        });
    });
</script>
<?php include "php/footer.php" ?>