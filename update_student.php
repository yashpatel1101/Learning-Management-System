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

$id = $_GET['student_id'];

$sql = "SELECT * FROM user WHERE id='$id' ";

$result = mysqli_query($data,$sql);

$info= $result->fetch_assoc();

if(isset($_POST['update'])){
    $name = $_POST['name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $password = $_POST['password'];

    $query = "UPDATE user SET username = '$name' , email = '$email' , phone = '$phone' , password = '$password' WHERE id='$id'";

    $result2 = mysqli_query($data,$query);

    if($result2){
        header('Location:view_student.php');
    }

}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Update Page</title>
   
   <?php
        include('admin_css.php');    
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
        include('admin_sidebar.php');
    ?>

    <div class="content">
        <center>
        <h1>Student Update Page</h1>

        <div class="div_deg">
            <form action="#" method="POST">
                <div>
                    <label>Username</label>
                    <input type="text" name="name" value="<?php echo "{$info['username']}"; ?>" required>
                </div>
                <div>
                    <label>Email</label>
                    <input type="email" name="email" value="<?php echo "{$info['email']}"; ?>" required>
                </div>
                <div>
                    <label>Phone</label>
                    <input type="number" name="phone" value="<?php echo "{$info['phone']}"; ?>" required>
                </div>
                <div>
                    <label>Password</label>
                    <input type="text" name="password" value="<?php echo "{$info['password']}"; ?>" required>
                </div>
                <div>
                    <input class="btn btn-success" type="submit" name="update" value="Update">
                </div>
            </form>
        </div>

        </center>
    </div>

</body>
</html>