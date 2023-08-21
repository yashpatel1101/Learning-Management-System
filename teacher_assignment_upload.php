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

if (isset($_POST['submit'])) {
    $s_subject =$_POST['s_subject'];
    $s_title =$_POST['s_title'];


    $fileCount = count($_FILES['file']['name']);
    for ($i = 0; $i < $fileCount; $i++) {
        $fileName = $_FILES['file']['name'][$i];
        
        $sql = "INSERT INTO assignment (subject,title,file) VALUES ('$s_subject','$s_title','$fileName')";

        $result = mysqli_query($data, $sql);

        if ($result) {
            echo "<script type='text/javascript'>
            alert('File Uploaded successfully');
            </script>";
        } else {
            echo "Upload failed";
        }

        move_uploaded_file($_FILES['file']['tmp_name'][$i], 'assignment/' . $fileName);
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
            <h2>Upload Assignment</h2>
            <br>
            <div class="div_deg">
                <form action="" method="POST" enctype="multipart/form-data">
                    <div>
                        <label>Subject</label>
                        <input type="text" name="s_subject" required>
                    </div>
                    <div>
                        <label>Title</label>
                        <input type="text" name="s_title" required>
                    </div>
                    <br>
                    <input type="file" name="file[]" id="file"  multiple required><br><br>
                    <input type="submit" name="submit" class="btn btn-primary" value="Upload">
                </form>
            </div>


        </center>
    </div>


</body>

</html>