<?php
    session_start();
    error_reporting(0);
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

    if($_GET['course_id'])
   {   $id=$_GET['course_id'];

        $sql="SELECT * FROM course WHERE id='$id'";

        $result=mysqli_query($data,$sql);

        $info = $result->fetch_assoc();

   }
//when botton is press then do this
   if(isset($_POST['update_course']))
   {
       $id=$_POST['id'];
       $t_name=$_POST['coursename'];
       $file=$_FILES['image']['name'];
       $dst="./image/".$file;
       $dst_db="image/".$file;

       move_uploaded_file($_FILES['image']['tmp_name'],$dst);

       if($file)
       {
        $sql2="UPDATE course SET  id='$id',coursename='$t_name',image='$dst_db'  WHERE id='$id'";

       }
       else
       {
        $sql2="UPDATE course SET  id='$id',coursename='$t_name' WHERE id='$id'";

       }
     
       $result2=mysqli_query($data,$sql2);
       if($result2)
       {
           header('location:admin_view_course.php');
       }
       else{
           echo "Something went Wrong";
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
    <?php include 'admin_css.php' ?>

    <style type="text/css">
        label{
            display: inline-block;
            width:100px;
            text-align:right;
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
</head>
<body>
    <?php

    include 'admin_sidebar.php';
    ?>

    <div class="content">
        <center>
        <h1>Update Course</h1>

        <div class="div_deg">
            <form action="#" method="POST" enctype="multipart/form-data">
                <input type="text" name="id" value="<?php echo "{$info['id']}"; ?>"hidden>
                <div>
                    <label for="">Course Name</label>
                    <input type="text" name="coursename" value="<?php echo "{$info['coursename']}"; ?>">
                </div>
                <div>
                    <label for="">Course Old Image</label>
                    <img height="100px" width="100px" src="<?php echo "{$info['image']}" ?>" alt="">
                </div>
                <div>
                    <label for="">Choose Course New Image</label>
                    <input type="file" name="image" value="">
                </div>
                <div>
                
                    <input type="submit" name="update_course" class="btn btn-success" value="Update">
                </div>
            </form>
        </div>
        </center>
        
    </div>

</body>
</html>