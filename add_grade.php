<?php
// session_start();


// $host = "localhost";
// $user = "root";
// $password = "";
// $db = "lms_db";

// $data = mysqli_connect($host, $user, $password, $db);

// require 'vendor/autoload.php';

// use PhpOffice\PhpSpreadsheet\Spreadsheet;
// use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

// if(isset($_POST['save_excel_data']))
// {
//     $fileName = $_FILES['import_file']['name'];
//     $file_ext = pathinfo($fileName, PATHINFO_EXTENSION);

//     $allowed_ext = ['xls','csv','xlsx'];
  
//     if(in_array($file_ext, $allowed_ext))
//     {
//         $inputFileName = $_FILES['import_file']['tmp_name'];
//         $spreadsheet = \PhpOffice\PhpSpreadsheet\IOFactory::load($inputFileName);
//         $data1 = $spreadsheet->getActiveSheet()->toArray();

//         $count = "0";
//         foreach($data1 as $row)
//         {
//             if($count > 0)
//             {

           
//             $username = $row['0'];
//             $subject = $row['1'];
//             $gain_marks = $row['2'];
//             $out_of_marks = $row['3'];

//             $studentQuery = "INSERT INTO grade (username,subject,gain_marks,out_of_marks) VALUES ('$username','$subject','$gain_marks','$out_of_marks')";
//             $result = mysqli_query($data, $studentQuery);
//             $msg = true;
//         }
//         else
//         {
//            $count = "1"; 
//         }
//         }
//         if(isset($msg))
//         {
//         $_SESSION['message'] = "Successfully Imported";
//         header('Location: teacher_add_grade.php');
//         exit(0); 
//         }
//         else
//         {
//             $_SESSION['message'] = "Not Imported";
//             header('Location: teacher_add_grade.php');
//             exit(0); 
            
//         }
//     }
//     else
//     {
//         $_SESSION['message'] = "Invalid File";
//         header('Location: teacher_add_grade.php');
//         exit(0);
//     }
   
// }
?>
