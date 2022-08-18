<?php
  error_reporting(0);
  session_start();
  session_destroy();

  if($_SESSION['message'])
  {
      $message = $_SESSION['message'];
      echo "<script type='text/javascript'> 
      alert('$message')</script>";
  }

  $host = "localhost";
  $user ="root";
  $password ="";
  $db = "mschool";

  $data=mysqli_connect($host,$user,$password,$db);

  $sql="SELECT * FROM teacher ";
  $result=mysqli_query($data,$sql);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>School Management</title>
    <link rel="stylesheet" href="style.css">
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@3.3.7/dist/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

    <!-- Optional theme -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@3.3.7/dist/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">

    <!-- Latest compiled and minified JavaScript -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@3.3.7/dist/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>

</head>
<body>
    <nav >
        <label class="logo">M-School</label>

        <ul>
            <li><a href="#home">Home</a></li>
            <li><a href="#teacher">Teachers</a></li>
            <li><a href="#course">Courses</a></li>
            <li><a href="#contact">Contact</a></li>
            <li><a href="#admission">Admission</a></li>
            <li><a href="login.php" class="btn btn-success">Login</a></li>
        </ul>
    </nav>
    <div class="section1" id="home">
        <label class="img_text">We Teach Students With Care</label>
        <img class="main_img" src="project_image/school_management.jpg" />
    </div>

    <div class="container">
        <div class="row">
            <div class="col-md-4">
                <img class="welcome_img" src="project_image/school2.jpg" alt="">
            </div>
            <div class="col-md-8">
                <h1>Welcome To M-School</h1>
                <p>Vishwakarma Institute of Technology, Pune is run by Bansilal Ramnath Agarwal Charitable Trust (BRACT). The Trust was established on the 16th of June 1975 under Bombay Trust Act of 1950. The Trust undertakes educational, religious and social activities. "Vishwakarma" as per Indian mythology, is an architect-engineer of the Gods. The Trust has adopted this name with a vision to develop engineers who can take up challenges in technical field with original work and creativity.</p>
                    
            </div>
        </div>
    </div>
     <center id="teacher">
         <h1>Our Teachers</h1>
     </center>
     <div class="container">
         <div class="row">
            

             <?php
                 while($info=$result->fetch_assoc())
                 {
             ?>
                <div class="col-md-3">
                 <img class="teacher" src="<?php echo "{$info['image']}" ?>" alt="">
                 
                 <h3><?php echo "{$info['name']}" ?></h3>
                 <h5><?php echo "{$info['description']}" ?></h5>

        </div>
            <?php
                    }
            ?>
     </div>
     <center id="course">
         <h1>Our Courses</h1>
     </center>
     <div class="container">
         <div class="row">
             
             <div class="col-md-4">
                <img class="teacher" src="project_image/web.jpg" alt="">
                <h3>Web Development</h3>
             </div>
             <div class="col-md-4">
                <img class="teacher" src="project_image/graphic.jpg" alt="">
                <h3>Graphic Design</h3>

             </div>
             <div class="col-md-4">
                <img class="teacher" src="project_image/marketing.png" alt="">
                <h3>Marketing</h3>

             </div>
             
         </div>
     </div>

     <center id="admission">
         <h1 class="adm">Admission Form</h1>
     </center>
     <div align="center" class="admission_form">
         <form action="data_check.php" method="POST">
             <div class="adm_int">
                 <label for="" class="label_text">Name</label>
                 <input type="text" class="input_deg" name="name" placeholder="Enter your Full Name">
             </div>
             <div class="adm_int">
                 <label for="" class="label_text">Email</label>
                 <input class="input_deg" type="text" name="email" placeholder="Enter your Email">
             </div>
             <div class="adm_int">
                 <label for="" class="label_text">Phone</label>
                 <input class="input_deg" type="text" name="phone" placeholder="Enter your Phone Number">
             </div>
             <div class="adm_int">
                 <label for="" class="label_text">Message</label>
                <textarea class="input_txt" name="message" id="" cols="" rows=""></textarea>
             </div>
             <div class="adm_int">
                 
                 <input class="btn btn-primary" type="submit" id="submit" value="Apply" name="apply">
             </div>
             
         </form>
     </div>

     <footer>
         <h3 class="footer_text">All @copyright reserved by samyak</h3>
     </footer>
     
</body>
</html>