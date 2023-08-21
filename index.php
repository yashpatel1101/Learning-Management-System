<?php

error_reporting(0);
session_start();
session_destroy();

if ($_SESSION['message']) {
    $message = $_SESSION['message'];

    echo "<script type='text/javascript'>
              alert('$message');
        </script>";
}

$host = "localhost";
$user = "root";
$password = "";
$db = "lms_db";

$data = mysqli_connect($host, $user, $password, $db);
$sql = "SELECT * FROM user WHERE usertype = 'teacher'";
$result = mysqli_query($data, $sql);


?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Learning Management System</title>
    <link rel="icon" type="image/x-icon" href="bg_pic/soft_logo.png">
    <!-- <link rel="stylesheet" type="text/css" href="css/style.css"> -->

    <link rel="stylesheet" type="text/css" href="css/mainpage.css">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">


</head>

<body>

    <nav>
        <label class="logo">TapovanSoft</label>
        <ul>
            <li><a href="#home">Home</a></li>
            <li><a href="#teachers">Teachers</a></li>
            <li><a href="#course">Courses</a></li>
            <li><a href="#admission_section">Admission</a></li>
            <li><a href="login.php" class="btn btn-success">Login</a></li>
        </ul>
    </nav>

    <div class="section1" id="home">
        <label class="img_text">We Teach Student With Care</label>
        <!-- <img class="main_img" src="images/school_management.jpg"> -->
    </div>

    <div class="container">
        <div class="row">
            <div class="col-md-4">
                <img class="welcome_img" src="bg_pic/school2.jpg">
            </div>
            <div class="col-md-8">
                <h3>Welcome to LMS</h3>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Labore recusandae, repellendus libero numquam voluptates magnam sequi fuga! Iste sequi ad accusamus laudantium amet ex enim fuga dolor, reprehenderit, reiciendis harum.
                    Id amet tempora pariatur, perspiciatis soluta nihil architecto inventore quasi omnis suscipit quo ipsam autem eum et iure obcaecati! Placeat, voluptatum assumenda! At corrupti excepturi quas ea ex dolores autem.
                    Autem distinctio impedit consequuntur ratione, quidem deserunt dolores vero molestias voluptates explicabo corporis iure iste ad maiores ea omnis architecto eos expedita sit quae ipsum. Facere repellendus adipisci qui veniam.
                    Corrupti impedit suscipit necessitatibus ipsum temporibus labore consequuntur minus dolore nemo, mollitia quam neque velit odio magnam exercitationem culpa placeat corporis minima incidunt aspernatur! Placeat, accusamus ipsam! Numquam, quo dolorem!</p>
            </div>
        </div>
    </div>

    <!-- teacher part -->

    <center>
        <h2 class="adm" id="teachers">Our Teachers</h2>
    </center>

    <div class="container">
        <div class="row">

            <?php
            while ($info = $result->fetch_assoc()) {
            ?>

                <div class="col-md-4">
                    <img class="teacher" src="<?php echo "{$info['image']}" ?>">
                    <h3><?php echo "{$info['username']}" ?></h3>
                    <h5><?php echo "{$info['description']}" ?></h5>
                </div>
            <?php
            }
            ?>
        </div>
    </div>

    <!-- courses part -->

    <center>
        <h2 class="adm" id="course">Our Courses</h2>
    </center>

    <div class="container">
        <div class="row">
            <div class="col-md-4">
                <img class="teacher" src="bg_pic/web.jpg">
                <h4>Web Development</h4>
            </div>
            <div class="col-md-4">
                <img class="teacher" src="bg_pic/graphic.jpg">
                <h4>Graphics Design</h4>
            </div>
            <div class="col-md-4">
                <img class="teacher" src="bg_pic/marketing.png">
                <h4>Marketing</h4>
            </div>
        </div>
    </div>

    <!-- form part -->
    <center>
        <h2 class="adm">Admission Form</h2>
    </center>

    <div align="center" id="admission_section" class="admission_form">
        <form action="data_check.php" method="POST">
            <div class="adm_int">
                <label class="label_text">Name</label>
                <input type="text" class="input_deg" name="name" required>
            </div>
            <div class="adm_int">
                <label class="label_text">Email</label>
                <input type="text" class="input_deg" name="email" required>
            </div>
            <div class="adm_int">
                <label class="label_text">Phone</label>
                <input type="text" class="input_deg" name="phone" required>
            </div>
            <div class="adm_int">
                <label class="label_text">Message</label>
                <textarea class="input_txt" name="message" required></textarea>
            </div>
            <div class="adm_int">
                <input class="btn btn-success" type="submit" value="Apply" id="submit" name="apply">
            </div>
        </form>
    </div>


    <footer>
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <h4>About Us</h4>
                    <p><b style="font-family:Georgia;"><big>E</big></b>stablished in year 2014, TAPOVAN VIDHYA MANDIR is located in Rural area of Gujarat state of India. In Himmatnagar area of Himmatnagar block of Sabar Kantha district. Area pincode is 383215.

                     <br>School is providing Upper Primary level education and is being managed by Private Unaided Organisation.

                        Medium of instruction is Gujarati language and school is Co-educational.</p>
                </div>
                <div class="col-md-4">
                    <h4>Contact Us</h4>
                    <p>Email: tapovanvidhyamandirhmt@gmail.com</p>
                    <p>Phone: +1 123 456 7890</p>
                    <p>Address:Tapovan Vidhya Mandir, Berna Road, Himmatnagar, Sabarkantha</p>
                </div>
                <div class="col-md-2">
                    <h4>Follow Us</h4>
                    <a href="#"><i class="fab fa-facebook"></i></a>
                    <a href="#"><i class="fab fa-twitter"></i></a>
                    <a href="#"><i class="fab fa-instagram"></i></a>
                </div>
            </div>
            <center>
            <h5 style="font-size: 14px; padding-bottom:8px;" class="footer_text">All @copyright reserved by TapovanSoft</h5>
            </center>
        </div>
    </footer>


</body>

</html>