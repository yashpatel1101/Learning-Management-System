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

$data = mysqli_connect($host,$user,$password,$db);

$name = $_SESSION['username'];

$sql = "SELECT * FROM user WHERE username = '$name'";

$result = mysqli_query($data,$sql);

$info = mysqli_fetch_assoc($result);




if(isset($_POST['update_profile'])){

    // $username = $_POST['name'];
    $user_phone=$_POST['phone'];
    $user_email=$_POST['email'];
    $user_password=$_POST['password'];
    $id = $_POST['id'];
    $t_des = $_POST['description'];
    $file = $_FILES['image']['name'];
    $dst = "./image/".$file;
    $dst_db = "image/".$file;


    move_uploaded_file($_FILES['image']['tmp_name'],$dst);

    if($file){
        $sql2 = "UPDATE user SET phone = '$user_phone', email='$user_email', password='$user_password', description='$t_des', image='$dst_db' WHERE username= '$name' ";
    }
    else{
        $sql2 = "UPDATE user SET phone = '$user_phone', email='$user_email', password='$user_password', description='$t_des' WHERE username= '$name' ";
    }
    $result2 = mysqli_query($data,$sql2);

    if($result2){
        header('Location:teacher_profile.php');
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

        .div_deg{
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
            <h2>Update Profile</h2>
            <br>

            <form action="#" method="POST" enctype="multipart/form-data">
                <div class="div_deg">

                <input type="text" name="id" value="<?php echo "{$info['id']}"; ?>" hidden>
                
                <div>
                    <label>Email</label>
                    <input type="email" name="email"
                    value="<?php echo "{$info['email']}"; ?>">
                </div>
                <div>
                    <label>Phone</label>
                    <input type="number" name="phone"
                    value="<?php echo "{$info['phone']}"; ?>">
                </div>
                <div>
                    <label>About Teacher</label>
                    <textarea name="description" rows="3" cols="20" >
                        <?php echo "{$info['description']}"; ?>
                    </textarea>
                </div>
                <div>
                    <label>Teacher Image</label>
                    <img width="100px" height="100px" src="<?php echo "{$info['image']}";  ?>">
                </div>
                <div>
                    <label>Choose Teacher New Image</label>
                    <input type="file" name="image">
                </div>
                <div>
                    <label>Password</label>
                    <input type="text" name="password"
                    value="<?php echo "{$info['password']}"; ?>">
                </div>
                <div>
                    <input type="submit" class="btn btn-success" name="update_profile" value="Update">
                </div>

                </div>
            </form>

        </center>
    </div>


</body>

</html>