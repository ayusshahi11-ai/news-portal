<?php 
session_start();
include 'admin/db.php';
$new_id=$_POST['nid'];
$date = date("Y-m-d");
$name = $_POST['com_name'];
$email = $_POST['com_email'];
$comment = mysqli_real_escape_string($db_con,$_POST['message']);
$status = "Pending";

$query = "INSERT INTO tbl_comment( `name`, `email`, `time`, `comment`, `status`, `n_id` ) VALUES ('$name','$email','$date','$comment','$status' , '$new_id')";
// print_r($query);
$res = mysqli_query($db_con,$query);
if($res){
    echo '<script>alert("Wait for approval");</script>';
    header("location:single.php");
}else{
    echo"Error Inserting Data";
}
?>