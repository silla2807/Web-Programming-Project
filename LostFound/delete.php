 <?php
      $host="localhost";
      $username="root";
      $pass="";
      $db="lostfound";
      
      $con=mysqli_connect($host,$username,$pass,$db);
     
     if(!$con){
      	die("Database connection error");
      }
      
    
      
      if(isset($_GET['del_account_id']))
      {
      	
      	
      	error_reporting(0);
      	$ids=$_GET['del_account_id'];
      
      	
     


      	
      	
     $query0="DELETE FROM `newissue` WHERE reporter_id='$ids'";
       $result0=mysqli_query($con, $query0);
         $query="SET FOREIGN_KEY_CHECKS=0";
       	$result=mysqli_query($con, $query);
     $query1="DELETE FROM `registered` WHERE user_id = '$ids' ";
     $result1=mysqli_query($con, $query1);
    
      	
      	if($result1 )
      	{ 
      	$qu="SET FOREIGN_KEY_CHECKS=1";
        $res=mysqli_query($con, $qu);
      	 
         echo "<script>
            alert('Successfully Deleted');
            window.location.href='register.php';
              </script>";
         }
        
      	else
        {
      	echo "<script>
             alert('Cannot delete record');
             window.location.href='discover.php';
             </script>";   
      }
      }
      
      
      
       if(isset($_GET['del_issue_id']))
      {
      	
      	
      	error_reporting(0);
      	$id=$_GET['del_issue_id'];
      	
      	
        $query2="SET FOREIGN_KEY_CHECKS=0";
       	$result2=mysqli_query($con, $query2);
      	
      	$query3="DELETE FROM `newissue` WHERE item_id = $id";
      	$result3=mysqli_query($con, $query3);
      
      	echo "$query3"; 
      	if($result3)
      	{ 
      	$query4="SET FOREIGN_KEY_CHECKS=1";
        $result4=mysqli_query($con, $query4);
      		
          echo "<script>
      alert('Successfully Deleted');
      window.location.href='reported_items.php';
      </script>";
                }
        
      	else{
      	
      	echo "<script>
      alert('Cannot delete record');
      window.location.href='reported_items.php';
      </script>";
      
      }
      }
      
      
      
     

