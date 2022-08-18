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

    if($_GET['teacher_id'])
   {   $id=$_GET['teacher_id'];

        $sql="SELECT * FROM teacher WHERE id='$id'";

        $result=mysqli_query($data,$sql);

        $info = $result->fetch_assoc();

   }
//when botton is press then do this
   if(isset($_POST['update_teacher']))
   {
       $id=$_POST['id'];
       $t_name=$_POST['name'];
       $t_des=$_POST['description'];
       $file=$_FILES['image']['name'];
       $dst="./image/".$file;
       $dst_db="image/".$file;

       move_uploaded_file($_FILES['image']['tmp_name'],$dst);

       if($file)
       {
        $sql2="UPDATE teacher SET  id='$id',name='$t_name',description='$t_des',image='$dst_db'  WHERE id='$id'";

       }
       else
       {
        $sql2="UPDATE teacher SET  id='$id',name='$t_name',description='$t_des' WHERE id='$id'";

       }
     
       $result2=mysqli_query($data,$sql2);
       if($result2)
       {
           header('location:admin_view_teacher.php');
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
        <h1>Update Student</h1>

        <div class="div_deg">
            <form action="#" method="POST" enctype="multipart/form-data">
                <input type="text" name="id" value="<?php echo "{$info['id']}"; ?>"hidden>
                <div>
                    <label for="">Teacher Name</label>
                    <input type="text" name="name" value="<?php echo "{$info['name']}"; ?>">
                </div>
                <div>
                    <label for="">About Teacher</label>
                    <textarea name="description" 
                     rows="4">
                    <?php echo "{$info['description']}"; ?>
                    </textarea>
            
                </div>
                <div>
                    <label for="">Teacher Old Image</label>
                    <img height="100px" width="100px" src="<?php echo "{$info['image']}" ?>" alt="">
                </div>
                <div>
                    <label for="">Choose Teacher New Image</label>
                    <input type="file" name="image" value="">
                </div>
                <div>
                
                    <input type="submit" name="update_teacher" class="btn btn-success" value="Update">
                </div>
            </form>
        </div>
        </center>
        
    </div>

</body>
</html>