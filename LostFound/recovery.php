<?php
      $host="localhost";
      $username="root";
      $pass="";
      $db="lostfound";
      
      $con=mysqli_connect($host,$username,$pass,$db);
      if(!$con){
      	die("Database connection error");
      }
      
      
      if(isset($_POST['update_pass']))
      {
      session_start();
     
      	error_reporting(0);
      	$password=$_POST['r_psw'];
       $email = isset($_SESSION['frgtemail']) ? $_SESSION['frgtemail'] : '';
   	

      	$query1="UPDATE `registered` SET `password`='$password' WHERE email='$email'";
     
      	$res1=mysqli_query($con, $query1);
   
if($res1)
      	{ 
     echo "<script>
      alert('Updated successfully');
      window.location.href='login.php';
      </script>";
                }
        
      	else{
      $msg2="Cannot update ";
      	?>
        <p>
        <?php if($msg2){?>
        <div class="alert alert-danger" style="text-align:center">
          <?php echo $msg2; } ?>
        </div>
        </p>
        <?php
      
      }
      }
   ?>
   
   <!DOCTYPE html>
<html lang="en">
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <!-- mobile metas -->
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="viewport" content="initial-scale=1, maximum-scale=1">

  <head>
    <title>Recover Password</title>

    <!-- Font Awesome icons (free version)-->
    <script src="https://use.fontawesome.com/releases/v5.15.4/js/all.js" crossorigin="anonymous">
    </script>
    <!-- Google fonts-->
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css" />
    <link href="https://fonts.googleapis.com/css?family=Lato:400,700,400italic,700italic" rel="stylesheet" type="text/css" />
    <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css'>
    <!-- Core theme CSS (includes Bootstrap)-->
    <link href="assets/css/styles.css" rel="stylesheet" />
  </head>

  <body class="bg-primary">

    <!---form--->
    <form action="recovery.php" method="post">
      <div class="container2" style="top:340px;">
        <center><span style="font-family:fantasy;">Lost and Found.com</span></center><br>
        <h5 class="text-center page-section-heading text-secondary ">Recover Password</h5>

        <hr>
        <br>

        <center>
          <div class="input-group">
            <input type="text" class="form-control " placeholder="New Password"  pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8}" title="Must contain at least one number and one uppercase and lowercase letter, and exactly 8 letters "name="r_psw" id="r_psw">
          </div>
          <br>
          <button class="btn btn-primary" type="submit"name="update_pass" id="update_pass">Update Password</button>
        </center>
      </div>
    </form>
  </body>

</html>
