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

    if(isset($_POST['add_teacher']))
    {
        $t_name=$_POST['name'];
        $t_description=$_POST['description'];
        $file=$_FILES['image']['name'];
        $dst="./image/".$file;

        $dst_db="image/".$file;

        move_uploaded_file($_FILES['image']['tmp_name'],$dst);
        
        $sql="INSERT INTO teacher (name,description,image) VALUE ('$t_name','$t_description','$dst_db')";

        $result=mysqli_query($data,$sql);

        if($result)
        {
            header('location:admin_add_teacher.php');
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
        <h1>Add Teacher</h1> <hr>

        <div class="div_deg">
           
        <form action="#" method="POST" enctype="multipart/form-data">
                <div >
                    <label for="">Name :</label>
                    <input type="text" name="name">
                </div> <br>
                <div>
                    <label for="">Description :</label>
                    <textarea name="description" id="" ></textarea>
                </div> <br>
                <div>
                    <label for="">Image :</label>
                    <input type="file" name="image">
                </div> <br>
                
                <div>
                    <input class="btn btn-primary" type="submit" value="ADD TEACHER" name="add_teacher">
                </div>

            </form>
        </div>
       
        </center>
    </div>

</body>
</html>