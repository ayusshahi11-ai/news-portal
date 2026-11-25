<!-- Comment List End -->
<div id="main-content">
    <div class="container">
        <div class=" row">
            <div class="col-md-8">
                <!-- post-container -->
                <div class="post-container">

                    <!-- Comment Form Start -->
                    <div class="bg-light mb-3" style="padding: 30px;">
                        <h3 class="mb-4">Leave a comment</h3>
                        <form method="POST" action="" class="comments-form">
                            <div class="form-group">
                                <label for="name">Name *</label>
                                <input type="text" class="form-control comment-name" name="com_name" required>
                            </div>
                            <div class="form-group">
                                <label for="email">Email *</label>
                                <input type="email" class="form-control comment-email" name="com_email" required>
                            </div>
                            <div class="form-group">
                                <label for="message">Comments *</label>
                                <textarea name="message" cols="30" rows="5" class="form-control comment-text" required></textarea>
                            </div>
                            <div class="form-group mb-0">
                                <input type="hidden" name="nid" class="news_id" value='<?php echo $_GET['nid']; ?>'>
                                <input type="submit" name="comment" value="Leave a comment" class="btn btn-primary font-weight-semi-bold py-2 px-3 comment-done">
                            </div>
                        </form>
                        <img src="images/Ajax-loader.gif" width="100px;" class="ajax-loader" style="display:none;" />
                        <div class="comments-message"></div>
                    </div>
                </div>
                <div class="post-container">
                    <!-- Comment List Start -->
                    <div class="bg-light mb-3" style="padding: 30px;">
                        <!-- <h3 class="mb-4">3 Comments</h3> -->
                        <h2 class="title" style="color:black">Comments</h2>
                        <ul>
                            <div class="media comment-section">
                                <!-- <div> <img src="images/user.jpg" alt="Image" class="img-fluid mr-3 mt-1"></div> -->
                                <?php
                                $news_id_comt = intval($_GET['nid']);
                                $query = "SELECT * FROM tbl_comment WHERE Status = 'Approved' and n_id=$news_id_comt ORDER BY id DESC  ";
                                $result = mysqli_query($db_con, $query);
                                while ($row = mysqli_fetch_assoc($result)) {
                                ?>
                                    <div class="media-body">
                                        <h6><a href=""><?php echo $row['name']; ?></a> <small><i><?php echo $row['time']; ?></i></small></h6>
                                        <p><?php echo $row['comment']; ?></p>
                                    </div>
                                <?php }  ?>

                            </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>



<!-- Comment Form End -->