<?php
// here we use session and fetch the username from login_check.php
session_start();
error_reporting(0);

if (!isset($_SESSION['username'])) {
    header("Location:login.php");
}
// if any user tying to go in student page it will redirect back to login page.
elseif ($_SESSION['usertype'] == "student") {
    header("Location:login.php");
}


$host = "localhost";
$user = "root";
$password = "";
$db = "lms_db";

$data = mysqli_connect($host, $user, $password, $db);

if ($_GET['teacher_id']) {
    $t_id = $_GET['teacher_id'];
    $sql = "SELECT * FROM user WHERE id = '$t_id' ";
    $result = mysqli_query($data, $sql);

    $info = $result->fetch_assoc();
}


if (isset($_POST['update_teacher'])) {
    $username = $_POST['name'];
    $user_phone = $_POST['phone'];
    $user_email = $_POST['email'];
    $usertype = "teacher";
    $user_password = $_POST['password'];
    $id = $_POST['id'];
    $t_des = $_POST['description'];
    $file = $_FILES['image']['name'];
    $dst = "./image/" . $file;
    $dst_db = "image/" . $file;

    move_uploaded_file($_FILES['image']['tmp_name'], $dst);

    if ($file) {
        $sql2 = "UPDATE user SET username='$username',phone = '$user_phone', email='$user_email', password='$user_password', description='$t_des', image='$dst_db' WHERE id= '$id' ";
    } else {
        $sql2 = "UPDATE user SET username='$username',phone = '$user_phone', email='$user_email', password='$user_password', description='$t_des' WHERE id= '$id' ";
    }


    $result2 = mysqli_query($data, $sql2);

    if ($result2) {
        header('Location:admin_view_teacher.php');
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

    <?php
    include('admin_css.php');
    ?>

    <style type="text/css">
        label {
            display: inline-block;
            width: 150px;
            text-align: right;
            padding-top: 10px;
            padding-bottom: 10px;

        }

        .form_deg {
            background-color: skyblue;
            width: 600px;
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
            <h2>Update Teacher Data</h2>

            <form action="admin_update_teacher.php" method="POST" class="form_deg" enctype="multipart/form-data">
                <input type="text" name="id" value="<?php echo "{$info['id']}"; ?>" hidden>
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
                    <label>About Teacher</label>
                    <textarea name="description" rows="4" required>
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
                    <input type="text" name="password" value="<?php echo "{$info['password']}"; ?>" required>
                </div>
                <div>
                    <input type="submit" class="btn btn-success" name="update_teacher">
                </div>
            </form>
        </center>
    </div>

</body>

</html>