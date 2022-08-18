<?php
    session_start();
    if(!isset($_SESSION['username']))
    {
        header("Location:login.php");
    }
    elseif($_SESSION['usertype']=='student')
    {
        header("Location:login.php");
    }

    $host = "localhost";
    $user ="root";
    $password ="";
    $db = "mschool";

    $data=mysqli_connect($host,$user,$password,$db);

    if(isset($_POST['add_student']))
    {
        $username=$_POST['username'];
        $email=$_POST['email'];
        $phone=$_POST['phone'];
        $password=$_POST['password'];
        $usertype="student";

        $check="SELECT * FROM user WHERE username='$username';";

        $check_user=mysqli_query($data,$check);

        $row_count=mysqli_num_rows($check_user);
        if($row_count==1)
        {
            echo "<script type'text/javascript'> alert('Username Already Exist. Try Another one') </script>";
        }
        else
        {
        $sql="INSERT INTO user (username,email,phone,usertype,password) VALUE ('$username','$email','$phone','$usertype','$password')";

        $result=mysqli_query($data,$sql);

        if($result)
        {
            echo "<script type'text/javascript'> alert('Data Uploaded Successfully') </script>";
        }
        else
        {
            echo "upload Failed";
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
    <title>Admin</title>

    <style>
        label{
            display:inline-block;
            text-align:right;
            width:100px;
            padding-top:10px;
            padding-bottom:10px;
        }
        .div_deg{
            background-color:skyblue;
            width:400px;
            padding-bottom:70px;
            padding-top:70px;
        }
    </style>



    <?php include 'admin_css.php' ?>
</head>
<body>
    <?php

    include 'admin_sidebar.php';
    ?>

    <div class="content">
        <center>
        <h1>Add Student</h1>

        <div class="div_deg">
           
        <form action="#" method="POST">
                <div >
                    <label for="">Username</label>
                    <input type="text" name="username">
                </div>
                <div>
                    <label for="">Email</label>
                    <input type="text" name="email">
                </div>
                <div>
                    <label for="">Phone No</label>
                    <input type="number" name="phone">
                </div>
                <div>
                    <label for="">Password</label>
                    <input type="text" name="password">
                </div>
                <div>
                    <input class="btn btn-primary" type="submit" value="ADD STUDENT" name="add_student">
                </div>

            </form>
        </div>
       
        </center>
    </div>

</body>
</html>