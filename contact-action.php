<?php
session_start();
include('admin/db.php');
if(isset($_POST['sendMessageButton']))
{
    $name=$_POST['name'];
    $email=$_POST['email'];
    $subject=$_POST['subject'];
    $message=mysqli_real_escape_string($db_con,$_POST['message']);
    // echo"<pre>";
    // print_r($_POST);
    // echo"</pre>";
    $query = "INSERT into tbl_contact set name='$name',email='$email',subject='$subject',message='$message' ";
    $query_detail=mysqli_query($db_con,$query) or die(mysqli_error($db_con));
    if($query_detail)
    {
        echo '<script>alert("Message sent");</script>';
        header('location:contact.php');
    }
}

?>