<?php
      $host="localhost";
      $username="root";
      $pass="";
      $db="lostfound";
      
      $con=mysqli_connect($host,$username,$pass,$db);
      if(!$con){
      	die("Database connection error");
      }
      
      
      if(isset($_POST['update_item']))
      {
     
     
   
      	
      	error_reporting(0);
      	$id=$_GET['edit_id'];
       $item_name=$_POST['item_name'];
   	$place=$_POST['place'];
   	$lost_found=$_POST['lostfound']; 
   	$issue_date=$_POST['date'];
   	$other_details=$_POST['details'];  
   	$issue_status=$_POST['status']; 
       $image= $_POST['image'];
  
      
      
      	$query1="UPDATE `newissue` SET `item_name`='$item_name',`lost_found`='$lost_found',`image`='$image',`issue_date`='$issue_date',`place`='$place',`issue_status`='$issue_status',`other_details`='$other_details' WHERE item_id='$id'";
    
      	$res1=mysqli_query($con, $query1);
if($res1)
      	{ 
      	 
      	 echo "<script>
      alert('Successfully Updated');
      window.location.href='reported_items.php';
      </script>";
                }
        
      	else{
     
      
      	echo "<script>
      alert('Cannot update record');
      window.location.href='reported_items.php';
      </script>";
      
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
    <title>Edit Item</title>

    <!-- Bootstrap core JS-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
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
   
       include_once("db_connect.php");
       
    // getting the email used for login using session method
    
      $emailoruid = isset($_SESSION['emailoruid']) ? $_SESSION['emailoruid'] : '';
      
           
           $mysql="select * from registered where email='$emailoruid'  OR user_id='$emailoruid' ";
   
           $result=$con->query($mysql);
          
   
           if($row1=mysqli_fetch_assoc($result))
    {
               
   ?>

  <body>
    <!-- Navigation-->
    <nav class="navbar navbar-expand-lg bg-white text-wrap fixed-top py-2" id="mainNav">
      <div class="container-fluid">
        <span class="navbar-text text-black" style="font-family:fantasy ">Lost and Found </span>
        <button class="navbar-toggler text-dark " type="button" data-bs-toggle="collapse" data-bs-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">

          <i class=" fas fa-lg fa-bars "></i>
        </button>
        <div class="collapse navbar-collapse " id="navbarResponsive">
          <ul class="nav navbar-nav ms-auto">

            <li class="nav-item mx-0 mx-lg-1"><a class="nav-link py-3 px-0 px-lg-3 rounded " href="discover.php"> Discover Items</a></li>
            <li class="nav-item mx-0 mx-lg-1"><a class="nav-link py-3 px-0 px-lg-3 rounded text-decoration-underline " href="reported_items.php">Reported Items</a></li>
            <li class="nav-item dropdown mx-0 mx-lg-1">
              <a href="#" class="nav-link py-3 px-0 px-lg-3 rounded  dropdown-toggle" data-bs-toggle="dropdown"><i class='px-0  rounded   fas fa-lg fa-user-circle'></i></a>
              <div class="dropdown-menu dropdown-menu-end">
                <div class="dropdown-divider"></div>
                <h6 class="dropdown-header">
                  <div style="color:black;font-size:13px;">
                    <center><?php echo $row1['name'];?>

                      <p style="color:black;font-size:11px;"><?php echo $row1['email'];?><br>
                        <?php echo $row1['user_id'];?></p>
                    </center>
                  </div>
                  <div class="dropdown-divider"></div>
                  <a href="#" class="dropdown-item text-decoration-underline">Edit Account</a>
                  <a href="delete.php?del_account_id=<?php  echo  $row1['user_id']; ?>" class="dropdown-item text-danger" onclick="return confirm('Are you sure you want to delete?');">Delete Account</a>
                  <div class="dropdown-divider"></div>
                  <a href="logout.php" class="dropdown-item">Logout</a>
                </h6>
              </div>
            </li>
          </ul>
        </div>
      </div>
    </nav>

    <br>
    <!---Page heading--->
    <div class="container m-5 py-5">
      <h5 class=" m-auto  page-section-heading text-secondary ">Edit Item</h5>
      <hr class="m-sm-auto">



      <?php
               include("db_connect.php");
               error_reporting(0);
               
               	$id=$_GET['edit_id'];
                     
                     
                     $mysql="select * from newissue where item_id='$id'";
                     $result=$con->query($mysql);
                    
               
                     if($rows =mysqli_fetch_assoc($result))
                     {
                  
               
               
               ?>
      <!---form--->
      <form name="edit" method="post" onchange="update()">
        <div class="m-5 m-lg-5 form-row container ">
          <div class=" col-md-6"><input type="text" class="form-control" id="item_name" name="item_name" value="<?php echo  $rows['item_name']; ?> " required>
          </div><br>


          <div class="col-md-6">
            <select name="status" id="status" class="form-group btn">
              <option class="btn-outline-primary  " value="<?php echo  $rows['issue_status']; ?>" selected><?php echo  $rows['issue_status']; ?></option>
              <option class="option" value="Resolved"> Resolved</option>
              <option class="option" value="Not Resolved">Not Resolved</option>
            </select>
          </div>
          <br>

          <div class=" col-md-6 ">
            <?php 
          if (  $rows['lost_found'] =="Lost")
          {
      
?>
            <div class="form-check">
              <input class="form-check-input" type="radio" name="lostfound" id="lost" value="<?php echo  $rows['lost_found']; ?> " checked>
              <label class="form-check-label text-black-50" for="lost">
                Lost
              </label>
            </div>

            <div class="form-check">
              <input class="form-check-input" type="radio" name="lostfound" id="found" value="Found">
              <label class="form-check-label text-black-50" for="found">
                Found
              </label>
            </div>
            <?php } else
{
?>

            <div class="form-check">
              <input class="form-check-input" type="radio" name="lostfound" id="lost" value="Lost">
              <label class="form-check-label text-black-50" for="lost">
                Lost
              </label>
            </div>

            <div class="form-check">
              <input class="form-check-input" type="radio" name="lostfound" id="found" value="<?php echo  $rows['lost_found']; ?> " checked>
              <label class="form-check-label text-black-50" for="found">
                Found
              </label>
            </div>
            <?php 
            }
            ?>
          </div>
          <br>
          <div class=" col-md-6">
            <input type="date" class="form-select text-black-50" id="date" name="date" value="<?php echo  $rows['issue_date']; ?>">
          </div><br>
          <div class="col-md-6">
            <input type="text" class="form-control" id="place" name="place" value="<?php echo  $rows['place']; ?>" required>
          </div><br>
          <div class="col-md-6">
            <input type="text" class="form-control" id="details" name="details" value="<?php echo  $rows['other_details']; ?>" required>
          </div><br>
          <div class=" col-md-6 form-select">
            <div style="display:inline-block;"></div>

            <img id="pre" src="<?php   echo 'assets/img/issue_img/'.$rows['image'];?>" class="img-fluid m-2" style="width:fit-content" onload="preview()" />
            <input type="file" id="image" name="image" value="<?php   echo 'assets/img/issue_img/'.$rows['image'];?>" onchange="preview1()">
            <img id="frame" src="" class="img-fluid m-2" style="width:300px" onclick="zoomin();" />
            <button type="button" onclick="clearImage()" class="btn btn-danger mt-3">Clear Image</button>
          </div>
        </div>
        <center>
          <button type="submit" name="update_item" class="b btn btn-outline-primary"> Update Item</button>
          <button type="reset" class="btn btn-outline-danger">Clear All</button>
        </center>
        <br>
      </form>
    </div>
  </body>
  <?php 
}
else
{?>

  <header class=" text-dark text-center">
    <div class="container d-flex align-items-center flex-column">
      <img class="img-fluid rounded " src="https://i.pinimg.com/564x/09/4e/9a/094e9a86f7c96314235216b463dcce1f.jpg" style="width:300px;" id="lost_image" alt="..." />
      <h4 class=" text-dark">
        <?php	
         echo "Couldn't fetch data from database";
         ?>
      </h4>
    </div>
  </header>
  <?php
}

  } else
   {
   ?>
  <header class=" text-light text-center">
    <div class="container d-flex align-items-center flex-column">
      <img class="img-fluid rounded " src="https://i.pinimg.com/564x/65/2b/1d/652b1d4c0af96bca477945270a12c169.jpg" style="width:800px;" id="lost_image" alt="..." />
      <h4 class=" text-dark">
        <?php	
         echo "Not Found or session expired😕️";
         ?>
        <br><br>
        <a href='login.php' class="btn btn-lg  btn-primary">Login </a>
      </h4>
    </div>
  </header>
  <?php
   $con->close();
   }
   ?>

  <script>
    function preview1() {
      frame.src = URL.createObjectURL(event.target.files[0]);
    }

    function preview() {
      pre.src = URL.createObjectURL(event.target.files[0]);
    }

    function clearImage() {
      document.getElementById('image').value = null;
      frame.src = "";
    }

    function zoomin() {
      var GFG = document.getElementById("frame");
      var currWidth = GFG.clientWidth;
      GFG.style.width = (currWidth + 200) + "px";
    }

    button = document.querySelector(".b");
    button.disabled = true;

    function update() {
      button.disabled = false; //button is enabled
    }

  </script>

</html>

