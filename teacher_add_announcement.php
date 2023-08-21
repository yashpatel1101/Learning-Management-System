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

if(isset($_POST['add_announcement'])){
    $a_title =$_POST['a_title'];
    $a_desc =$_POST['a_desc'];
    $a_date = $_POST['a_date'];


    $sql = "INSERT INTO announcement (title,description,date) VALUES ('$a_title','$a_desc','$a_date')";

    $result = mysqli_query($data,$sql);

    if($result){
        echo "<script type='text/javascript'>
            alert('Announcement added successfully');
        </script>";
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
            width: 200px;
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
            <h2>Make Announcement</h2>
            <br>
            <div class="div_deg">
            <form action="#" method="POST">
                <div>
                    <label>Announcement Title</label>
                    <input type="text" name="a_title" required>
                </div>
                <div>
                    <label>Announcement Description</label>
                    <textarea name="a_desc" required></textarea>
                </div>
                <div>
                    <label>Date</label>
                    <input type="date" name="a_date" required>    
                </div>
                <div>
                    <input type="submit" name="add_announcement" value="Add Announcement" class="btn btn-primary  ">
                </div>
            </form>
        </div>
        </center>
    </div>


</body>

</html>