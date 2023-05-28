<!DOCTYPE html>
<html lang="en">
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <!-- mobile metas -->
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="viewport" content="initial-scale=1, maximum-scale=1">

  <head>
    <title>Log In</title>

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
      $host="localhost";
      $username="root";
      $pass="";
      $db="lostfound";
      
      $con=mysqli_connect($host,$username,$pass,$db);
      if(!$con){
      	die("Database connection error");
      }
      
      // if entered email the following process will be done
      
      if(isset($_POST['emailoruid']))
      {
      	
      	   
      	error_reporting(0);
      	$emailoruid=$_POST['emailoruid'];
      	$password=($_POST['psw']);
      	$query1="SELECT `user_id` FROM `registered` WHERE `email` = '$emailoruid'  OR  `user_id` = '$emailoruid'";
      	$res1=mysqli_query($con, $query1);
      	$count1=mysqli_num_rows($res1);
      		
      	if($count1 ==1)
      	{ 
      	$_SESSION['emailoruid']= $emailoruid;
      	$query="Select * from registered where (email='$emailoruid'  OR user_id='$emailoruid') AND password = '$password'";
      	$res=mysqli_query($con, $query);
      	$count=mysqli_num_rows($res);
      	
      	if($count ==1)
      	{  
         
                  
                
                  $_SESSION['emailoruid']= $emailoruid;
                  
      	 echo "<script>
      alert('Successfully Loggedin');
      window.location.href='discover.php';
      </script>";
       
                }
        
      	else{
      	
   
      
       $msg=" Incorrect password or email";
       ?><p>
       <?php if($msg){?>
        <div class="m-5 alert alert-danger" style="text-align:center">
          <?php echo $msg; } ?>
        </div>
        </p>
      
   <?php     
      }
     
      }
      
      else
        {
        
     $msg1=" Account doesn't exist";?>
        <p>
        <?php if($msg1){?>
        <div class="alert alert-danger" style="text-align:center">
          <?php echo $msg1; } ?>
        </div>
        </p>
        <?php
      }
      }
      else
      {
      $msg2= "some other error";
      }
      
      ?>

  <body class="bg-primary">

    <form name="login" method="post" onsubmit=" formvalidation();">
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
      <div class="container2" style="top:390px;">
        <div class="align-content-center">
          <img src="https://i.pinimg.com/564x/92/3b/c6/923bc6cc1dc644e8f2a8142c229cca64.jpg" style="width:50%;height:50%;">
        </div>
        <h5 class="text-center page-section-heading text-secondary ">Log In</h5>
        <p class="text-center">Log In to <span style="font-family:fantasy ">Lost and Found.com</span></p>
      
        <hr>
        <br>

        <center>
          <div class="input-group">
            <input type="text" class="form-control " placeholder="E-mail/User-ID"  name="emailoruid" id="emailoruid" required>
          </div><br>
          <div class="input-group">
            <input type="password" class="form-control" placeholder="Password"  pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8}" title="Must contain at least one number and one uppercase and lowercase letter, and exactly 8 letters "name="psw" id="psw" required>
          </div><br>
          <button type="submit" name="submit" class="btn btn-primary">Log In</button>
 
        <br>
        <br>
    
      
          Dont have an account?<b><a style="color:blue;font-weight:80px;font-size:14px;text-decoration: underline;" href="register.php">Sign Up</b></a><br>
      
        <b><a style="color:rgb(0, 0, 14);font-weight:80px;font-size:14px;" href="forgotpass.php">Forgot Password?</a></b></center>
      </div>
    </form>
  </body>
</html>
