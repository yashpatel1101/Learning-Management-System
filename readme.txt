**============= Database Connecation Code =============**

$host = "localhost";
$user = "root";
$password = "";
$db = "lms_db";

$data = mysqli_connect($host,$user,$password,$db);



**============= Database Information =============**

database name : lms_db
table name : user






**============= Bootstrap 5 CDN link =============**


<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>






===============================
for composer


composer -V

composer require phpoffice/phpspreadsheet

if error occure in above code then execute below

composer require phpoffice/phpspreadsheet --ignore-platform-req=ext-gd
