<?php include "php/header.php" ?>
<?php 
$postsSql = "select * from posts order by id desc";
$postQuery  = mysqli_query($conn,$postsSql);

?>
<?php

function timeAgo($timestamp) {
    $current_time = time();
    $time_difference = $current_time - $timestamp;

    $seconds_per_minute = 60;
    $seconds_per_hour = 60 * $seconds_per_minute;
    $seconds_per_day = 24 * $seconds_per_hour;
    $seconds_per_month = 30 * $seconds_per_day;
    $seconds_per_year = 365 * $seconds_per_day;

    if ($time_difference < $seconds_per_minute) {
        return $time_difference . ' second' . ($time_difference == 1 ? '' : 's') . ' ago';
    } elseif ($time_difference < $seconds_per_hour) {
        $minutes_ago = floor($time_difference / $seconds_per_minute);
        return $minutes_ago . ' minute' . ($minutes_ago == 1 ? '' : 's') . ' ago';
    } elseif ($time_difference < $seconds_per_day) {
        $hours_ago = floor($time_difference / $seconds_per_hour);
        return $hours_ago . ' hour' . ($hours_ago == 1 ? '' : 's') . ' ago';
    } elseif ($time_difference < $seconds_per_month) {
        $days_ago = floor($time_difference / $seconds_per_day);
        return $days_ago . ' day' . ($days_ago == 1 ? '' : 's') . ' ago';
    } elseif ($time_difference < $seconds_per_year) {
        $months_ago = floor($time_difference / $seconds_per_month);
        return $months_ago . ' month' . ($months_ago == 1 ? '' : 's') . ' ago';
    } else {
        $years_ago = floor($time_difference / $seconds_per_year);
        return $years_ago . ' year' . ($years_ago == 1 ? '' : 's') . ' ago';
    }
}

// Example usage with a timestamp



?>
    <!-- main content start -->
    <main>
      <section class="blogSection">
        <div class="container">
            <div class="row flexCol">
                <?php 
             while($postsAll = mysqli_fetch_assoc($postQuery)){
           

                ?>
                <a style="color:#000; margin-top:20px" href="view.php?posts=<?php echo $postsAll['id'] ?>">
                <div class="blogCardItem row  itemsCenter mobileRes">
                    <img class="cardImg" src="shajjad/cleaning/posts/<?php  echo $postsAll['thumb'] ?>" alt="">
                   <div class="blogCardContent">
                    <h1><?php  echo $postsAll['title'] ?> </h1>
                    <div class="authorBox ">
                        <img style="margin-right: 30px;" src="imgs/authors/author-2.jpg" alt="">
                       <h5 class="mobileRes row itemsCenter flexCol"> <span><?php echo timeAgo($postsAll['time']) ?></span></h5>
                    </div>
                   </div>
                </div>
                </a>
                <?php 
                  }
                ?>
           
            </div>
        </div>
      </section>
    </main>
    <!-- main content end -->
    <?php include "php/footer.php" ?>