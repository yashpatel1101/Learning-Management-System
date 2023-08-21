<?php
// here we use session and fetch the username from login_check.php
session_start();

if(!isset($_SESSION['username'])){
    header("Location:login.php");
}
// if any user tying to go in student page it will redirect back to login page.
elseif($_SESSION['usertype'] == "student"){
    header("Location:login.php");
}

$host = "localhost";
$user = "root";
$password = "";
$db = "lms_db";

$data = mysqli_connect($host,$user,$password,$db);

$id = $_GET['announcement_id'];

$sql = "SELECT * FROM announcement WHERE id='$id' ";

$result = mysqli_query($data,$sql);

$info= $result->fetch_assoc();

if(isset($_POST['update'])){
    $a_title = $_POST['a_title'];
    $a_desc = $_POST['a_desc'];
    $a_date = $_POST['a_date'];

    $query = "UPDATE announcement SET title = '$a_title' , description = '$a_desc' , date = '$a_date' WHERE id='$id'";

    $result2 = mysqli_query($data,$query);

    if($result2){
        header('Location:teacher_view_announcement.php');
    }

}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Announcement Update Page</title>
   
   <?php
        include('teacher_css.php');
    ?>

<style type="text/css">
    label{
        display: inline-block;
        width: 100px;
        text-align: right;
        padding-top: 10px;
        padding-bottom: 10px;
    }

    .div_deg{
        background-color: skyblue;
        width: 400px;
        padding-top: 70px;
        padding-bottom: 70px;
    }
</style>

</head>

<body>
    
    <?php
        include('teacher_sidebar.php');
    ?>

<div class="content">
        <center>
            <h2>Update Announcement</h2>
            <br>
            <div class="div_deg">
            <form action="#" method="POST">
                <div>
                    <label>Announcement Title</label>
                    <input type="text" name="a_title" value="<?php echo "{$info['title']}"; ?>" required>
                </div>
                <div>
                    <label>Announcement Description</label>
                    <textarea name="a_desc" required><?php echo "{$info['description']}"; ?></textarea>
                </div>
                <div>
                    <label>Date</label>
                    <input type="date" name="a_date" value="<?php echo "{$info['date']}"; ?>" required>    
                </div>
                <div>
                    <input type="submit" name="update" value="Update" class="btn btn-primary  ">
                </div>
            </form>
        </div>
        </center>
    </div>

</body>
</html>