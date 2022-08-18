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

    if(isset($_POST['add_course']))
    {
        $t_name=$_POST['coursename'];
        $file=$_FILES['image']['name'];
        $dst="./image/".$file;

        $dst_db="image/".$file;

        move_uploaded_file($_FILES['image']['tmp_name'],$dst);
        
        $sql="INSERT INTO course (coursename,image) VALUE ('$t_name','$dst_db')";

        $result=mysqli_query($data,$sql);

        if($result)
        {
            header('location:adminhome.php');
        }
        else
        {
            echo "upload Failed";
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
        <h1>Add Course</h1> <hr>

        <div class="div_deg">
           
        <form action="#" method="POST" enctype="multipart/form-data">
                <div >
                    <label for="">Course Name :</label>
                    <input type="text" name="coursename">
                </div> <br>
                <div>
                    <label for="">Image :</label>
                    <input type="file" name="image">
                </div> <br>
                
                <div>
                    <input class="btn btn-primary" type="submit" value="ADD COURSE" name="add_course">
                </div>

            </form>
        </div>
       
        </center>
    </div>

</body>
</html>