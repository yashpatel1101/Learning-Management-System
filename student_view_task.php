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

$sql = "SELECT * FROM tasks";

$result = mysqli_query($data, $sql);

// if ($_GET['t_id']) {
//     $t_id = $_GET['t_id'];
//     $t_status = $_GET['t_status'];

//     $sql2 = "UPDATE user_task  SET  status = '$l_status' WHERE lid='$l_id'";

//     $result2 = mysqli_query($data, $sql2);
//     if ($result2) {
//         header('location:student_view_task.php');
//     }
// }



// Check if the form has been submitted
if ($_GET['t_id']) {
    $t_id = $_GET['t_id'];
    $t_status = $_GET['t_status'];

    $info = $result->fetch_assoc();
    $subject = $info['subject'];
    $description = $info['description'];
    $start_date = $info['start_date'];
    $end_date = $info['end_date'];
    $status = $info['status'];

    
    $sql2 = "SELECT * FROM user_task";
    $result2 = mysqli_query($conn, $sql2);
    
    if (mysqli_num_rows($result2) > 0) {
      // User has already submitted the form before, update the record
      $sql2 = "UPDATE user_task SET status = '$status' WHERE username = '$name'";
      if (mysqli_query($conn, $sql2)) {
        header('Location:student_view_task.php');
        echo "Record updated successfully";
      } 
      else {
        echo "Error updating record: " . mysqli_error($conn);
      }
    } else {
       
      // User has not submitted the form before, insert a new record
      $sql2 = "INSERT INTO user_task (username, subject, description, start_date, end_date, status) VALUES ('$name','$subject','$description','$start_date','$end_date','$status')";
      if (mysqli_query($conn, $sql2)) {
        header('Location:student_view_task.php');
        echo "Record created successfully";
      } 
      else {
        echo "Error creating record: " . mysqli_error($conn);
      }
    }
  }


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
            /* width: 70%; */
            overflow: auto;
        }

        #table1 td,
        #table1 th {
            border: 1px solid #ddd;
            padding: 15px;
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
            <h1>View Task</h1>
            <br>
            <table id="table1" border="1px">
                <tr>
                    <th class="table_th">S.No</th>
                    <th class="table_th">Subject</th>
                    <th class="table_th">Description</th>
                    <th class="table_th">Start Date</th>
                    <th class="table_th">End Date</th>
                    <!-- <th class="table_th">Status</th>
                    <th class="table_th">Action</th> -->
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
                        <!-- <td class="table_td">
                            <?php echo "{$info['status']}"; ?>
                        </td>
                        <td class="table_td">
                            <?php $status = 'In-Progress'; echo "<a class='btn btn-warning' href='student_view_task.php?t_id={$info['tid']}&t_status={$status}'>In-Progess</a>"; ?>

                            <?php $status = 'Complete'; echo "<a class='btn btn-primary' href='student_view_task.php?t_id={$info['tid']}&t_status={$status}'>Complete</a>"; ?>
                        </td> -->
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