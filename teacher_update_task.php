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

$uid = $_SESSION['uid'];

$sql = "SELECT * FROM tasks WHERE uid = '$uid' ";

$result = mysqli_query($data, $sql);



if ($_GET['t_id']) {
    $t_id = $_GET['t_id'];
    $sql2 = "DELETE FROM tasks WHERE tid='$t_id'";
    $result2 = mysqli_query($data, $sql2);
    if ($result2) {
        header('location:teacher_update_task.php');
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
            /* width: 70%; */
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
            <h1>Update Task</h1>
            <br>
            

            <br>
            <table id="table1" border="1px">
                <tr>
                    <th class="table_th">S.No.</th>
                    <th class="table_th">Subject</th>
                    <th class="table_th">Description</th>
                    <th class="table_th">Start Date</th>
                    <th class="table_th">End Date</th>
                    <th class="table_th">Action</th>
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
                            <?php echo "{$info['description']}"; ?>
                        </td>
                        <td class="table_td">
                            <?php echo "{$info['start_date']}"; ?>
                        </td>
                        <td class="table_td">
                            <?php echo "{$info['end_date']}"; ?>
                        </td>

                        <td class="table_td">
                            <?php echo "<a class='btn btn-danger' onClick= \"javascript:return confirm('Are you sure to delete this ?')\" href='teacher_update_task.php?t_id={$info['tid']}'>Delete</a>"; ?>
                      
                            <?php echo "<a class='btn btn-primary' href='teacher_edit_task.php?t_id={$info['tid']}'>Update</a>"; ?>
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