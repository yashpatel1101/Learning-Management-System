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

require 'vendor/autoload.php';

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

if(isset($_POST['save_excel_data']))
{
    $fileName = $_FILES['import_file']['name'];
    $file_ext = pathinfo($fileName, PATHINFO_EXTENSION);

    $allowed_ext = ['xls','csv','xlsx'];
  
    if(in_array($file_ext, $allowed_ext))
    {
        $inputFileName = $_FILES['import_file']['tmp_name'];
        $spreadsheet = \PhpOffice\PhpSpreadsheet\IOFactory::load($inputFileName);
        $data2 = $spreadsheet->getActiveSheet()->toArray();

        $count = "0";
        foreach($data2 as $row)
        {
            if($count > 0)
            {

           
            $username = $row['0'];
            $subject = $row['1'];
            $gain_marks = $row['2'];
            $out_of_marks = $row['3'];

            $studentQuery = "INSERT INTO grade (username,subject,gain_marks,out_of_marks) VALUES ('$username','$subject','$gain_marks','$out_of_marks')";
            $result = mysqli_query($data, $studentQuery);
            $msg = true;
        }
        else
        {
           $count = "1"; 
        }
        }
        if(isset($msg))
        {
        $_SESSION['message'] = "Successfully Imported";
        header('Location: teacher_add_grade.php');
        exit(0); 
        }
        else
        {
            $_SESSION['message'] = "Not Imported";
            header('Location: teacher_add_grade.php');
            exit(0); 
            
        }
    }
    else
    {
        $_SESSION['message'] = "Invalid File";
        header('Location: teacher_add_grade.php');
        exit(0);
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
            width: 200px;
            padding-top: 10px;
            padding-bottom: 10px;
        }

        .div_deg {
            background-color: skyblue;
            width: 600px;
            padding-top: 70px;
            padding-bottom: 70px;
        }
        .form-control{
            width: 250px;
        }
        
    </style>

</head>

<body>
    <?php
    include('teacher_sidebar.php');
    ?>

    <div class="content">
        <center>
            <h2>Insert Student Grade</h2>
            <br>
            <div class="div_deg">

                <?php
                    if(isset($_SESSION['message']))
                    {
                        echo "<h4>".$_SESSION['message']."<h4>";
                        unset($_SESSION['message']);
                    }
                ?>
                  
                    <div>
                        <form action="#" method="POST" enctype="multipart/form-data">
                            <label>Choose xls file only</label>
                            <input type="file" name="import_file" class="form-control" />
                            <br>
                            <button type="submit" name="save_excel_data" class="btn btn-primary">Import</button>
                        </form>
                    </div>
          
        </div>
        </center>
    </div>


</body>

</html>