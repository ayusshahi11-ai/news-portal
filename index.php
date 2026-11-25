<?php include('header.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="frontend-style.css">
  <title>Newskhabar</title>
</head>
<body>
  <div id="main-content" >
    <div class="container" style="margin-top:100px ">
      <div class="row">
        <div class="col-md-8">
          <!-- post-container -->
          <div class="post-container">
            <div class="post-content single-post">
              
                  <?php include('home-section/breaking-section.php'); ?>
                  <?php include('home-section/recent-news.php'); ?>
                  <?php include('home-section/sport-section.php'); ?>
                  <?php include('home-section/entertainment-section.php'); ?>
                  <?php include('home-section/crime-section.php'); ?>
                  <?php include('home-section/international-section.php'); ?>
                  <?php include('home-section/viral-section.php'); ?>
                  <?php include('home-section/politics-section.php'); ?>
                         
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