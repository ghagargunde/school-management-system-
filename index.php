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

  $sql1="SELECT * FROM course ";
  $result1=mysqli_query($data,$sql1);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>School Management</title>
    <script src="https://code.jquery.com/jquery-3.6.0.js"></script>
    <link rel="stylesheet" href="style.css">
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@3.3.7/dist/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

    <!-- Optional theme -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@3.3.7/dist/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">

    <!-- Latest compiled and minified JavaScript -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@3.3.7/dist/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
    <style>
       


/* Slideshow container */
.slideshow-container {
  max-width: 1000px;
  position: relative;
  margin: auto;
  
}

/* Caption text */
.text {
  color:black ;
  font-size: 30px;
  padding: 8px 12px;
  position: absolute;
  bottom: 8px;
  width: 100%;
  text-align: center;
}

/* Number text (1/3 etc) */
.numbertext {
  color: #f2f2f2;
  font-size: 12px;
  padding: 8px 12px;
  position: absolute;
  top: 0;
}

/* The dots/bullets/indicators */
.dot {
  height: 15px;
  width: 15px;
  margin: 0 2px;
  background-color: #bbb;
  border-radius: 50%;
  display: inline-block;
  transition: background-color 0.6s ease;
}

.section{
    background-color:#f5ebf5;
}

.active {
  background-color: #717171;
}

/* Fading animation */
.fade {
  animation-name: fade;
  animation-duration: 1.5s;
}

@keyframes fade {
  from {opacity: .4} 
  to {opacity: 1}
}

/* On smaller screens, decrease text size */
@media only screen and (max-width: 300px) {
  .text {font-size: 11px}
}
    </style>
    
   
</head>
<body>
    <nav >
        <label class="logo">M-School</label>

        <ul>
            <li><a href="#home">Home</a></li>
            <li><a href="#teacher">Teachers</a></li>
            <li><a href="#course">Courses</a></li>
            <li><a href="chatbot.php">Contact</a></li>
            <li class="">
                <a href="https://meet.google.com/ntz-ecek-kbi" target="_blank">Consult Online </a>	    
			      </li>
            <li><a href="#admission">Admission</a></li>
            <li><a href="login.php" class="btn btn-success">Login</a></li>
        </ul>
    </nav>
  <!--  <div class="section1" id="home">
        <label class="img_text">We Teach Students With Care</label>
        <img class="main_img" src="1st.jpg" alt="College" id="sam" />
    </div>
-->  //

<section class="section">

<div class="slideshow-container"  id="home">

<div class="mySlides fade">
  <div class="numbertext">1 / 6</div>
  <img src="4.jpg" style="width:100%">
  <div class="text">We Teach Students With Care</div>
</div>

<div class="mySlides fade">
  <div class="numbertext">2 / 6</div>
  <img src="2.jpg" style="width:100%">
  <div class="text">We Teach Students With Care</div>
</div>

<div class="mySlides fade">
  <div class="numbertext">3 / 6</div>
  <img src="3.jpg" style="width:100%">
  <div class="text">We Teach Students With Care</div>
</div>
<div class="mySlides fade">
  <div class="numbertext">4 / 6</div>
  <img src="4.jpg" style="width:100%">
  <div class="text">We Teach Students With Care</div>
</div>
<div class="mySlides fade">
  <div class="numbertext">5 / 6</div>
  <img src="5.jpg" style="width:100%">
  <div class="text">We Teach Students With Care</div>
</div>
<div class="mySlides fade">
  <div class="numbertext">6 / 6</div>
  <img src="6.jpg" style="width:100%">
  <div class="text">We Teach Students With Care</div>
</div>


</div>
<br>

<div style="text-align:center">
  <span class="dot"></span> 
  <span class="dot"></span> 
  <span class="dot"></span> 
  <span class="dot"></span> 
  <span class="dot"></span> 
  <span class="dot"></span> 
</div>

<script>
let slideIndex = 0;
showSlides();

function showSlides() {
  let i;
  let slides = document.getElementsByClassName("mySlides");
  let dots = document.getElementsByClassName("dot");
  for (i = 0; i < slides.length; i++) {
    slides[i].style.display = "none";  
  }
  slideIndex++;
  if (slideIndex > slides.length) {slideIndex = 1}    
  for (i = 0; i < dots.length; i++) {
    dots[i].className = dots[i].className.replace(" active", "");
  }
  slides[slideIndex-1].style.display = "block";  
  dots[slideIndex-1].className += " active";
  setTimeout(showSlides, 1500); // Change image every 2 seconds
}
</script>





</section>










    <div class="container">
        <div class="row">
            <div class="col-md-4">
                <img class="welcome_img" id="sam" src="project_image/school2.jpg" alt="">
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
         <h1>Our Course</h1>
     </center>
     <div class="container">
         <div class="row">
            

             <?php
                 while($info=$result1->fetch_assoc())
                 {
             ?>
                <div class="col-md-3">
                 <img class="teacher" src="<?php echo "{$info['image']}" ?>" alt="">
                 
                 <h3><?php echo "{$info['coursename']}" ?></h3>
               

        </div>
            <?php
                    }
            ?>
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