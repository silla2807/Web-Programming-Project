<!DOCTYPE html>
<html lang="en">
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <!-- mobile metas -->
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="viewport" content="initial-scale=1, maximum-scale=1">

  <head>
    <title>Forgot Password?</title>

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

  <?php
   session_start();
   error_reporting(0);
   require('db_connect.php');
   
   if(isset($_POST['submit']))
     {
       
       $email=$_POST['frgtemail'];
  
            $query1 = "SELECT * FROM `registered` WHERE email='$email'";
            
            	$result1 = mysqli_query($con,$query1) or die(mysql_error());
            	$ret = mysqli_num_rows($result1);
            	
       if($ret>0){
        $_SESSION['frgtemail']=$email;
  
        header('location: recovery.php');

 
       }
       else{
         $msg="Invalid Details. Please try again.";
       }
     }
   
   
   ?>
  <body class="bg-primary">
   <p><?php if($msg){?>
        <div class="alert alert-danger" style="text-align:center">
          <?php echo $msg; } ?>
        </div></p>
    <!---form--->
    <form action="" method="post">
      <div class="container2" style="top:340px;">
 
        <center><span style="font-family:fantasy;">Lost and Found.com</span></center><br>
        <h5 class="text-center page-section-heading text-secondary ">Forgot Password?</h5>

        <hr>
        <br>
 
        <center>
          <div class="input-group">
            <input type="text" class="form-control " placeholder="Enter Email-ID" name="frgtemail" id="frgtemail" required>
          </div><br>
          <button class="btn btn-primary "  type="submit" name="submit"  id="submit" >Submit</button>
          <br>
          <b><a style="color:rgb(0, 0, 14);font-weight:80px;font-size:14px;text-decoration: underline;" href="login.php" >Nevermind</a></b>
        </center>
      </div>
    </form>
  </body>

</html>
