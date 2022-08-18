<?php
    session_start();
    if(!isset($_SESSION['username']))
    {
        header("Location:login.php");
    }

    elseif($_SESSION['usertype']=='admin')
    {
        header("Location:login.php");
    }
    $host = "localhost";
    $user ="root";
    $password ="";
    $db = "mschool";

    $data=mysqli_connect($host,$user,$password,$db);

    $name=$_SESSION['username'];
    $sql="SELECT * FROM user WHERE username='$name'";
    $result=mysqli_query($data, $sql);

    $info=mysqli_fetch_assoc($result);

    if(isset($_POST['update_profile']))
    {
        $email=$_POST['email'];
        $phone=$_POST['phone'];
        $password=$_POST['password'];

        $query="UPDATE user SET email='$email',phone='$phone',password='$password' WHERE username='$name'";

        
        $result2=mysqli_query($data,$query);
            if($result2)
            {
                header("location:studenthome.php");
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
        Label{
            display:inline-block;
            text-align:right;
            width:100px;
            padding-top:10px;
            padding-bottom:10px;
        }
        .div_deg{
            background-color:skyblue;
            width:400px;
            padding-bottom:50px;
            padding-top:70px;
        }
    </style>

    <?php
    include 'student_css.php';
    ?>
</head>
<body>
    <?php
    include 'student_sidebar.php';
    ?>

    <div class="content" >
        <center>
            <h1>Update Profile</h1>
            <br>
            
        <form action="#" method="POST">
        <div class="div_deg">
                
                <div>
                    <label for="">Email</label>
                    <input type="text" name="email" value="<?php echo "{$info['email']}" ?>">
                </div>
                <div>
                    <label for="">Phone No</label>
                    <input type="number" name="phone" value="<?php echo "{$info['phone']}" ?>">
                </div>
                <div>
                    <label for="">Password</label>
                    <input type="text" name="password" value="<?php echo "{$info['password']}" ?>">
                </div>
                <div>
                    <input class="btn btn-primary" type="submit" value="UPDATE" name="update_profile">
                </div>
                </div>
        </form>
        
        </center>
        
        
    </div>

</body>
</html>