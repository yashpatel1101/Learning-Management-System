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

if(isset($_POST['add_student'])){
    $username = $_POST['name'];
    $user_phone=$_POST['phone'];
    $user_email=$_POST['email'];
    $usertype = "student";
    $user_password=$_POST['password'];


    $check = "SELECT * FROM user WHERE username = '$username' ";
    $check_user = mysqli_query($data,$check);

    $row_count = mysqli_num_rows($check_user);

    if($row_count == 1){
        echo "User Already Exists.";
    }

    else{

    $sql = "INSERT INTO user(username,phone,email,usertype,password) VALUES ('$username','$user_phone','$user_email','$usertype','$user_password')";

    $result = mysqli_query($data,$sql);

    if($result){
        echo "<script type='text/javascript'>
            alert('Data Uploaded Success');
        </script>";
    }

    else{
        echo "Upload failed";
    }
}
}


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Student</title>
   
    <style type="text/css">
        label{
            display: inline-block;
            text-align: right;
            width: 100px;
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

   <?php
        include('admin_css.php');    
    ?>

</head>

<body>
    
    <?php
        include('admin_sidebar.php');
    ?>

    <div class="content">
     <center>
        <h1>Add Student</h1>

        <div class="div_deg">
            <form action="#" method="POST">
                <div>
                    <label>Username</label>
                    <input type="text" name="name" required>
                </div>
                <div>
                    <label>Email</label>
                    <input type="email" name="email" required>
                </div>
                <div>
                    <label>Phone</label>
                    <input type="number" name="phone" required>
                </div>
                <div>
                    <label>Password</label>
                    <input type="text" name="password" required>
                </div>
                <div>
                    <input type="submit" name="add_student" class="btn btn-primary" value="Add Student">
                </div>

            </form>
        </div>

     </center>
    </div>

</body>
</html>