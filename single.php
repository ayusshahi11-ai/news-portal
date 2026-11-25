<?php
session_start();


if (isset($_GET['nid'])) {
    $nid = $_GET['nid'];

    // $count=$row['news_count'];

    // if(!isset($row['news_count']))
    // {
    //     $count = 0 ; }
    //     else
    //     {
    //         $count ; 
    //     }

    //     $count = intval($count)+1 ;

    //     $update_count = "UPDATE  tbl_news set news_count = $count where n_id = $nid " ;
    //     $update_count_detail = mysqli_query($db_con,$update_count) or die(mysqli_error($db_con));


?>
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Document</title>
        <link rel="stylesheet" href="frontend-style.css">

        <style>
            .title-author {
                display: flex;
            }

            .title-author {
                justify-content: center;
                align-items: center;
                margin-bottom: 30px;
            }

            .title-author {
                display: none;
            }

            .title-author {
                display: flex;
                flex-wrap: wrap;
            }

            .flx {
                display: flex;
            }

            * {
                box-sizing: border-box;
            }

            .title-author>div {
                margin: 0 10px;
            }

            .title-author .news-author-wrap {
                margin-right: 18px;
            }

            .title-author>div {
                margin-right: 24px;
            }

            .news-author-wrap {
                display: inline-flex;
                position: relative;
            }

            .news-author-wrap .news-author {
                margin-right: 10px;
            }

            * {
                box-sizing: border-box;
            }

            .author-icon {
                height: 45px;
                width: 45px;
            }

            .news-author span:first-child {
                margin-right: 10px;
            }

            .news-author-wrap .author-icon {
                background-color: #fff;
                border: solid 3px #fff;
                box-shadow: 0 0 0 1px rgba(0, 0, 0, .18);
            }

            .news-author .author-icon {
                height: 50px;
                width: 50px;
                border-radius: 50%;
                border: solid 2px #fff;
                overflow: hidden;
            }

            .news-author span {
                display: inline-block;
                vertical-align: middle;
            }

            * {
                box-sizing: border-box;
            }

            .news-author .author-icon>img {
                height: 100%;
                width: 100%;
                object-fit: cover;
            }

            img {
                object-position: center top;
            }
        </style>

    </head>

    <body>

        <?php include('header.php'); ?>
        <?php
        $news_query = "select * from tbl_news where n_id = $nid";
        $check_count_news_result = mysqli_query($db_con, $news_query) or die(mysqli_error($db_con));
        if (mysqli_num_rows($check_count_news_result) > 0) {
            $count_row = mysqli_fetch_assoc($check_count_news_result);
        } else {
            header('Location:index.php');
        }
        $news_count = (empty($count_row['news_count'])) ? 0 : intval($count_row['news_count']);
        $news_count = $news_count + 1;
        $news_count_update_query = "update tbl_news set news_count = $news_count where n_id = $nid";
        mysqli_query($db_con, $news_count_update_query) or die(mysqli_error($db_con));

        ?>

        <body>
            <?php
            /**
             *new tblt query with where condition nid 
             * news data 
             * each data print in each static section
             * author id and query in author table with author id
             * author data print
             */
            ?>
            <div id="main-content">
                <div class="container" style="margin-top:100px ">
                    <div class="row">
                        <div class="col-md-8">
                            <!-- post-container -->
                            <div class="post-container">
                                <?php

                                $select_title = "SELECT * from tbl_news where n_id = '$nid'";
                                $select_title_detail = mysqli_query($db_con, $select_title) or die(mysqli_error($db_con));
                                if (mysqli_num_rows($select_title_detail) > 0) {
                                    $row = mysqli_fetch_assoc($select_title_detail);
                                    $cid = $row['news_category'];
                                    if (!empty($row['news_img'])) {
                                        $row_img = $row['news_img'];
                                    } else {
                                        $row_img = 'no_img.jpg';
                                    }

                                ?>
                                    <div class="post-content single-post" style=" color: #1e90ff; font-size: 14px; letter-spacing: 0.5px; margin:0 0 10px;">
                                        <h4 align="center"><?php echo nl2br($row['news_title']); ?></h2>

                                            <div class="post-content double-post" style=" color: #1e90ff; font-size: 14px; letter-spacing: 0.5px; margin:0 0 10px;">
                                                <h5 align="center"><?php echo nl2br($row['news_sub_title']); ?></h5>
                                                <div class="title-author flx">

                                                    <div class="news-author-wrap ">
                                                        <?php
                                                        if ($row['news_author'] != 'Admin') {
                                                            $a_id = $row['news_author'];
                                                            $select_author = "SELECT * from tbl_author where a_id = '$a_id' ";
                                                            $select_author_detail = mysqli_query($db_con, $select_author) or die(mysqli_error($db_con));
                                                            if (mysqli_num_rows($select_author_detail) > 0) {
                                                                $author = mysqli_fetch_assoc($select_author_detail);

                                                                if (!empty($author['a_image'])) {
                                                                    $author_img = $author['a_image'];
                                                                } else {
                                                                    $author_img = 'no_img.jpg';
                                                                }
                                                                if ($author) {

                                                        ?>
                                                                    <div class="news-author">
                                                                        <span class="author-icon">
                                                                            <img src="author-images/<?php echo $author_img; ?>" class="card-img-top" alt="<?php echo $author['a_name']; ?>">
                                                                        </span>
                                                                        <span class="author-name"><a href="author.php?aid=<?php echo $author['a_id']; ?>" style="text-decoration: none;"> <?php echo $author['a_name']; ?></a>
                                                                        </span>
                                                                <?php  }
                                                            } else {
                                                                echo 'Admin';
                                                            }
                                                                ?>
                                                                    </div>
                                                                <?php } ?>



                                                                <span>
                                                                    <i class="fa fa-calendar" style="margin-top: 23px;" aria-hidden="true"></i>
                                                                    <?php echo $row['news_date']; ?>
                                                                </span>
                                                    </div>
                                                </div>
                                                <img class="single-feature-image" src="images/<?php echo $row_img; ?>" class="card-img-top" alt="<?php echo nl2br($row['news_title']); ?>" />
                                                <p class="description"><?php echo nl2br($row['news_description']); ?>
                                                </p>

                                            </div>

                                    </div>



                            </div>
                            <!-- /post-container -->

                        </div>
                        <?php include 'sidebar.php'; ?>


                    </div>


                </div>

            </div>

            </div>
          
            <?php include('comment-section.php'); ?>
            <div id="main-content">
                <div class="container">
                    <div class="row">
                        <div class="col-md-8">
                            <!-- post-container -->
                            <div class="post-container">

                                <?php /*
                                                    related news
                                                                        */ ?>
                                <h2 class="title" style="margin-top: 20px;"><b style="color: black;">Related News</b></h2>
                                <div class="row row-cols-1 row-cols-md-3 g-4">
                                    <?php
                                    $select_news = "select * from tbl_news where news_category = $cid  order by n_id desc limit 0,7";
                                    $select_news_detail = mysqli_query($db_con, $select_news) or die(mysqli_error($db_con));
                                    if (mysqli_num_rows($select_news_detail) > 0) {
                                        while ($news_row = mysqli_fetch_assoc($select_news_detail)) {

                                            if (!empty($news_row['news_img'])) {
                                                $cat_news_img = $news_row['news_img'];
                                            } else {
                                                $cat_news_img = 'no_img.jpg';
                                            }
                                            if ($nid != $news_row['n_id']) {
                                    ?>

                                                <div class="col">
                                                    <div class="card h-100">
                                                        <img src="images\<?php echo $cat_news_img; ?>" class="card-img-top" alt="Sports" />
                                                        <div class="card-body">
                                                            <h5 class="card-title" style="font-family: 'Times New Roman', Times, serif; color:black;"><b><?php echo $news_row['news_title']; ?></b></h5>
                                                            <p class="card-text">
                                                                <?php
                                                                if (!empty($news_row['news_sub_title'])) {
                                                                    echo $news_row['news_sub_title'];
                                                                } else {
                                                                    $short_content = $news_row['news_description'];
                                                                    echo substr($short_content, 0, 25) . '.....';
                                                                }
                                                                ?>
                                                            </p><a class='read-more pull-right' href='single.php?nid=<?php echo $news_row['n_id']; ?>'>read more</a>
                                                        </div>
                                                    </div>
                                                </div>
                                    <?php
                                            }
                                        }
                                    } else {
                                        echo "<b>!!!No News Found!!!</b>";
                                    }
                                    ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <?php include 'footer.php'; ?>

        </body>

    </html>
<?php } else {
                                    header('location:index.php');
                                }
                            }
?>