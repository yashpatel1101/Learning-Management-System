<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Form</title>
    <link rel="icon" type="image/x-icon" href="bg_pic/soft_logo.png">
    <!-- <link rel="stylesheet" type="text/css" href="css/style.css"> -->

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
    <style>
        /* CSS for login form */
        .body_deg {
            background-repeat: no-repeat;
            background-size: cover;
            background-position: center center;
            background-attachment: fixed;
            background-color: #222;
        }

        .form_deg {
            width: 400px;
            padding: 20px;
            background-color: #f1f1f1;
            margin-top: 100px;
            border-radius: 10px;
            box-shadow: 0px 0px 20px 0px rgba(0, 0, 0, 0.2);
        }

        .title_deg {
            font-size: 24px;
            font-weight: bold;
            color: #333;
            margin-bottom: 20px;
        }

        .label_deg {
            display: block;
            font-size: 18px;
            font-weight: bold;
            margin-bottom: 5px;
            color: #333;
        }

        .login_form input[type="text"],
        .login_form input[type="password"] {
            width: 100%;
            padding: 10px;
            margin-bottom: 20px;
            border: none;
            border-bottom: 2px solid #ccc;
            font-size: 16px;
            color: #333;
            background-color: #f1f1f1;
        }

        .login_form input[type="text"]:focus,
        .login_form input[type="password"]:focus {
            outline: none;
            border-bottom: 2px solid #333;
        }

        .login_form input[type="submit"] {
            background-color: #333;
            color: #fff;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            font-size: 18px;
            cursor: pointer;
            transition: background-color 0.3s ease-in-out;
        }

        .login_form input[type="submit"]:hover {
            background-color: #555;
        }

        .HomePage {

            text-decoration: none;
            font-size: 15px;
        }

        a {
            padding-left: 250px;
        }
    </style>
</head>

<body background="bg_pic/bg_login1.jpg" class="body_deg">
    <center>
        <div class="form_deg">
            <center class="title_deg">
                Login Form

                <h4>
                    <?php
                    error_reporting(0);
                    session_start();
                    session_destroy();
                    echo $_SESSION['loginMessage'];


                    ?>
                </h4>
            </center>
            <form action="login_check.php" method="post" class="login_form">
                <div>
                    <label class="label_deg">Username</label>
                    <input type="text" name="username">
                </div>
                <div>
                    <label class="label_deg">Password</label>
                    <input type="password" name="password">
                </div>
                <div>
                    <input type="submit" class="btn btn-primary" name="submit" value="Login">
                </div>
                <span>
                    <a href="index.php" class="HomePage ">Home Page</a>
                </span>
            </form>
        </div>
    </center>
</body>

</html>