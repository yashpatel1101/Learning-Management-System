<?php
error_reporting(0);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Dashboard</title>
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
            <h1>Study Material</h1>
            <table id="table1" border="1">
                <thead>
                    <tr>
                        <th class="table_th">Subject</th>
                        <th class="table_th">Title</th>
                        <th class="table_th">File Name</th>
                        <th class="table_th">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $host = "localhost";
                    $user = "root";
                    $password = "";
                    $db = "lms_db";

                    $data = mysqli_connect($host, $user, $password, $db);

                    $sql = "SELECT subject, title, file FROM files";
                    $result = mysqli_query($data, $sql);

                    while ($row = mysqli_fetch_assoc($result)) {
                        echo "<tr>";
                        echo "<td class='table_td'>" . $row['subject'] . "</td>";
                        echo "<td class='table_td'>" . $row['title'] . "</td>";
                        echo "<td class='table_td'>" . basename($row['file']) . "</td>";
                        echo "<td class='table_td'><a href='download.php?file=" . urlencode($row['file']) . "'>Download PDF</a></td>";
                        echo "</tr>";
                    }
                    ?>
                </tbody>
            </table>
        </center>
    </div>
</body>

</html>
