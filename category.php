<?php

if (isset($_GET['cat_id'])) {
  $cid = $_GET['cat_id'];
?>
  <?php include('header.php'); ?>
  <!DOCTYPE html>
  <html lang="en">

  <head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Category</title>
  </head>

  <style>
    .card {
      box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);
      transition: 0.3s;
      width: 100%;
      border-radius: 5px;
    }

    .card :hover {
      box-shadow: 0 8px 16px 0 rgba(0, 0, 0, 0.2);
    }

    img {
      border-radius: 5px 5px 0 0;
    }

    .container {
      padding: 2px 16px;
    }


    .title {
      border-bottom: 4px solid black;
      font-family: "Times New Roman', Times, serif ";
      font-size: 40px;
      word-spacing: 2px;
    }

    a.read-more {
      color: #fff;
      background-color: #1E90FF;
      font-size: 12px;
      text-transform: capitalize;
      padding: 3px 8px;
      border-radius: 2px;
      transition: all 0.3s;
    }

    .pull-right {
      float: right;
    }

    .pull-right {
      float: right !important;
    }

    a,
    a:hover,
    a:focus {
      text-decoration: none;
      outline: none;
    }

    a {
      color: #337ab7;
      text-decoration: none;
    }

    a {
      background-color: transparent;
    }

    * {
      -webkit-box-sizing: border-box;
      -moz-box-sizing: border-box;
      box-sizing: border-box;
    }

    user agent stylesheet a:-webkit-any-link {
      color: -webkit-link;
      cursor: pointer;
      text-decoration: underline;
    }
  </style>

  <body>
    <!-- This is cats id <?php echo $cid; ?> -->
    <div id="main-content">
      <div class="container" style="margin-top:100px ">
        <div class="row">
          <div class="col-md-8">
            <!-- post-container -->
            <div class="post-container">
              <div class="post-content single-post">
                <?php
                $catgory_name_query = "select * from tbl_category where c_id = $cid";
                $catgory_details = mysqli_query($db_con, $catgory_name_query);
                if (mysqli_num_rows($catgory_details) > 0) {
                  $cat_data = mysqli_fetch_assoc($catgory_details);
                ?>
                  <h2 class="title"><b><?php echo $cat_data['c_name']; ?></b></h2>
                <?php } ?>
                <div class="row row-cols-1 row-cols-md-3 g-4">
                  <?php
                  $cat_news_query = "select * from tbl_news where news_category = $cid order by n_id desc";
                  $cat_news_detail = mysqli_query($db_con, $cat_news_query);
                  if (mysqli_num_rows($cat_news_detail) > 0) {
                    while ($cat_news = mysqli_fetch_assoc($cat_news_detail)) {
                      if (!empty($cat_news['news_img'])) {
                        $cat_news_img = $cat_news['news_img'];
                      } else {
                        $cat_news_img = 'no_img.jpg';
                      }
                  ?>
                      <div class="col">
                        <div class="card h-100">
                          <img src="images/<?php echo $cat_news_img; ?>" class="card-img-top" alt="<?php echo $cat_news['news_title']; ?>" />
                          <div class="card-body">
                            <h5 class="card-title" style="font-family: 'Times New Roman', Times, serif;"><b><?php echo $cat_news['news_title']; ?></b></h5>
                            <p class="card-text">
                              <?php
                              if (!empty($cat_news['news_sub_title'])) {
                                echo $cat_news['news_sub_title'];
                              } else {
                                $short_content = $cat_news['news_description'];
                                echo substr($short_content, 0, 25) . '.....';
                              }
                              ?>
                            </p>
                            <a class='read-more pull-right' href='single.php?nid=<?php echo $cat_news['n_id']; ?>'>read more</a>
                          </div>
                        </div>
                      </div>
                  <?php }
                  } ?>

                </div>

              </div>
            </div>

          </div>
          <?php include 'sidebar.php'; ?>
        </div>
      </div>
    </div>
    <?php include 'footer.php';?>

  </body>

  </html>
<?php } else {
  header('location:index.php');
}
?>