<?php
// here we use session and fetch the username from login_check.php
session_start();
error_reporting(0);


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

$data = mysqli_connect($host,$user,$password,$db);

$name = $_SESSION['username'];

if(isset($_POST['submit_leave'])){

    $l_subject = $_POST['l_subject'];
    $l_message=$_POST['l_message'];
    $l_date=$_POST['l_date'];
    $status = "Pending";

    $sql = "INSERT INTO leaves(username, subject, message, date, status) VALUES ('$name','$l_subject','$l_message','$l_date','$status')";

    $result = mysqli_query($data,$sql);

    if($result){
        header('Location:student_apply_leave.php');
    }

    else{
        echo "Apply leave failed";
        header('Location:student_apply_leave.php');
    }
}


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Dashboard</title>

    <?php
    include('student_css.php');
    ?>


</head>

<body>
    <?php
    include('student_sidebar.php');
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
    <div class="content">
        <center>
            <h1>Apply Leave</h1>
            <br>

            <div class="div_deg">
            <form action="#" method="POST">
                <div>
                    <label>Enter Subject</label>
                    <input type="text" name="l_subject" required>
                </div>
                <div>
                    <label>Enter Details</label>
                    <textarea  name="l_message" rows="6" cols="30" required></textarea><br>
                </div>
                <div>
                    <label>Enter Date</label>
                    <input type="date" name="l_date" required><br>
                </div>
                
                <div>
                    <input type="submit" name="submit_leave" class="btn btn-primary" value="Apply Leave">
                </div>

            </form>
        </div>

        </center>
    </div>


</body>

</html>