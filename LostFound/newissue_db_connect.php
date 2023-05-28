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
   	
   	$reporter_id= isset($_SESSION['user_id']) ? $_SESSION['user_id'] : '';
 
   	$item_name=$_POST['itemname'];
   	$place=$_POST['place'];
   	$lost_found=$_POST['lost/found']; 
   	$issue_date=$_POST['date'];
   	$other_details=$_POST['details'];  
       $issue_status=$_POST['status']; 
      $fileName = $_POST["image"];


   	
    
         
                                 

    $query    =    "INSERT INTO `newissue`( `reporter_id`, `item_name`, `lost_found`, `image`, `issue_date`, `place`, `issue_status`, `other_details`) VALUES ('$reporter_id','$item_name','$lost_found', '$fileName' ,'$issue_date','$place','$issue_status','$other_details')";

   		$res=mysqli_query($con,$query);
   	
   		
   		
   	if($res){
   	
   	   
   	
   	  echo "<script>
   alert('Reported issue Successfully');

      window.location.href='reported_items.php';

   </script>";
   	}
   	 
  
   	 
   
       
   	}else{
   		echo "<script>
   alert('Not updated ,try again.....!!');
  window.location.href='newissue.php';
   </script>";
   	}
   	
   	
   	
   
  
   ?>

