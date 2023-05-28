 <?php
      $host="localhost";
      $username="root";
      $pass="";
      $db="lostfound";
      
      $con=mysqli_connect($host,$username,$pass,$db);
      if(!$con){
      	die("Database connection error");
      }
      
    
      
      if(isset($_GET['status_id']))
      {
      	
      	
      	error_reporting(0);
      	$id=$_GET['status_id'];
      	echo "$id";
      	
     
      	
      $query1="UPDATE `newissue` SET `issue_status`='Resolved' where `item_id`= '$id'  ";
      	$res1=mysqli_query($con, $query1);
      	
      	 echo "<script>
     
      window.location.href='reported_items.php';
      </script>";
      
      }else
      {
      echo "<script>
      alert('Couldn't Update status');
      window.location.href='reported_items.php';
      </script>";
      }
      
       if(isset($_GET['status_id1']))
      {
      	
      	
      	error_reporting(0);
      	$id=$_GET['status_id1'];
      	echo "$id";
      	
     
      	
      $query1="UPDATE `newissue` SET `issue_status`='Not Resolved' where `item_id`= '$id'  ";
      	$res1=mysqli_query($con, $query1);
      	
      	 echo "<script>
     
      window.location.href='reported_items.php';
      </script>";
      
      }else
      {
      echo "<script>
      alert('Couldn't Update status');
      window.location.href='reported_items.php';
      </script>";
      }
      
      
      
     
?>
