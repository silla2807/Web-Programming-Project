<?php
      $host="localhost";
      $username="root";
      $pass="";
      $db="lostfound";
      
      $con=mysqli_connect($host,$username,$pass,$db);
      if(!$con){
      	die("Database connection error");
      }
      
      
      if(isset($_POST['update_account']))
      {
     
      	error_reporting(0);
      	$id=$_GET['edit_id'];
        $name=$_POST['name'];
      	$email=$_POST['email'];
      	$pasword=$_POST['psw']; 
   	

      	$query1="UPDATE `registered` SET `name`='$name',`email`='$email' WHERE user_id='$id' AND 'name' != '' ";
     
      	$res1=mysqli_query($con, $query1);
      
if($res1)
      	{ 
      	 
      	$msg1="updated successfully";
      	
      	?>
        <p>
        <?php if($msg1){?>
        <br>
        <div class="m-5 alert alert-success " style="text-align:center;transition: transform .2.5s;">
          <?php echo $msg1; } ?>
        </div>
        </p>
        <?php
                }
        
      	else{
      $msg2="Cannot update ";
      	?>
        <p>
        <?php if($msg2){?>
        <br>
        <div class="m-5 alert alert-danger" style="text-align:center">
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
    <title>Edit Account</title>

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
               include("db_connect.php");
               error_reporting(0);
              
               
               	$id=$_GET['edit_id'];
                     
                     
                     $mysql="select * from registered where user_id='$id'";
                     
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
              <a href="#" class="nav-link py-3 px-0 px-lg-3 rounded  dropdown-toggle" data-bs-toggle="dropdown"><i class='px-0  rounded  fas fa-lg fa-user-circle'></i></a>
              <div class="dropdown-menu dropdown-menu-end">
                <div class="dropdown-divider"></div>
                <h6 class="dropdown-header">
                  <div style="color:black;font-size:13px;">
                    <center>
                    <?php echo $row1['name'];?>
                      <p style="color:black;font-size:11px;">
                      <?php echo $row1['email'];?><br>
                        <?php echo $row1['user_id'];?>
                        </p>
                    </center>
                  </div>
                  <div class="dropdown-divider"></div>
                  <a href="edit_account.php?edit_id=<?php  echo  $row1['user_id']; ?>" class="dropdown-item text-decoration-underline">Edit Account</a>
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
      <h5 class=" m-auto  page-section-heading text-secondary ">Edit Account</h5>
      <hr>
      <!---form--->
      <form name="edit_account" method="post" onchange="update()">
        <div class="m-5 m-lg-5 form-row container ">
          <div class=" col-md-6"><input type="text" class="form-control" id="inputName" name="name" placeholder="Name" value="<?php  echo  $row1['name']; ?>" required >
          </div><br>
          <div class="col-md-6">
            <input type="text" class="form-control" id="email" name="email" placeholder="Email" readonly value="<?php  echo  $row1['email']; ?>">
          </div><br>
          <div class="col-md-6">
            <input type="text" class="form-control" id="uid" name="uid" placeholder="Uid" readonly value="<?php  echo  $row1['user_id']; ?>">
          </div><br>
          
          <center>
            <button type="submit" name="update_account" class="edit_account btn btn-outline-primary">Update</button>
            <button type="reset" class="btn btn-outline-danger">Clear All</button></center>
        </div>
      </form>
    </div>
  </body>
  <?php }  else
   {
?>
<header class=" text-light text-center" >
      <div class="container d-flex align-items-center flex-column">
      <img class="img-fluid rounded " src="https://i.pinimg.com/564x/65/2b/1d/652b1d4c0af96bca477945270a12c169.jpg" style="width:800px;"id="lost_image" alt="..." />
     <h4 class=" text-dark">
      <?php	
         echo "Not Found or session expired😕️";
         ?>
      <br><br>
      <a href='login.php'  class="btn btn-lg  btn-primary">Login </a> 
    </h4>
       </div>
        </header>
  <?php
   $con->close();
   }
   ?>

<script>
    button = document.querySelector(".edit_account");
    button.disabled = true;

    function update() {
      button.disabled = false; //button is enabled
    }
    </script>
</html>

