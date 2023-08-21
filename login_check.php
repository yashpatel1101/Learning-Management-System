<?php
// for hiding unneccessary warnings in web pages
error_reporting(0);

session_start();


$host = "localhost";
$user = "root";
$password = "";
$db = "lms_db";

$data = mysqli_connect($host,$user,$password,$db);


if($data == false){
    die("connection error");
}

if($_SERVER["REQUEST_METHOD"] == "POST"){
    // echo "Successfully connected";
    $name = $_POST["username"];
    $pass = $_POST["password"];

    $sql = "select * from user where username = '".$name."' AND password = '".$pass."' ";

    $result = mysqli_query($data,$sql);

    $row = mysqli_fetch_array($result);


    // for create task by teacher
    $uid = $row["id"];

// here we check user by usertype means if student login then it will open student dashboard and same for admin login

    if($row["usertype"] == "student"){

        $_SESSION['uid'] = $uid;
        $_SESSION['username'] = $name;
        $_SESSION['usertype'] = "student";
        header("Location:studenthome.php");
    }

    elseif($row["usertype"] == "teacher"){
        $_SESSION['uid'] = $uid;
        $_SESSION['username'] = $name;
        $_SESSION['usertype'] = "teacher";
        header("Location:teacherhome.php");
    }
    elseif($row["usertype"] == "admin"){
        $_SESSION['uid'] = $uid;
        $_SESSION['username'] = $name;
        $_SESSION['usertype'] = "admin";
        header("Location:adminhome.php");
    }

    else{
        // here we started session and store messages in session and pass via header to login.php

        $message = "Username or Password incorrect";

        $_SESSION['loginMessage'] = $message;

        header("Location:login.php");
    }
}


?>