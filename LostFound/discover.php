<!DOCTYPE html>
<html lang="en">
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />

  <head>
    <title>Discover</title>

    <!-- Bootstrap core JS-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    <!-- Font Awesome icons (free version)-->
    <script src="https://use.fontawesome.com/releases/v5.15.4/js/all.js" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-1.12.4.min.js">
    </script>
    <!-- Google fonts-->
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css" />
    <link href="https://fonts.googleapis.com/css?family=Lato:400,700,400italic,700italic" rel="stylesheet" type="text/css" />
    <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css'>
    <!-- Core theme CSS (includes Bootstrap)-->
    <link href="assets/css/styles.css" rel="stylesheet" />
    <!---icon--->
    <link rel='stylesheet' href='https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.2/font/bootstrap-icons.css'>
  </head>

  <!--   displaying the details -->
  <?php
   session_start();
   
       include_once("db_connect.php");
       
    // getting the email or userid used for login using session method
    
      $emailoruid = isset($_SESSION['emailoruid']) ? $_SESSION['emailoruid'] : '';
      
           
           $mysql="select * from registered where email='$emailoruid'  OR user_id='$emailoruid' ";
   
           $result=$con->query($mysql);
          
   
           if($row1=mysqli_fetch_assoc($result))
    {
               
   ?>

  <body id="page-top">
    <!-- Navigation-->
    <nav class="navbar navbar-expand-lg bg-white text-wrap fixed-top py-2" id="mainNav">
      <div class="container-fluid">
        <span class="navbar-text text-black" style="font-family:fantasy ">Lost and Found </span>
        <button class="navbar-toggler text-dark " type="button" data-bs-toggle="collapse" data-bs-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
          <i class=" fas fa-lg fa-bars ">
          </i>
        </button>
        <div class="collapse navbar-collapse " id="navbarResponsive">
          <ul class="nav navbar-nav ms-auto">
            <li class="nav-item mx-0 mx-lg-1"><a class="nav-link py-3 px-0 px-lg-3 rounded text-decoration-underline " href="#"> Discover Items</a></li>
            <li class="nav-item mx-0 mx-lg-1"><a class="nav-link py-3 px-0 px-lg-3 rounded " href="reported_items.php">Reported Items</a></li>
            <li class="nav-item dropdown mx-0 mx-lg-1">
              <a href="#" class="nav-link py-3 px-0 px-lg-3 rounded  dropdown-toggle" data-bs-toggle="dropdown"><i class='px-0  rounded  fas fa-lg fa-user-circle'></i></a>
              <div class=" dropdown-menu dropdown-menu-end">
                <h7 class="dropdown-header text-wrap ">
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
                </h7>
              </div>
            </li>
          </ul>
        </div>
      </div>
    </nav>



    <!---Search-->
    <div class="container m-5 py-5">
      <h5 class=" m-auto  page-section-heading text-secondary ">Dashboard</h5>
      <h7>Welcome <?php echo $row1['name'];?></h7><br><br><br><br>
      <a href="#" style="color:blue;font-weight:80px;font-size:14px;text-decoration: underline;" onclick="openNav()"> Recent Resolves</a>
      <center>
        <img class="img-fluid rounded " src="https://i.pinimg.com/originals/7f/07/84/7f078458aa8dcd3edfcc68e2aabd8883.gif" style="margin-left:200px;width:180px;" alt="..." />
        <div class=" mx-5  d-inline">
          <form action="" method="POST">
            <input type="search" id="search" name="search" result="5" class=" card container shadow " Placeholder="Search here" style="margin-left:300px;position:relative;width:60%;height:50px;"><br>
            <div class="m-2"><button type="submit" name="lost" class="btn btn-primary"><i class="fas fa-search"></i>Lost</button>&nbsp;&nbsp;
              <button type="submit" name="found" class="btn btn-primary"><i class=" fa fa-search"></i>Found</button>
              <button type="submit" name="reset" class="btn btn-primary" onClick="window.location.reload()"><i class=" fa  fa-spinner"></i></button>
            </div>
          </form>
        </div>
      </center>
    </div>






    <div id="mySidenav" class="sidenav">
      <br>
      <br>
      <?php
$sql="select * from newissue  WHERE  issue_status='Resolved'   ORDER BY uploading_time DESC  limit 15";
            $res=$con->query($sql);
        $count=mysqli_num_rows($res);
      	if($count >=1)
      	{
      ?> <a href="#" onclick="closeNav()"> <i class="align-left fas fa-times fa-fw btn-danger"></i></a>
      <?php
        while($row=mysqli_fetch_assoc($res))
 {
            
 ?>

      <br>



      <h3><?php echo $row['item_name'];?> </h3>
      <hr>
      Reporter ID: <?php  $r_id= $row['reporter_id']; echo  $row['reporter_id'];?><br>
      Lost/Found on: <?php echo $row['issue_date'];?><br>
      Lost/Found : <?php echo $row['lost_found'];?><br>
      Place: <?php echo $row['place'];?><br>
      Other Details: <?php echo $row['other_details'];?><br>
      <b>
        <h7 style="color:rgba(17, 110, 203,1);"> <i class="btn-info fas fa-check fa-fw"></i> <?php echo $row['issue_status'];?>
        </h7>
      </b>






      <br>
      <br>



      <?php
        }  ?>
    </div>
    <?php    }
           else
          {
           ?>
    <a href="#" onclick="closeNav()"> <i class="align-left fas fa-times fa-fw btn-danger"></i></a>
    <h6> No recent resolves </h6>
    </div>

    <!----Searched results1--->
    <?php 
}
   if(isset($_POST['lost']))
   {
   
   require("db_connect.php");
   $search=$_POST["search"];
    
   
        $sql="select * from newissue where ((item_name like '%$search%' and  '%$search%' != ' '  and issue_status='Not Resolved' ) AND lost_found='Lost')";
        
        $res=$con->query($sql);
        $count=mysqli_num_rows($res);
      	if($count >=1)
      	{
      ?>
    <h4 class=" mb-5">Search result-Lost-<?php echo $_POST["search"] ?></h4>
    <hr>

    <?php
        while($row=mysqli_fetch_assoc($res))
 {
            
 ?>
    <br>
    <center>
      <div class="modal-xl table table-bordered" style="width:1200px;height:400px;">
        <table>

          <tr>

            <td>
              <button type="info" name="found" class=" btn btn-success progress progress-bar progress-bar-stripped progress-bar-animated" style="border-radius:-50px;margin-left:-40px;
  position: absolute;
  transform: translateY(-50%);"><?php echo $row['lost_found'];?></button>
              <br>
              <div class="mb-3">
                <div class="portfolio-item mx-auto" data-bs-toggle="modal" data-bs-target="#portfolioModal<?php echo $row['item_id'];?>">
                  <div class="portfolio-item-caption d-flex align-items-center justify-content-center h-100 w-100  rounded-pill">
                    <div class="portfolio-item-caption-content text-center text-white">
                      <div class="portfolio-item-caption-content text-center text-white">
                        <div class="rounded container" style="width:400px;">
                          <img class="zoom" src="<?php echo 'assets/img/issue_img/'.$row["image"];?>" data-bs-dismiss="modal">
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>



              <div class="portfolio-modal modal fade" id="portfolioModal<?php echo $row['item_id'];?>" tabindex="-1" aria-labelledby="portfolioModal<?php echo $row['item_id'];?>" aria-hidden="true">
                <div class="modal-dialog modal-xl">
                  <div class="modal-content">

                    <div class="modal-header border-0"><button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close"></button></div>
                    <div class="modal-body text-center pb-5">
                      <div class="container">
                        <div class="row justify-content-center">
                          <div class="col-lg-8">


                            <h3><?php echo $row['item_name'];?></h3>
                            <b>
                              <h5 style="color:#dc3545;"> <i class="btn-danger fas fa-times fa-fw"></i> <?php echo $row['issue_status'];?></h5>
                            </b>
                            <hr>

                            Reporter ID: <?php  $r_id= $row['reporter_id']; echo  $row['reporter_id'];?><br>
                            Lost/Found on: <?php echo $row['issue_date'];?><br>
                            Place: <?php echo $row['place'];?><br>
                            Other Details: <?php echo $row['other_details'];?><br>
                            <hr>
                            <img class=" zooms img-fluid rounded mb-5 border-primary " src="<?php echo 'assets/img/issue_img/'.$row["image"];?>" id="lost_image" alt="..." />
                            <br>
                            <button type="submit" id="zoom_for_lost" class="btn btn-primary"><i class=" fa fa-plus" onclick="zoom_for_lost();"></i></button>
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
            <td class="m-5 row col">

              <div class=" align-items-left">

                <h3><?php echo $row['item_name'];?> </h3>
                <hr>
                Reporter ID: <?php  $r_id= $row['reporter_id']; echo  $row['reporter_id'];?><br>
                Lost/Found on: <?php echo $row['issue_date'];?><br>
                Lost/Found : <?php echo $row['lost_found'];?><br>
                Place: <?php echo $row['place'];?><br>
                Other Details: <?php echo $row['other_details'];?><br>
                <b>
                  <h7 style="color:#dc3545;"> <i class="btn-danger fas fa-times fa-fw"></i> <?php echo $row['issue_status'];?></h7>
                </b>
                <br><br>
              </div>

              <?php 
                         $mysql2="SELECT * FROM registered WHERE user_id ='$r_id' ";
                         $result2=$con->query($mysql2);
                         if($row2=mysqli_fetch_assoc($result2))
                         {    
                   ?>

              <a href="https://mail.google.com/mail/?view=cm&fs=1&to=<?php echo  $row2['email']; ?>" class="btn btn-success" style="width:300px;"> <i class="fas fa-paper-plane fa-fw"></i> &nbsp;&nbsp;Notify</a>
            </td>
          </tr>
        </table>
    </center>
    <br>
    <br>
    <br>
    <br>

    <?php
        }      
        else
       {
        ?>

    <?php	
         echo "<script>alert('Cannot notify');</script>";
         ?>

    <?php
}}
}
else
{
?>
    <header class=" text-dark text-center">
      <div class="container d-flex align-items-center flex-column">
        <img class="img-fluid rounded " src="https://i.pinimg.com/564x/a1/0b/cd/a10bcd7d2e399ac14ea6908281a2bb1a.jpg" style="width:300px;" alt="..." />
        <h4 class=" text-dark">
          <?php	
         echo "Not Result Found";
         ?>
        </h4>
        <h6>We couldn't find any item matching your search</h6>


      </div>
    </header>

    <?php

}
}

?>

    <!----Searched results1--->
    <?php 

   if(isset($_POST['found']))
   {
   
   require("db_connect.php");
   $search=$_POST["search"];
    
   
        $sql="select * from newissue where ((item_name like '%$search%' and  '%$search%' != ' '  and issue_status='Not Resolved' ) AND lost_found='Found')";
        
        $res=$con->query($sql);
        $count=mysqli_num_rows($res);
      	if($count >=1)
      	{
      ?> <h4 class=" mb-5">Search result-Found-<?php echo "$search"?></h4>
    <hr>
    <?php
        while($row=mysqli_fetch_assoc($res))
 {
            
 ?>

    <br>
    <center>
      <div class="modal-xl table table-bordered" style="width:1200px;height:400px;">
        <table>

          <tr>

            <td>
              <button type="info" name="found" class=" btn btn-success progress progress-bar progress-bar-stripped progress-bar-animated" style="border-radius:-50px;margin-left:-40px;
  position: absolute;
  transform: translateY(-50%);"><?php echo $row['lost_found'];?></button>
              <br>
              <div class="mb-3">
                <div class="portfolio-item mx-auto" data-bs-toggle="modal" data-bs-target="#portfolioModal<?php echo $row['item_id'];?>">
                  <div class="portfolio-item-caption d-flex align-items-center justify-content-center h-100 w-100  rounded-pill">
                    <div class="portfolio-item-caption-content text-center text-white">
                      <div class="portfolio-item-caption-content text-center text-white">
                        <div class="rounded container" style="width:400px;">
                          <img class="zoom" src="<?php echo 'assets/img/issue_img/'.$row["image"];?>" data-bs-dismiss="modal">
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>



              <div class="portfolio-modal modal fade" id="portfolioModal<?php echo $row['item_id'];?>" tabindex="-1" aria-labelledby="portfolioModal<?php echo $row['item_id'];?>" aria-hidden="true">
                <div class="modal-dialog modal-xl">
                  <div class="modal-content">

                    <div class="modal-header border-0"><button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close"></button></div>
                    <div class="modal-body text-center pb-5">
                      <div class="container">
                        <div class="row justify-content-center">
                          <div class="col-lg-8">


                            <h3><?php echo $row['item_name'];?></h3>
                            <b>
                              <h5 style="color:#dc3545;"> <i class="btn-danger fas fa-times fa-fw"></i> <?php echo $row['issue_status'];?></h5>
                            </b>
                            <hr>

                            Reporter ID: <?php  $r_id= $row['reporter_id']; echo  $row['reporter_id'];?><br>
                            Lost/Found on: <?php echo $row['issue_date'];?><br>
                            Place: <?php echo $row['place'];?><br>
                            Other Details: <?php echo $row['other_details'];?><br>


                            <hr>
                            <img class=" img-fluid rounded mb-5 border-primary " src="<?php echo 'assets/img/issue_img/'.$row["image"];?>" id="found_image" alt="..." />
                            <br>
                            <button type="submit" id="zoom_for_found" class="btn btn-primary"><i class=" fa fa-plus" onclick="zoom_for_found();"></i></button>
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
            <td class="m-5 row col">

              <div class=" align-items-left">

                <h3><?php echo $row['item_name'];?> </h3>
                <hr>
                Reporter ID: <?php  $r_id= $row['reporter_id']; echo  $row['reporter_id'];?><br>
                Lost/Found on: <?php echo $row['issue_date'];?><br>
                Lost/Found : <?php echo $row['lost_found'];?><br>
                Place: <?php echo $row['place'];?><br>
                Other Details: <?php echo $row['other_details'];?><br>
                <b>
                  <h7 style="color:#dc3545;"> <i class="btn-danger fas fa-times fa-fw"></i> <?php echo $row['issue_status'];?></h7>
                </b>
                <br><br>
              </div>

              <?php 
                         $mysql2="SELECT * FROM registered WHERE user_id ='$r_id' ";
                         $result2=$con->query($mysql2);
                         if($row2=mysqli_fetch_assoc($result2))
                         {    
                   ?>

              <a href="https://mail.google.com/mail/?view=cm&fs=1&to=<?php echo  $row2['email']; ?>" class="btn btn-success" style="width:300px;"><i class="fas fa-paper-plane fa-fw"></i> &nbsp;&nbsp;Notify</a>
            </td>
          </tr>
        </table>
    </center>
    <br>
    <br>
    <br>
    <br>

    <?php
        }      
        else
       {
        ?>

    <?php	
         echo "<script>alert('Cannot notify');</script>";
         ?>

    <?php
}}
}
else
{

?> <header class=" text-dark text-center">
      <div class="container d-flex align-items-center flex-column">
        <img class="img-fluid rounded " src="https://i.pinimg.com/564x/a1/0b/cd/a10bcd7d2e399ac14ea6908281a2bb1a.jpg" style="width:300px;" alt="..." />
        <h4 class=" text-dark">
          <?php	
         echo "Not Result Found";
         ?>
        </h4>
        <h6>We couldn't find any item matching your search</h6>


      </div>
    </header>

    <?php
}
}

?>




    <?php
 if(!isset($_POST['found']) and (!isset($_POST['lost'])) )
   {
     ?>
    <!---Recently uploaded--->
    <?php
  $mysql="select * from registered where email = '$emailoruid'  ";
          $res1=mysqli_query($con,$mysql);
          $row1=mysqli_fetch_assoc($res1);
          $mysql1="select * from newissue WHERE issue_status='Not Resolved'   ORDER BY uploading_time DESC  limit 15";
       
          $result=mysqli_query($con,$mysql1);
        $count1=mysqli_num_rows($result);
      	if($count1 >=1)
      	{   
     ?><h4 class=" mb-5">Recent uploads</h4>
    <hr><?php
       while($row=mysqli_fetch_assoc($result))
 {
 ?>
    <br>
    <center>
      <div class="modal-xl table table-bordered" style="width:1200px;height:400px;">
        <table>

          <tr>

            <td>
              <button type="info" name="found" class=" btn btn-success progress progress-bar progress-bar-stripped progress-bar-animated" style="border-radius:-50px;margin-left:-40px;
  position: absolute;
  transform: translateY(-50%);"><?php echo $row['lost_found'];?></button>
              <br>
              <div class="mb-3">
                <div class="portfolio-item mx-auto" data-bs-toggle="modal" data-bs-target="#portfolioModal<?php echo $row['item_id'];?>">
                  <div class="portfolio-item-caption d-flex align-items-center justify-content-center h-100 w-100  rounded-pill">
                    <div class="portfolio-item-caption-content text-center text-white">
                      <div class="portfolio-item-caption-content text-center text-white">
                        <div class="rounded container" style="width:400px;">
                          <img class="zoom" src="<?php echo 'assets/img/issue_img/'.$row["image"];?>" data-bs-dismiss="modal">
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>



              <div class="portfolio-modal modal fade" id="portfolioModal<?php echo $row['item_id'];?>" tabindex="-1" aria-labelledby="portfolioModal<?php echo $row['item_id'];?>" aria-hidden="true">
                <div class="modal-dialog modal-xl">
                  <div class="modal-content">

                    <div class="modal-header border-0"><button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close"></button></div>
                    <div class="modal-body text-center pb-5">
                      <div class="container">
                        <div class="row justify-content-center">
                          <div class="col-lg-8">


                            <h3><?php echo $row['item_name'];?></h3>
                            <b>
                              <h5 style="color:#dc3545;"> <i class="btn-danger fas fa-times fa-fw"></i> <?php echo $row['issue_status'];?></h5>
                            </b>
                            <hr>

                            Reporter ID: <?php  $r_id= $row['reporter_id']; echo  $row['reporter_id'];?><br>
                            Lost/Found on: <?php echo $row['issue_date'];?><br>
                            Place: <?php echo $row['place'];?><br>
                            Other Details: <?php echo $row['other_details'];?><br>


                            <hr>
                            <img class=" img-fluid rounded mb-5 border-primary " src="<?php echo 'assets/img/issue_img/'.$row["image"];?>" id="recent_image" alt="..." />
                            <br>
                            <button type="submit" id="zoom_for_recent" class="btn btn-primary"><i class=" fa fa-plus" onclick="zoom_for_recent();"></i></button>
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
            <td class="m-5 row col">

              <div class=" align-items-left">

                <h3><?php echo $row['item_name'];?> </h3>
                <hr>
                Reporter ID: <?php  $r_id= $row['reporter_id']; echo  $row['reporter_id'];?><br>
                Lost/Found on: <?php echo $row['issue_date'];?><br>
                Lost/Found : <?php echo $row['lost_found'];?><br>
                Place: <?php echo $row['place'];?><br>
                Other Details: <?php echo $row['other_details'];?><br>
                <b>
                  <h7 style="color:#dc3545;"> <i class="btn-danger fas fa-times fa-fw"></i> <?php echo $row['issue_status'];?></h7>
                </b>
                <br><br>
              </div>

              <?php 
                         $mysql2="SELECT * FROM registered WHERE user_id ='$r_id' ";
                         $result2=$con->query($mysql2);
                         if($row2=mysqli_fetch_assoc($result2))
                         {    
                   ?>

              <a href="https://mail.google.com/mail/?view=cm&fs=1&to=<?php echo  $row2['email']; ?>" class="btn btn-success" style="width:300px;"><i class="fas fa-paper-plane fa-fw"></i> &nbsp;&nbsp;Notify</a>
            </td>
          </tr>
        </table>
    </center>
    <br>
    <br>
    <br>
    <br>

    <?php }?>

    <br>

    <br>





  </body>
  <?php
   }
   }
   else
   {
   
  ?>
  <header class=" text-dark text-center">
    <div class="container d-flex align-items-center flex-column">
      <img class="img-fluid rounded " src="https://i.pinimg.com/564x/11/d8/06/11d806287fb9fd224be196286400dfaa.jpg" style="width:300px;" alt="..." />
      <h4 class=" text-dark">
        <?php	
         echo "Not Recent uploads";
         ?>
      </h4>
      <h6>Noone hasn't reported anything yet</h6>


    </div>
  </header>
  <?php
   }
   
  } }else
   {
   ?>

  <header class=" text-light text-center">
    <div class=" container d-flex align-items-center flex-column">
      <img class="img-fluid rounded " src="https://i.pinimg.com/564x/65/2b/1d/652b1d4c0af96bca477945270a12c169.jpg" style="width:800px;" id="lost_image" alt="..." />
      <h4 class=" text-dark">
        <?php	
         echo "Not Found or session expired😕️";
         ?>
        <br><br>
        <a href='login.php' class="btn btn-lg  btn-primary">Login
        </a>
      </h4>
    </div>
  </header>

  <?php
   $con->close();
   }
   ?>
  <script type="text/javascript">
    function zoom_for_found() {
      var GFG = document.getElementById("found_image");
      var currWidth = GFG.clientWidth;
      GFG.style.width = (currWidth + 200) + "px";
    }

    function zoom_for_recent() {
      var GFG = document.getElementById("recent_image");
      var currWidth = GFG.clientWidth;
      GFG.style.width = (currWidth + 200) + "px";
    }

    function openNav() {
      document.getElementById("mySidenav").style.width = "100%";
    }

    function closeNav() {
      document.getElementById("mySidenav").style.width = "0%";
    }

  </script>

</html>

