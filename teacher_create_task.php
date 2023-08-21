<?php
// here we use session and fetch the username from login_check.php
session_start();

if (!isset($_SESSION['username'])) {
    header("Location:login.php");
}
// if any user tying to go in admin page it will redirect back to login page.
elseif ($_SESSION['usertype'] == "admin") {
    header("Location:login.php");
}


$host = "localhost";
$user = "root";
$password = "";
$db = "lms_db";

$data = mysqli_connect($host, $user, $password, $db);



if(isset($_POST['create_task'])){
    $t_subject =$_POST['t_subject'];
    $t_desc =$_POST['t_desc'];
    $start_date = $_POST['start_date'];
    $end_date = $_POST['end_date'];
    $status = "Incomplete";
    

    // coming from login_check.php page
    $uid = $_SESSION['uid'];

    $sql = "INSERT INTO tasks (uid,subject,description,start_date,end_date,status) VALUES ('$uid','$t_subject','$t_desc','$start_date','$end_date','$status')";

    $result = mysqli_query($data,$sql);

    if($result){
        header('Location:teacher_create_task.php');
    }
    else{
        echo "Upload failed";
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
        label {
            display: inline-block;
            text-align: right;
            width: 100px;
            padding-top: 10px;
            padding-bottom: 10px;
        }

        .div_deg {
            background-color: skyblue;
            width: 500px;
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
            <h2>Create Task</h2>
            <br>
            <div class="div_deg">
            <form action="#" method="POST">
                <div>
                    <label>Subject</label>
                    <input type="text" name="t_subject" required>
                </div>
                <div>
                    <label>Description</label>
                    <textarea name="t_desc" required></textarea>
                </div>
                <div>
                    <label>Start Date</label>
                    <input type="date" name="start_date" required>    
                </div>
                <div>
                    <label>End Date</label>
                    <input type="date" name="end_date" required>    
                </div>
                <div>
                    <input type="submit" name="create_task" value="Assign Task" class="btn btn-primary">
                </div>
            </form>
        </div>
        </center>
    </div>


</body>

</html>