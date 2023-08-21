<?php
// here we use session and fetch the username from login_check.php
session_start();
error_reporting(0);


if (!isset($_SESSION['username'])) {
    header("Location:login.php");
}
// if any user trying to go to admin page, redirect back to login page
elseif ($_SESSION['usertype'] == "admin") {
    header("Location:login.php");
}


$host = "localhost";
$user = "root";
$password = "";
$db = "lms_db";

$data = mysqli_connect($host, $user, $password, $db);


$file_id = $_GET['id']; // get the ID of the file from the query string
$sql = "SELECT file FROM files WHERE id = $file_id";
$result = mysqli_query($data, $sql);
$row = mysqli_fetch_assoc($result);
$file_content = $row['file'];

// send the appropriate headers
header('Content-type: application/pdf');
header('Content-Disposition: inline; filename="filename.pdf"');
header('Content-Transfer-Encoding: binary');
header('Content-Length: ' . strlen($file_content));

// output the file content
echo $file_content;
?>
