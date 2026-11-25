<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
</head>

<body>
  <?php include('header.php');
  if (isset($_GET['search'])) {
    $search = mysqli_real_escape_string($db_con,$_GET['value']);
  }
  ?>
  <div id="main-content">
    <div class="container" style="margin-top:100px ">

      <div class="row">
        <div class="col-md-8">
          <!-- post-container -->
          <div class="post-container" >
            <h2 class="title">Search : <?php echo $search; ?></h2>
            <!-- post-container -->

            <div class="post-content single-post">
              
                  
                  <div class="row row-cols-1 row-cols-md-3 g-4" style="margin-top : 20px ; margin-left: 10px;">
                  <?php
              $search_news = "SELECT * from tbl_news where CONCAT(news_title,news_sub_title,news_description,news_date) LIKE '%$search%' order by n_id";
              $search_news_details = mysqli_query($db_con, $search_news) or die(mysqli_error($db_con));
              if (mysqli_num_rows($search_news_details) > 0) {
                while ($row = mysqli_fetch_assoc($search_news_details)) {
                  if (!empty($row['news_img'])) {
                    $news_img = $row['news_img'];
                  } else {
                    $news_img = 'no_img.jpg';
                  }
              ?>
                    <div class="col">
                      <div class="card h-100">
                        <img src="images\<?php echo $news_img; ?>" class="card-img-top" alt="<?php echo $row['news_title']; ?>" />
                        <div class="card-body">
                          <h5 class="card-title" style="font-family: 'Times New Roman', Times, serif;"><b><?php echo $row['news_sub_title'] ?></b></h5>
                          <p class="card-text">
                            <?php
                            if (!empty($row['news_sub_title'])) {
                              echo $row['news_sub_title'];
                            } else {
                              $short_content = $row['news_description'];
                              echo substr($short_content, 0, 25) . '.....';
                            }
                            ?>
                          </p>
                          <a class='read-more pull-right' href='single.php?nid=<?php echo $row['n_id']; ?>'>read more</a>


                        </div>

                      </div>
                    </div>
                    <?php
                }
              } else {
                echo "!!!No News Found!!!";
              }
              ?>

                  </div>
              


            </div>
          </div>

        </div>
        <?php include 'sidebar.php'; ?>
      </div>
    </div>
  </div>

</body>

</html>