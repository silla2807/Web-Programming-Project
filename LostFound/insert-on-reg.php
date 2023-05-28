<?php session_start();?>
<?php
   $host="localhost";
   $username="root";
   $pass="";
   $db="lostfound";
   
   $con=mysqli_connect($host,$username,$pass,$db);
   if(!$con){
   	die("Database connection error");
   }
   
   	
   	if(isset($_POST['submit']))
   	{
   
 
   	$name=$_POST['name'];
   	$userid=$_POST['userid'];
   	$email=$_POST['email']; 
   	$password=$_POST['psw'];
   
   $query1 = "SELECT * FROM `registered` WHERE email='$email' or  user_id='$userid'";
         
         	$result1 = mysqli_query($con,$query1) or die(mysql_error());
         	$rows1 = mysqli_num_rows($result1);
                 if($rows1){
                    
                   echo "<script>alert('Account  Exist ! ');
                            window.location.href='login.php';
                           </script>";
      
                  }
                  else
                  {
      $query    = "INSERT INTO `registered`(`user_id`, `name`, `email`,`password`) VALUES ('$userid','$name',  '$email','$password')";
      $result   = mysqli_query($con, $query);

       
       if ($result ) {
       
        echo "<script>
             alert('Registration succcessfull');
             window.location.href='login.php';
             </script>";

                     }
        else {
             
             echo "<script>
             alert(' Something went wrong');
             window.location.href='register.php';
             </script>";
             }
       
       }
        }
         else {
             
             echo "<script>
             alert(' Form not responding');
             window.location.href='register.php';
             </script>";
             }
   
?>

