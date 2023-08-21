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

$t_id = $_GET['t_id'];

$sql = "SELECT * FROM tasks WHERE tid='$t_id' ";

$result = mysqli_query($data,$sql);

$info= $result->fetch_assoc();

if(isset($_POST['edit_task'])){
    $subject = $_POST['t_subject'];
    $description = $_POST['t_desc'];
    $start_date = $_POST['start_date'];
    $end_date = $_POST['end_date'];

    $query = "UPDATE tasks SET subject = '$subject' , description = '$description' , start_date = '$start_date', end_date = '$end_date' WHERE tid='$t_id'";

    $result2 = mysqli_query($data,$query);

    if($result2){
        header('Location:teacher_update_task.php');
    }

}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Teacher Dashboard</title>
   
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
            <h2>Edit Task</h2>
            <br>
            <div class="div_deg">
            <form action="#" method="POST">
                <div>
                    <label>Subject</label>
                    <input type="text" name="t_subject" value="<?php echo "{$info['subject']}"; ?>" required>
                </div>
                <div>
                    <label>Description</label>
                    <textarea name="t_desc" required><?php echo "{$info['description']}"; ?></textarea>
                </div>
                <div>
                    <label>Start Date</label>
                    <input type="date" name="start_date" value="<?php echo "{$info['start_date']}"; ?>" required>    
                </div>
                <div>
                    <label>End Date</label>
                    <input type="date" name="end_date" value="<?php echo "{$info['end_date']}"; ?>" required>    
                </div>
                <div>
                    <input type="submit" name="edit_task" value="Update" class="btn btn-primary">
                </div>
            </form>
        </div>
        </center>
    </div>

</body>
</html>