<?php

if (isset($_GET['aid'])) {
  $aid = $_GET['aid'];
?>
  <?php include('header.php'); ?>
  <!DOCTYPE html>
  <html lang="en">

  <head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>authegory</title>
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
    <!-- This is auths id <?php echo $cid; ?> -->
    <div id="main-content">
      <div class="container" style="margin-top:100px ">
        <div class="row">
          <div class="col-md-8">
            <!-- post-container -->
            <div class="post-container" >
              <div class="post-content single-post">
                <?php
                $authorname_query = "select * from tbl_author where a_id = $aid";
                $authordetails = mysqli_query($db_con, $authorname_query);
                if (mysqli_num_rows($authordetails) > 0) {
                  $auth_data = mysqli_fetch_assoc($authordetails);
                ?>
                  <h2 class="title"><b>Posted By : <?php echo ucfirst($auth_data['a_name']); ?></b></h2> 
                <?php } ?>
                <div class="row row-cols-1 row-cols-md-3 g-4">
                  <?php
                  $auth_news_query = "select * from tbl_news where news_author = $aid order by n_id desc";
                  $auth_news_detail = mysqli_query($db_con, $auth_news_query);
                  if (mysqli_num_rows($auth_news_detail) > 0) {
                    while ($auth_news = mysqli_fetch_assoc($auth_news_detail)) {
                      if (!empty($auth_news['news_img'])) {
                        $auth_news_img = $auth_news['news_img'];
                      } else {
                        $auth_news_img = 'no_img.jpg';
                      }
                  ?>
                      <div class="col">
                        <div class="card h-100">
                          <img src="images/<?php echo $auth_news_img; ?>" class="card-img-top" alt="<?php echo $auth_news['news_title']; ?>" />
                          <div class="card-body">
                            <h5 class="card-title" style="font-family: 'Times New Roman', Times, serif;"><b><?php echo $auth_news['news_title']; ?></b></h5>
                            <p class="card-text">
                              <?php
                              if (!empty($auth_news['news_sub_title'])) {
                                echo $auth_news['news_sub_title'];
                              } else {
                                $short_content = $auth_news['news_description'];
                                echo substr($short_content, 0, 25) . '.....';
                              }
                              ?>
                            </p>
                            <a class='read-more pull-right' href='single.php?nid=<?php echo $auth_news['n_id']; ?>'>read more</a>
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

  </body>
  </body>

  </html>
<?php } else {
  header('loauthion:index.php');
}
?>