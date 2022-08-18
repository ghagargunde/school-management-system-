<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Form</title>
    <style>



#myVideo {
  position: fixed;
  right: 0;
  bottom: 0;
  min-width: 100%; 
  min-height: 100%;
}

.form_deg{
  position: fixed;
  bottom: 0;
  background: rgba(0, 0, 0, 0.5);
  color: black;
  width: 100%;
  padding: 100px;
}


#myBtn:hover {
  background: #ddd;
  color: black;
}
</style>
    <link rel="stylesheet" href="style.css">
    
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@3.3.7/dist/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

    <!-- Optional theme -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@3.3.7/dist/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">

    <!-- Latest compiled and minified JavaScript -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@3.3.7/dist/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>

</head>
<body class="body_deg">
<video autoplay muted loop id="myVideo">
  <source src="video.mp4" type="video/mp4">
  Your browser does not support HTML5 video.
</video>

    <center>
        <div class="form_deg">
            <center class="title_deg">
                Login Form
                <h4>
               <?php 
                   error_reporting(0);
                   session_start();
                   session_destroy();
                   echo $_SESSION['loginMessage']; 
                ?>
                </h4>
            </center>
            <form action="login_check.php" method="POST" class="login_form">
                <div>
                    <label class="label_deg" for="">Username</label>
                    <input type="text" name="username">
                </div>
                <div>
                    <label class="label_deg" for="">Password</label>
                    <input type="password" name="password">
                </div>
                <div>
                    <input class="btn btn-primary" type="submit" value="Login" name="submit">
                    <a href="index.php" class="btn btn-success">Home</a>
                </div>
            </form>
        </div>
    </center>
</body>
</html>