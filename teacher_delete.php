<?php

session_start();
  $host = "localhost";
  $user ="root";
  $password ="";
  $db = "mschool";

  $data=mysqli_connect($host,$user,$password,$db);

  if($_GET['teacher_id'])
  {
      $user_id=$_GET['teacher_id'];

      $sql="DELETE FROM teacher WHERE id='$user_id'";

      $result=mysqli_query($data,$sql);

      if($result)
      {
        $_SESSION['message']='Delete Student is Successful';
        header("location:admin_view_teacher.php");
      }
  }

?>