<?php
// here we use session and fetch the username from login_check.php
error_reporting(0);
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

$sql = "SELECT * FROM user WHERE usertype='student'";

$result = mysqli_query($data,$sql);


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Data</title>
   
   <?php
        include('admin_css.php');    
    ?>

    <style type="text/css">
        /* .table_th{
            padding: 20px;
            font-size: 16px;
        }

        .table_td{
            padding: 20px;
            background-color: skyblue;
        } */


        #table1 {
            font-family: Arial;
            border-collapse: collapse;
            margin-top: 50px;
            margin-right: 25px;
            width: 70%;
            overflow: auto;
        }

        #table1 td,
        #table1 th {
            border: 1px solid #ddd;
            padding: 8px;
        }

        #table1 tr:nth-child(even) {
            background-color: #f2f2f2;
        }

        #table1 tr:hover {
            background-color: skyblue;
        }

        #table1 th {
            padding-top: 12px;
            padding-bottom: 12px;
            text-align: left;
            background-color: #0077b3;
            color: white;
        }
        
    </style>
</head>

<body>
    
    <?php
        include('admin_sidebar.php');
    ?>

    <div class="content">
        <center>
        <h1>Student Data</h1>
        
        <?php
            if($_SESSION['message']){
                echo "<br><h5 style='color:red;'>" . $_SESSION['message'] . "</h5>";
            }

            unset($_SESSION['message']);
        ?>

        <br>
        <table id="table1" border="1px">
            <tr>
                <th class="table_th">UserName</th>
                <th class="table_th">Email</th>
                <th class="table_th">Phone</th>
                <th class="table_th">Password</th>
                <th class="table_th">Delete</th>
                <th class="table_th">Update</th>
            </tr>

            <?php

                while($info = $result->fetch_assoc()){

            ?>

            <tr>
                <td class="table_td">
                    <?php echo "{$info['username']}"; ?>
                </td>
                <td class="table_td">
                    <?php echo "{$info['email']}"; ?>
                </td>
                <td class="table_td">
                    <?php echo "{$info['phone']}"; ?>
                </td>
                <td class="table_td">
                    <?php echo "{$info['password']}"; ?>
                </td>
                <td class="table_td">
                    <?php echo "<a class='btn btn-danger' onClick= \"javascript:return confirm('Are you sure to delete this ?')\" href='delete.php?student_id={$info['id']}'>Delete</a>"; ?>
                </td>
                <td class="table_td">
                <?php echo "<a class='btn btn-primary' href='update_student.php?student_id={$info['id']}'>Update</a>"; ?>
                </td>
            </tr>

            <?php
                }
            ?>


        </table>
        </center>
    </div>

</body>
</html>