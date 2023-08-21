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

$name = $_SESSION['username'];

$sql = "SELECT * FROM leaves WHERE username = '$name' ";

$result = mysqli_query($data, $sql);


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Dashboard</title>

    <?php
    include('student_css.php');
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
            margin-top: 20px;
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
    include('student_sidebar.php');
    ?>

    <div class="content">
        <center>
            <h1> leave Status</h1>
            <br>
            <table id="table1" border="1px">
                <tr>
                    <th class="table_th">S.No</th>
                    <th class="table_th">Subject</th>
                    <th class="table_th">Message</th>
                    <th class="table_th">Date</th>
                    <th class="table_th">Status</th>
                </tr>

                <?php
                $sno = 1;
                while ($info = $result->fetch_assoc()) {

                ?>

                    <tr>
                        <td class="table_td">
                            <?php echo $sno; ?>
                        </td>
                        <td class="table_td">
                            <?php echo "{$info['subject']}"; ?>
                        </td>
                        <td class="table_td">
                            <?php echo "{$info['message']}"; ?>
                        </td>
                        <td class="table_td">
                            <?php echo "{$info['date']}"; ?>
                        </td>
                        <td class="table_td">
                            <?php echo "{$info['status']}"; ?>
                        </td>
                    </tr>

                <?php
                $sno = $sno + 1;
                }
                ?>


            </table>
        </center>
    </div>


</body>

</html>