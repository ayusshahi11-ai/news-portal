<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="frontend-style.css">
    <style>

    </style>

</head>

<body>
    <div id="sidebar" class="col-md-4 ">
        <!-- search box -->
        <div class="search-box-container">
            <h4>Search</h4>
            <form class="search-post" action="search.php" method="GET">
                <div class="input-group">
                    <input type="text" name="value" class="form-control" placeholder="Search .....">
                    <span class="input-group-btn">
                        <button type="submit" name="search" class="btn btn-danger">Search</button>
                    </span>
                </div>
            </form>
        </div>
        <!-- /search box -->
        <!-- recent posts box -->
        <div class="recent-post-container">
            <h4>Trending News</h4>
            <?php
            $news_count_query = "select * from tbl_news order by news_count desc limit 0,7 ";
            $news_count_result = mysqli_query($db_con, $news_count_query) or die(mysqli_error($db_con));
            if (mysqli_num_rows($news_count_result) > 0) {
                while ($news_count_row = mysqli_fetch_assoc($news_count_result)) {
                    if (!empty($news_count_row['news_img'])) {
                        $news_img = $news_count_row['news_img'];
                    } else {
                        $news_img = 'no_img.jpg';
                    }
            ?>
                    <div class="recent-post">
                        <a class="post-img" href="">
                            <img src="images/<?php echo $news_img; ?>" alt="" />
                        </a>
                        <div class="post-content">
                            <h5><a href="single.php" style="text-decoration: none;"><?php echo $news_count_row['news_title']; ?></a></h5>
                            <div class="title-author flx">
                                <div class="news-author-wrap ">
                                    <div class="news-author">
                                        <?php
                                        $a_id = $news_count_row['news_author'];
                                        if ($a_id != 'Admin') {
                                            $news_selected_author = "select * from tbl_author where a_id = $a_id ";
                                            $author_row = mysqli_query($db_con, $news_selected_author) or die(mysqli_error($db_con));
                                            $author_row = mysqli_fetch_assoc($author_row);
                                            if (!empty($author_row['a_image'])) {
                                                $author_img = $author_row['a_image'];
                                            } else {
                                                $author_img = 'no_img.jpg';
                                            }
                                        ?>
                                            <span class="author-icon" style=" height: 30px; width: 25px; border-radius: 50%; border: solid 2px #fff; overflow: hidden; ">
                                                <img src="author-images/<?php echo $author_img; ?>" alt="Tree">
                                            </span>
                                            <span class="author-name"><a href="author.php?aid=<?php echo $author_row['a_id']; ?>" style="text-decoration: none;"> <?php echo ucfirst($author_row['a_name']); ?></a>
                                            </span>
                                        <?php } else {
                                        ?>
                                            <span class="author-icon" style=" height: 30px; width: 25px; border-radius: 50%; border: solid 2px #fff; overflow: hidden; ">
                                                <img src="author-images/no_img.jpg" alt="Tree">
                                            </span>
                                            <span class="author-name"><a href="#" style="text-decoration: none;"> <?php echo $a_id; ?></a>
                                            </span>
                                        <?php
                                        } ?>
                                    </div>

                                    <span>
                                        <i class="fa fa-calendar" style="margin-top: 10px;" aria-hidden="true"></i>
                                        <?php echo $news_count_row['news_date']; ?>
                                    </span>
                                </div>
                            </div>
                            <a class="read-more" href="single.php?nid=<?php echo $news_count_row['n_id']; ?>">read more</a>
                        </div>


                    </div>
            <?php
                }
            }
            ?>

        </div>

    </div>

    </div>
    <!-- /recent posts box -->



    </div>




</body>

</html>