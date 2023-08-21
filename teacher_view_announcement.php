<?php
// here we use session and fetch the username from login_check.php
session_start();
error_reporting(0);


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

$sql = "SELECT * FROM announcement";

$result = mysqli_query($data, $sql);



if ($_GET['announcement_id']) {
    $a_id = $_GET['announcement_id'];
    $sql2 = "DELETE FROM announcement WHERE id='$a_id'";
    $result2 = mysqli_query($data, $sql2);
    if ($result2) {
        $_SESSION['message'] = "Delete Announcement Successfully";
        header('location:teacher_view_announcement.php');
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
        /* label {
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
        .table_th{
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
    include('teacher_sidebar.php');
    ?>

    <div class="content">
        <center>
            <h2>Announcement Data</h2>
<br>
            <?php
            if ($_SESSION['message']) {
                echo "<br><h5 style='color:red;'>" . $_SESSION['message'] . "</h5>";
            }

            unset($_SESSION['message']);
            ?>

            <br>
            <table id="table1" border="1px">
                <tr>
                    <th class="table_th">Title</th>
                    <th class="table_th">Description</th>
                    <th class="table_th">Date</th>
                    <th class="table_th">Delete</th>
                    <th class="table_th">Update</th>
                </tr>

                <?php

                while ($info = $result->fetch_assoc()) {

                ?>

                    <tr>
                        <td class="table_td">
                            <?php echo "{$info['title']}"; ?>
                        </td>
                        <td class="table_td">
                            <?php echo "{$info['description']}"; ?>
                        </td>
                        <td class="table_td">
                            <?php echo "{$info['date']}"; ?>
                        </td>

                        <td class="table_td">
                            <?php echo "<a class='btn btn-danger' onClick= \"javascript:return confirm('Are you sure to delete this ?')\" href='teacher_view_announcement.php?announcement_id={$info['id']}'>Delete</a>"; ?>
                        </td>
                        <td class="table_td">
                            <?php echo "<a class='btn btn-primary' href='update_announcement.php?announcement_id={$info['id']}'>Update</a>"; ?>
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