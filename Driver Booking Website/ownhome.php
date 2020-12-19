<?php 
session_start();
include "sdp/connection.php";
?>
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">

    <title>My Status | GoGetWay</title>

    <style>
      .table tbody tr:nth-of-type(even) {
        background-color: #f3f3f3;
      }

    </style>
  </head>
  <body>
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <a class="navbar-brand" href="login.html"><b><i>GoGetWay</i></b></a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
      aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav mr-auto" style='left:10px;'>
        <li class="nav-item active">
          <a class="nav-link" href="ownhome.php">Your Home <span class="sr-only">(current)</span></a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="chartsfordrivers.php"> Statistics </a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="changeinfo.php"> Update info </a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="chattingDrivers.php"> Q & A </a>
        </li>
      </ul>
        <form class="form-inline my-2 my-lg-0" method="POST" action="passengerlogout.php">
          <button class="btn btn-outline-success my-2 my-sm-0" type="submit" name="submit"> Logout </button>
        </form>
        &nbsp;&nbsp;&nbsp;&nbsp;
        <form class="form-inline my-2 my-lg-0" method="POST" action="logout.php">
          <button class="btn btn-outline-light my-2 my-sm-0" type="submit" name="engage" value="ownhome.php"> Engage </button>
        &nbsp;&nbsp;&nbsp;&nbsp;
          <button class="btn btn-outline-light my-2 my-sm-0" type="submit" name="unengage" value="ownhome.php"> Unengage </button>
        </form>
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        <div style="width: 35px; height: 35px; border-radius: 18px; background-color: #ff9900; text-align: center;">
          <b><p style="color: white; padding-top:3px;"><?php echo strtoupper($_SESSION['name'][0]);?></p></b>
        </div>
    </div>
  </nav>

  <?php
    if(@$_GET['Done']==true)
    {
      ?>
      <div class="alert alert-success alert-dismissible fade show" role="alert">
        <strong>Success!</strong> <?php echo $_GET['Done'];?>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <?php
    }
  ?>

  <div class="container my-5">
        <h5 style="text-align: center;"> Welcome Back <?php echo $_SESSION['name']?>! <br><br> Your Fieldsets Are <?php echo $_SESSION['fields'];?></h5>
  </div>
  <div style="overflow:auto;">
  <table class="table">
      <thead class="thead-dark">
        <tr>
          <th scope="col">Trip Count</th>
          <th scope="col">Passenger Name</th>
          <th scope="col">Booking ID</th>
          <th scope="col">Place of Journey</th>
          <th scope="col">Type</th>
          <th scope="col">Start Date</th>
          <th scope="col">End Date</th>
          <th scope="col">Ammount Recieved</th>
        </tr>
      </thead>
      <tbody>

    <?php
      $query = "SELECT `Name`, `BookingID`, `Driver_Contact`, `Place`, `Driver`, `Start_Journey`, `End_Journey`, `Payment` FROM passenger_info WHERE Driver_Contact='".$_SESSION['mobile']."'";
      $run = mysqli_query($stat, $query);
      $sr = 0;

      while($passenger = mysqli_fetch_assoc($run))
      {
        $sr+=1;
        ?>

          <tr>
            <th scope="row"><?php echo $sr;?></th>
            <td><?php echo $passenger['Name'];?></td>
            <td><?php echo $passenger['BookingID'];?></td>
            <td><?php echo $passenger['Place'];?></td>
            <td><?php echo $passenger['Driver'];?></td>
            <td><?php echo $passenger['Start_Journey'];?></td>
            <td><?php echo $passenger['End_Journey'];?></td>
            <td><?php echo $passenger['Payment'];?></td>
          </tr>

        <?php
      }
    ?>

  </tbody>
</table>
    </div>
  
    <footer>
        <div style="padding-top: 50px; margin-right: 15px;">
            <div class="row bg-dark">
                <div class="col-sm-6">
                    <div class="bg-dark text-light">
                    <div class="card-body" style="text-align: center;">
                        <h5 class="card-title">For Passengers</h5>
                        <p class="card-text">Don't want to signup??<br>Don't like black-white theme??</p>
                        <p> Visit this page : <a href="sdp/passenger_policy.html">Passenger Page</a> </p>
                    </div>
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="bg-dark text-light">
                    <div class="card-body" style="text-align: center;">
                        <h5 class="card-title" style="text-align: center;">For Drivers</h5>
                        <p class="card-text">Want to use colorfull theme??<br>Don't want login mechanism??</p>
                        <p > Visit this page : <a href="sdp/driver_policy.html"> Driver Page </a> </p>
                    </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="bg-dark text-light" style="height: 400px;">
            <h3 style="text-align: center; padding-top:10px;"> About Us </h3><br><br>
            <p style="text-align: center;"> Visit Below Pages <br><br><br>
            <a href="https://www.instagram.com/" style="text-decoration: none;"> <img src="insta2.png" height="50px" width="50px" style="box-shadow: 2px 5px black;"> </a> &nbsp;&nbsp;&nbsp;&nbsp;
            <a href="https://www.facebook.com/login/" style="text-decoration: none;"> <img src="facebook.png" style="box-shadow: 2px 5px black;" height="50px" width="50px"> </a> &nbsp;&nbsp;&nbsp;&nbsp;
            <a href="https://www.youtube.com/" style="text-decoration: none;"> <img src="youtube.png" style="box-shadow: 2px 5px black;" height="50px" width="50px"> </a>&nbsp;&nbsp;&nbsp;&nbsp;
            <a href="https://www.linkedin.com/" style="text-decoration: none;"> <img src="linkedin.png" style="box-shadow: 2px 5px black;" height="50px" width="50px"> </a></p>
            <br><br><br><br>
            <h5 style="color: #B8B8B8; text-align: right; padding-right: 10px;">creator - Anish Shaha</h5>
        </div>
    </footer>
  

    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: jQuery and Bootstrap Bundle (includes Popper) -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>

    <!-- Option 2: jQuery, Popper.js, and Bootstrap JS
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.min.js" integrity="sha384-w1Q4orYjBQndcko6MimVbzY0tgp4pWB4lZ7lr30WKz0vr/aWKhXdBNmNb5D92v7s" crossorigin="anonymous"></script>
    -->
  </body>
</html>