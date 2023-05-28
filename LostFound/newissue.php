<!DOCTYPE html>
<html lang="en">
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <!-- mobile metas -->
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="viewport" content="initial-scale=1, maximum-scale=1">

  <head>
    <title>New Issue</title>

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

<!--   displaying the details -->
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
        <span class="navbar-text text-black" style="font-family:fantasy ">Lost and Found .Com</span>
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
                    <h7 class="dropdown-header text-wrap ">
                  <div style="color:black;font-size:13px;"><center><?php echo $row1['name'];?>
             
                 <p  style="color:black;font-size:11px;"><?php echo $row1['email'];?><br>
                <?php echo $row1['user_id'];?></p>
                  </div>
                  <div class="dropdown-divider"></div>
                  <a href="edit_account.php?edit_id=<?php  echo  $row1['user_id']; ?>" class="dropdown-item">Edit Account</a>
                  <a href="delete.php?del_account_id=<?php  echo  $row1['user_id']; ?>" class="dropdown-item text-danger">Delete Account</a>
                  <div class="dropdown-divider"></div>
                  <a href="logout.php" class="dropdown-item">Logout</a>
                </h7>
              </div>
            </li>
          </ul>
        </div>
      </div>
    </nav>

    <br>
    <!---Page heading--->
    <div class="container m-5 py-5">
      <h5 class=" m-auto  page-section-heading text-secondary ">New Issue</h5>
      <hr class="m-sm-auto">

    <!---form--->
      <form method="POST"  action="newissue_db_connect.php"onsubmit="return formvalidation();" id="newissue">
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
        <div class="m-5 m-lg-5 form-row container ">
          <div class=" col-md-6"><input type="text" class="form-control" id="itemname"  name="itemname" placeholder="Item Name" required>
          </div><br>
            <div class=" col-md-6"><input type="text" class="form-control" id="reporterid"  name="reporterid" placeholder="reporter Id"  value="<?php echo $row1['user_id'] ?>"readonly>
             <?php  $reporter_id= $row1['user_id'];
                                  $_SESSION['user_id']= $reporter_id;?>
          </div><br>
          <div class=" col-md-6"><input type="text" class="form-control"  id="status" name="status" placeholder="status" value="Not resolved" readonly>
          </div><br>
          <div class=" col-md-6 ">
            <div class="form-check">
              <input class="form-check-input" type="radio" name="lost/found" id="lost"  value="Lost"required>
              <label class="form-check-label text-black-50" for="lost">
                Lost
              </label>
            </div>
            <div class="form-check">
              <input class="form-check-input" type="radio" name="lost/found" id="found"  value="Found"required>
              <label class="form-check-label text-black-50" for="lost">
                Found
              </label>
            </div>
          </div>
          <br>
          <div class=" col-md-6">
            <input type="text" class="form-select text-black-50"  id="date"  name="date" placeholder="DD/MM/YYYY" onfocus="(this.type='date')" required>
          </div><br>
          <div class="col-md-6">
            <input type="text" class="form-control" id="place" name="place" placeholder="Place you lost/found item" required>
          </div><br>
          <div class="col-md-6">
            <input type="text" class="form-control" id="details"  name="details" placeholder="Other Details">
          </div><br>
          <div class=" col-md-6 form-select">
            <div style="display:inline-block;"></div>
            <input  type="file" name="image" id="image"  onchange="preview()" required>
            <button type="button" onclick="clearImage()" class="btn btn-danger mt-3">Clear Image</button>
            <img id="frame" src="" class="img-fluid m-2" style="width:fit-content" />
          </div>
        </div>

        <!--JS---->
        <script>
          function preview() {
            frame.src = URL.createObjectURL(event.target.files[0]);
          }

          function clearImage() {
            document.getElementById('image').value = null;
            frame.src = "";

          }

        </script>

        <center>
          <button type="submit" name="submit" class="btn btn-outline-primary">Add Item</button>
          <button type="reset" class="btn btn-outline-danger">Clear All</button>
        </center>
        <br>
      </form>
    </div>
  </body>
  <?php
  }
  ?>
</html>
