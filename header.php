<?php
$db_con = mysqli_connect('localhost', 'root', 'root', 'db_newskhabar') or die(mysqli_connect_errno($db_con));
$cat_id = (isset($_GET['cat_id']))?$_GET['cat_id']:'';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Online News Portal</title>
    <!-- font awesome css -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- bootstrap  -->
    <link rel="stylesheet" href="bootstrap-5.0.2-dist/css/bootstrap.min.css">
    <!-- custom css -->
    <link rel="stylesheet" href="css/main.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
    <script src="js/main.js"></script>
</head>

<body>
    <!-- navbar -->
    <nav class="navbar navbar-expand-lg navbar-light bg-white py-4 fixed-top">
        <div class="container">
            <a class="navbar-brand d-flex justify-content-between align-items-center order-lg-0 " href="index.php">
                <img src="images/news.jpg" height="40px" alt="index.php">
                <span class="text-uppercase  fw-lighter ms-2 text-dark">News Portal</span></a>
            <div class="order-lg-2">
               
               
              
            </div>
            <button class="navbar-toggler border-0" type="button" data-bs-toggle="collapse" data-bs-target="#navMenu">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse order-lg-1" id="navMenu">
                <ul class="navbar-nav mx-auto text-center">
                    <li class="nav-item px-2 py-2">
                        <a class="nav-link text-uppercase text-dark" href="index.php">Home</a>
                    </li>
                    <?php
                    
          $menu_category_query = "select * from tbl_category order by c_order asc ";
          $menu_details = mysqli_query($db_con, $menu_category_query) or die(mysqli_error($db_con));
          if (mysqli_num_rows($menu_details) > 0) {
            while ($category_fetch = mysqli_fetch_assoc($menu_details)) {
              $case = $category_fetch['show_in_menu'];
              if ($case == 'Yes') {

                   
                    ?>
                                <li class="nav-item px-2 py-2">
                                    <a class="nav-link text-uppercase text-dark <?php echo ($cat_id == $category_fetch['c_id']) ? 'btn active' : ''; ?>" href="category.php?cat_id=<?php echo $category_fetch['c_id']; ?>"><?php echo $category_fetch['c_name']; ?></a>
                                </li>
                    <?php }
                        }
                    } ?>
                    <!-- <li class="nav-item px-2 py-2" >
        <a class="nav-link text-uppercase text-dark" href="#hmobile">Mobile</a>
        </li>
        <li class="nav-item px-2 py-2" >
        <a class="nav-link text-uppercase text-dark" href="#laptop">Laptop</a>
        </li>
        
        </li> -->
                    <li class="nav-item px-2 py-2">
                        <a class="nav-link text-uppercase text-dark" href="contact.php">Contact us</a>
                    </li>
                    <li class="nav-item px-2 py-2 border-0">
                        <a class="nav-link text-uppercase text-dark" href="#popular">Popular</a>
                </ul>
            </div>
        </div>
    </nav>
    <!-- end of navbar -->

    <script src="js/jquery.js"></script>
    <!-- bootstrap js -->
    <script src="bootstrap-5.0.2-dist/js/bootstrap.min.js"></script>
    <!-- custom js -->
    <script src="js/cart.js"></script>

    </script>
</body>

</html>