<?php
include('header.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <title>View Users</title>
</head>
<body>
    <?php
    include('db.php');
    $user_display_query="SELECT * from tbl_contact";
    $user_display_result=mysqli_query($db_con,$user_display_query) or die(mysqli_error($db_con));
    if(mysqli_num_rows($user_display_result)>0)
    {
        $sn = 1;
        ?>
        <h1 align='center'> View Users List</h1>
        <table id="table" align="center" >
            <th>Id</th>
        <th>Name</th>
        <th>Email</th>
        <th>Subject</th>
        <th>Message</th>
        <th>Action</th>
        </tr>


        <?php
        
        while($row=mysqli_fetch_assoc($user_display_result))
        { 
            ?>
            <tr>
                <td><?php echo $sn ++ ;?></td>
                <td><?php echo $row['name'] ;?></td>
                <td><?php echo $row['email'] ;?></td>
                <td><?php echo $row['subject'] ;?></td>
                <td><?php echo $row['message'] ;?></td>
                <td>
                        <button class="btn btn-success btn-sm" name="submit" type="submit">
                        
                    <button class="btn btn-danger btn-sm" name="submit" type="submit"
                        onclick="return confirm('Do you want to delete?');">Delete </button>
                    </form>
            </tr>
            <?php
        }
        ?>
        <tr>
            <td colspan="6"><a href="index.php"><input type="button" value="Back"></a></td>
        </tr>
        </table>
    <?php
    }
    ?>
</body>
</html>