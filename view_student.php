<?php
    error_reporting(0);
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

    $sql ="SELECT * FROM user WHERE usertype='student'";

    $result = mysqli_query($data,$sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin</title>
    <?php include 'admin_css.php' ?>

</head>
<body>
    <?php

    include 'admin_sidebar.php';
    ?>
  

    <div class="content">
        <center>
        <h1>Student Data</h1>

        <?php
        if($_SESSION['message'])
        {
            echo $_SESSION['message'];
        }
        unset($_SESSION['message']);

        ?>
       
        <hr>
        <br>
        <table border="1px">
            <tr>
            <!--    <th style="padding:20px; font-size:15px;">Sr.No</th> -->
                <th style="padding:20px; font-size:15px;">UserName</th>
                <th style="padding:20px; font-size:15px;">Email</th>
                <th style="padding:20px; font-size:15px;">Phone</th>
                <th style="padding:20px; font-size:15px;">Password</th>
                <th style="padding:20px; font-size:15px;">Delete</th>
                <th style="padding:20px; font-size:15px;">Update</th>
            </tr>
            <?php
                while($info=$result->fetch_assoc())
                {
            ?>

            <tr>
             <!--   <td style="padding: 20px;"><?php echo "{$info['id']}"; ?></td> -->
                <td style="padding: 20px;"><?php echo "{$info['username']}"; ?></td>
                <td style="padding: 20px;"><?php echo "{$info['email']}"; ?></td>
                <td style="padding: 20px;"><?php echo "{$info['phone']}"; ?></td>
                <td style="padding: 20px;"><?php echo "{$info['password']}";?></td>

                <td style="padding: 20px;">
                    <?php 
                        echo "<a onClick=\"javascript:return confirm ('Are You Sure To Delete This');\" class='btn btn-danger' href='delete.php?student_id={$info['id']}'>Delete</a>";
                    ?>
                </td>
                <td style="padding: 20px;"><?php echo "<a onClick=\"javascript:return confirm ('Are You Sure To Update This');\" class='btn btn-primary' href='update.php?student_id={$info['id']}'>Update</a>";?></td>

            </tr>

            <?php
            }
            ?>
        </table>
        </center>
        
    </div>

</body>
</html>