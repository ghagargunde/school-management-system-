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
        <h1>Admin Dashbord</h1>
       
        
    </div>

</body>
</html>