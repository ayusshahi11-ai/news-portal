<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Recent News</title>
</head>

<body>
    <?php
    include('header.php');
    ?>

  <div id="main-content">
    <div class="container" style="margin-top:100px ">

      <div class="row">
        <div class="col-md-8">
          <!-- post-container -->
          <div class="post-container" >
            <h2 class="title"><b>Recent News</b></h2>
            <!-- post-container -->

            <div class="post-content single-post">          
                  <div class="row row-cols-1 row-cols-md-3 g-4" style="margin-top : 20px ; margin-left: 10px;">
                  <?php 
                   
$news_count_query = "select * from tbl_news order by n_id desc ";
$news_count_result = mysqli_query($db_con,$news_count_query) or die(mysqli_error($db_con));
if(mysqli_num_rows($news_count_result)>0){
	while($news_count_row = mysqli_fetch_assoc($news_count_result)){
        if (!empty($news_count_row['news_img'])) {
            $news_img = $news_count_row['news_img'];
          } else {
            $news_img = 'no_img.jpg';
          }
		?>
                    <div class="col">
                      <div class="card h-100">
                        <img src="images\<?php echo $news_img; ?>" class="card-img-top" alt="<?php echo $news_count_row['news_title']; ?>" />
                        <div class="card-body">
                          <h5 class="card-title" style="font-family: 'Times New Roman', Times, serif;"><b><?php echo $news_count_row['news_sub_title'] ?></b></h5>
                          <p class="card-text">
                            <?php
                            if (!empty($news_count_row['news_sub_title'])) {
                              echo $news_count_row['news_sub_title'];
                            } else {
                              $short_content = $news_count_row['news_description'];
                              echo substr($short_content, 0, 25) . '.....';
                            }
                            ?>
                          </p>
                          <a class='read-more pull-right' href='single.php?nid=<?php echo $news_count_row['n_id']; ?>'>read more</a>
                                

                        </div>

                      </div>
                    </div>
                    
                    <?php
                }
              } else {
                echo "<b>!!!No News Found!!!</b>";
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
  <?php include 'footer.php'?>

</body>

</html>