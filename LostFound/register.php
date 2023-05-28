<!DOCTYPE html>
<html lang="en">
  <html lang="en">
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- mobile metas -->
    <meta name="viewport" content="width=device-width">

    <head>
      <title>Sign Up</title>

      <!-- Font Awesome icons (free version)-->
      <script src="https://use.fontawesome.com/releases/v5.15.4/js/all.js" crossorigin="anonymous">
      </script>
      <!-- Google fonts-->
      <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css" />
      <link href="https://fonts.googleapis.com/css?family=Lato:400,700,400italic,700italic" rel="stylesheet" type="text/css" />
      <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css'>
      <!-- Core theme CSS (includes Bootstrap)-->
      <link href="assets/css/styles.css" rel="stylesheet" />
      <script src="LF_scripts.js"></script>
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
    </head>



    <body class="bg-primary">
      <form method="post" action="insert-on-reg.php" onsubmit="return formvalidation();" id="signup">
        <?php 
            if(isset($_SESSION['error']))
            {
            	echo $_SESSION['error'];
            	unset($_SESSION['error']);
            }
            if(isset($_SESSION['success']))
            {
            	echo $_SESSION['success'];
            	unset($_SESSION['success']);
            }
            ?>
        <div class=" container2">
          <div class="align-content-center">
            <img src="https://i.pinimg.com/564x/e3/f1/fb/e3f1fbece11ad4ce7a0477a2c2eb3ad7.jpg" style="width:50%;height:50%;">
          </div>
          <h5 class="text-center page-section-heading text-secondary ">Register</h5>
          <p class="text-center">Sign up to <span style="font-family:fantasy ">Lost and Found.com</span></p>

          <hr>
          <br>

          <center>
            <div class="input-group">
              <input type="text" class="form-control " placeholder="Name" name="name" id="name" required> </div><br>
            <div class="input-group">
              <input type="text" class="form-control" placeholder="Create your own User-ID" pattern="[A-Za-z0-9]{9}" title="Only kkkkletters (either case), numbers; no more than
            9 characters" name="userid" id="userid" required></div> <br>
            <div class="input-group">
              <input type="text" class="form-control" placeholder="E-mail" name="email" id="email" required></div> <br>
            <div class="input-group">
              <input type="password" class="form-control" placeholder="Password" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8}" title="Must contain at least one number and one uppercase and lowercase letter, and exactly 8 letters " name="psw" id="psw" required></div><br>

            <button type="submit" name="submit" class="btn btn-primary input-group">Register</button><br><br>
            Already have an account?<b><a style="color:blue;font-weight:80px;font-size:14px;text-decoration: underline;" href="login.php" >Login</a></b>
          </center>
        </div>
      </form>
    </body>

  </html>

