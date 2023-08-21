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
    $host="localhost";
    $user="root";
    $password="";
    $db="lms_db";

    $data=mysqli_connect($host,$user,$password,$db);

    if(isset($_POST['add_teacher'])){
        $username = $_POST['name'];
        $user_phone=$_POST['phone'];
        $user_email=$_POST['email'];
        $usertype = "teacher";
        $user_password=$_POST['password'];
        $t_description=$_POST['description'];
        $file=$_FILES['image']['name'];  
        $dst="./image/".$file;
        $dst_db="image/".$file;
        move_uploaded_file($_FILES['image']['tmp_name'], $dst);


        $sql = "INSERT INTO user(username,phone,email,usertype,password,description,image) VALUES ('$username','$user_phone','$user_email','$usertype','$user_password','$t_description','$dst_db')";

        $result=mysqli_query($data,$sql);
        if($result)
        {
            header('location:admin_add_teacher.php');
        }
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <style type="text/css">
        label{
            display: inline-block;
            text-align: right;
            width: 100px;
            padding-top: 10px;
            padding-bottom: 10px;
        }
        .div_deg
        {
           background-color: skyblue; 
           padding-top: 70px;
           padding-bottom: 70px;
           width: 500px;
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
        <h1>Add Teacher</h1><br>
        <div class="div_deg">
            <form action="#" method="POST" enctype="multipart/form-data">
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
                    <label>About Teacher</label>
                    <textarea name="description" required></textarea>
                </div>
                <div>
                    <label>Image :</label>
                    <input type="file" name="image" required>
                </div>
                <div>
                    <label>Password</label>
                    <input type="text" name="password" required>
                </div>
                <div>
                    <input type="submit" name="add_teacher" value="Add Teacher" class="btn btn-primary  ">
                </div>
            </form>
        </div>

        </center>
    </div>

</body>
</html>