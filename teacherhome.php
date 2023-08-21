<?php
// here we use session and fetch the username from login_check.php
session_start();

if(!isset($_SESSION['username'])){
    header("Location:login.php");
}
// if any user tying to go in admin page it will redirect back to login page.
elseif($_SESSION['usertype'] == "admin"){
    header("Location:login.php");
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Teacher Dashboard</title>
    <link rel="icon" type="image/x-icon" href="bg_pic/soft_logo.png">

    <?php
        include('teacher_css.php');
    ?>

</head>
<body>
    <?php
        include('teacher_sidebar.php');
    ?>
    <div class="content">
        <h1>Teacher Dashboard</h1>
    </div>

</body>
</html>