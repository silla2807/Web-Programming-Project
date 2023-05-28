<!DOCTYPE html>
<html lang="en">
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />

  <head>
    <title>Reported Items</title>
  </head>
  <!-- Bootstrap core JS-->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
  <!-- Font Awesome icons (free version)-->
  <script src="https://use.fontawesome.com/releases/v5.15.4/js/all.js" crossorigin="anonymous"></script>
  <!-- Google fonts-->
  <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css" />
  <link href="https://fonts.googleapis.com/css?family=Lato:400,700,400italic,700italic" rel="stylesheet" type="text/css" />
  <!-- Core theme CSS (includes Bootstrap)-->
  <link href="assets/css/styles.css" rel="stylesheet" />
  <!---icon--->
  <link rel='stylesheet' href='https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.2/font/bootstrap-icons.css'>


  <!--   displaying the details -->
  <?php
   session_start();
   
       include_once("db_connect.php");
       
    // getting the email used for login using session method
    
      $emailoruid = isset($_SESSION['emailoruid']) ? $_SESSION['emailoruid'] : '';
      
           
           $mysql="select *  from registered where email='$emailoruid'  OR user_id='$emailoruid' ";
   
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
            <li class="nav-item mx-0 mx-lg-1"><a class="nav-link py-3 px-0 px-lg-3 rounded text-decoration-underline " href="#">Reported Items</a></li>

            <li class="nav-item dropdown mx-0 mx-lg-1">
              <a href="#" class="nav-link py-3 px-0 px-lg-3 rounded  dropdown-toggle" data-bs-toggle="dropdown"><i class='px-0  rounded  fas fa-lg fa-user-circle'></i></a>
              <div class="dropdown-menu dropdown-menu-end">
                <h6 class="dropdown-header text-wrap ">
                  <div style="color:black;font-size:13px;">
                    <center>
                      <?php echo $row1['name'];?>
                      <p style="color:black;font-size:11px;">
                        <?php echo $row1['email'];?>
                        <br>
                        <?php echo $row1['user_id'];?>
                      </p>
                    </center>
                  </div>
                  <div class="dropdown-divider"></div>
                  <a href="edit_account.php?edit_id=<?php  echo  $row1['user_id']; ?>" class="dropdown-item">Edit Account</a>
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
    <div class="container m-5 py-5">
      <h5 class=" m-auto  page-section-heading text-secondary ">Reported Items</h5>
      <hr class="m-sm-auto">
      <div class=" px-lg-5 text-white text-end">
        <br>
        <a class=" btn btn-info" href="newissue.php">
          <i class="fa fa-plus-square" aria-hidden="true"></i>&nbsp;&nbsp;&nbsp;New Issue</a>
      </div>
      <?php
  
 
            $reported_id=$row1['user_id'];
          
           $mysql1= "SELECT * FROM `newissue` WHERE reporter_id='$reported_id' ORDER BY Uploading_time DESC";
           $res=mysqli_query($con,$mysql1);
           $count=mysqli_num_rows($res);
      
      if($count >=1)
      	{ 
       while($rows = mysqli_fetch_assoc($res))
      {
      ?>


      <br>
      <center>
        <div class="modal-xl table table-bordered" style="width:1200px;height:400px;">
          <table>
            <tr>
              <td>

                <br>
                <div class="mb-3">
                  <div class="portfolio-item mx-auto" data-bs-toggle="modal" data-bs-target="#portfolioModal<?php echo $rows['item_id'];?>">
                    <div class="portfolio-item-caption d-flex align-items-center justify-content-center h-100 w-100  rounded-pill">
                      <div class="portfolio-item-caption-content text-center text-white">
                        <div class="portfolio-item-caption-content text-center text-white">
                          <div class="rounded container" style="width:350px;">
                            <img src="<?php echo 'assets/img/issue_img/'.$rows['image'];?>" width="300" height="300" data-bs-dismiss="modal">
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>



                <div class="portfolio-modal modal fade" id="portfolioModal<?php echo $rows['item_id'];?>" tabindex="-1" aria-labelledby="portfolioModal<?php echo $rows['item_id'];?>" aria-hidden="true">
                  <div class="modal-dialog modal-xl">
                    <div class="modal-content">

                      <div class="modal-header border-0"><button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close"></button></div>
                      <div class="modal-body text-center pb-5">
                        <div class="container">
                          <div class="row justify-content-center">
                            <div class="col-lg-8">


                              <h3><?php echo $rows['item_name'];?> </h3>
                              &nbsp;&nbsp;
                              <button type=""  class="btn-sm btn-info"> <?php echo  $rows['lost_found'];?></button>
                              <hr>
                              Reporter ID: <?php  $r_id= $rows['reporter_id']; echo  $rows['reporter_id'];?><br>
                              Lost/Found on: <?php echo $rows['issue_date'];?><br>
                              Place: <?php echo $rows['place'];?><br>
                              Other Details: <?php echo $rows['other_details'];?><br>
                              <b>
                                <h7 style="color:blue;">Status: <?php echo $rows['issue_status'];?> </h7>
                              </b>
                              <br>
                              <hr>
                              <!-- Portfolio Modal - Image-->
                              <img class="img-fluid rounded mb-5" src="<?php echo 'assets/img/issue_img/'.$rows['image'];?>" width="300" height="300" id="reported" alt="..." />
                              <!-- Portfolio Modal - Text--><br>
                              <button type="submit" id="zoomin" class="btn btn-primary"><i class=" fa fa-plus" onclick="zoom_in();"></i></button>
                              <button class="btn btn-primary" data-bs-dismiss="modal">
                                <i class="fas fa-times fa-fw"></i>
                                Close Window
                              </button>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </td>
              <td class="m-2 row col">
                <div class=" align-items-left">
                  <div class=" container" style="text-align: right;margin-right:500px;">
                    <a href="#" class="nav-link py-3 px-0 px-lg-5 rounded  dropdown-toggle" data-bs-toggle="dropdown"><i class='fas fa-bars'></i></a>
                    <div class=" m-5 dropdown dropdown-menu dropdown-menu-end">
                      <div class="dropdown-divider"></div>
                      <?php 
          if (  $rows['issue_status'] == "Resolved")
          {
      
?>
                      <a href="status.php?status_id1=<?php echo  $rows['item_id']; ?>" class="dropdown-item ">Mark as Not resolved</a>
                      <?php }else{
          ?>
                      <a href="status.php?status_id=<?php echo  $rows['item_id']; ?>" class="dropdown-item">Mark as resolved</a>
                      <?php 
           }?>
                      <a href="edit_item.php?edit_id=<?php  echo  $rows['item_id']; ?>" class="dropdown-item">Edit</a>
                      <a href="delete.php?del_issue_id=<?php  echo  $rows['item_id']; ?>" class="dropdown-item  text-danger" onclick="return confirm('Are you sure you want to delete?');">Delete</a>
                    </div>
                  </div>
                  <h3><?php echo $rows['item_name'];?> </h3>
                  <hr>
                  Reporter ID: <?php  $r_id= $rows['reporter_id']; echo  $rows['reporter_id'];?><br>
                  Lost/Found on: <?php echo $rows['issue_date'];?><br>
                  Place: <?php echo $rows['place'];?><br>
                  Other Details: <?php echo $rows['other_details'];?><br>
                  <b>
                    <?php if ($rows['issue_status']=="Resolved")
                {
                ?>
                    <h7 style="color: rgba(17, 110, 203,1);"> <i class="btn-info fas fa-check fa-fw"></i> <?php echo $rows['issue_status'];?> </h7>
                    <?php }else{?>

                    <h7 style="color:#ffcd39"> <i class="btn-warning fas fa-times fa-fw"></i> <?php echo $rows['issue_status'];?> </h7>
                    <?php }?>
                  </b>
                  <br><br>
                </div>


              </td>


            </tr>
          </table>
        </div>
      </center>
      <br>
      <br> <br>




      <?php
  }}

 
  else
   {
   
  ?>
      <header class=" text-dark text-center">
        <div class="container d-flex align-items-center flex-column">
          <img class="img-fluid rounded " src="https://i.pinimg.com/564x/44/d3/0f/44d30ff1c091ee3d233d1b78e334a5ae.jpg" style="width:300px;" alt="..." />
          <h4 class=" text-dark">
            <?php	
         echo "Not Recent uploads";
         ?>
          </h4>
          <h6>Noone hasn't reported anything yet</h6>


        </div>
      </header>
      <?php
   }}   else
   {
   ?>

      <header class=" text-light text-center">
        <div class="container d-flex align-items-center flex-column">
          <img class="img-fluid rounded " src="https://i.pinimg.com/564x/65/2b/1d/652b1d4c0af96bca477945270a12c169.jpg" style="width:800px;" alt="..." />
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

    </div>

  </body>
  <script>
    function zoom_in() {
      var GFG = document.getElementById("reported");
      var currWidth = GFG.clientWidth;
      GFG.style.width = (currWidth + 200) + "px";
    }

  </script>

</html>

