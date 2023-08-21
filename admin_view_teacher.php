<?php
// here we use session and fetch the username from login_check.php
session_start();
error_reporting(0);

if(!isset($_SESSION['username'])){
    header("Location:login.php");
}
// if any user tying to go in student page it will redirect back to login page.
elseif($_SESSION['usertype'] == "student"){
    header("Location:login.php");
}

    $host = "localhost";
    $user = "root";
    $password = "";
    $db = "lms_db";

    $data=mysqli_connect($host,$user,$password,$db);

    $sql="SELECT * FROM user WHERE usertype ='teacher'";
    $result=mysqli_query($data,$sql);

    if($_GET['teacher_id']){
        $t_id=$_GET['teacher_id'];
        $sql2="DELETE FROM user WHERE id='$t_id' ";
        $result2=mysqli_query($data,$sql2);
        if($result2)
        {
            header('location:admin_view_teacher.php');
        }
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
   
   <?php
        include('admin_css.php');    
    ?>
    <style type="text/css">
        /* .table_th
        {
            padding: 20px;
            font-size: 16px;
        }
        .table_td
        {
            padding: 20px;
            background-color: skyblue;
        } */

        #table1 {
            font-family: Arial;
            border-collapse: collapse;
            margin-top: 50px;
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
        include('admin_sidebar.php');
    ?>

    <div class="content">
        <center>
        <h1>View All Teacher Data</h1>
        <br>
        <table id="table1" border="1px">
            <tr>
                <th class="table_th">UserName</th>
                <th class="table_th">Email</th>
                <th class="table_th">Phone</th>
                <th class="table_th">Password</th>
                <th class="table_th">About Teacher</th>
                <th class="table_th">Image</th>
                <th class="table_th">Delete</th>
                <th class="table_th">Update</th>
            </tr>
           
           <?php
            while($info=$result->fetch_assoc())
            {
            ?>
            
            <tr>
                <td class="table_td"> <?php echo "{$info['username']}"; ?>
                </td>
                <td class="table_td"> <?php echo "{$info['email']}"; ?>
                </td>
                <td class="table_td"> <?php echo "{$info['phone']}"; ?>
                </td>
                <td class="table_td"> <?php echo "{$info['password']}"; ?>
                </td>
                <td class="table_td"><?php echo "{$info['description']}" ?></td>
                <td class="table_td"><img height="100px" width="100px" src="<?php echo "{$info['image']}" ?>"></td>
                <td class="table_td">
                    <?php
                    echo "<a onClick=\"javascript:return confirm('Are You Sure To Delete This');\" class='btn btn-danger' href='admin_view_teacher.php?teacher_id={$info['id']}'>Delete</a>";
                    ?>
                </td>
                <td class="table_td">
                    <?php
                    echo "<a href='admin_update_teacher.php?teacher_id={$info['id']}' class='btn btn-primary'>Update</a>";
                    ?>
                </td>
            </tr>
            
            <?php
            }
            ?>
        </table>
        </center>
    </div>

</body>
</html>