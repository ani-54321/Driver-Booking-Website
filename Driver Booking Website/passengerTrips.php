<!-- This page will have a table for signed in passengers with some fields listed in the head tags of table -->

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
          <a class="nav-link" href="passengerTrips.php">Your Home <span class="sr-only">(current)</span></a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="chartsforpassenger.php"> Statistics </a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="makeTrip.php"> Book Driver </a>
        </li>
      </ul>
        <form class="form-inline my-2 my-lg-0" method="POST" action="passengerlogout.php">
          <button class="btn btn-outline-success my-2 my-sm-0" type="submit" name="submit"> Logout </button>
        </form>
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        <div style="width: 35px; height: 35px; border-radius: 18px; background-color: #7300e6; text-align: center;">
          <b><p style="color: white; padding-top:3px;"><?php echo strtoupper($_SESSION['name'][0]);?></p></b>
        </div>
    </div>
  </nav>

  <?php
    if(@$_GET['Success']==true)
    {
      ?>
      <div class="alert alert-success alert-dismissible fade show" role="alert">
        <strong>Congratulations <?php echo $_SESSION['name'];?>!</strong> <?php echo $_GET['Success'];?>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <?php
    }
    if(@$_GET['Success2']==true)
    {
      ?>
      <div class="alert alert-success alert-dismissible fade show" role="alert">
        <strong><?php echo $_SESSION['name'];?>!</strong> <?php echo $_GET['Success2'];?>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <?php
    }
  ?>

  <div class="container my-2">
        <h5 style="text-align: center;" class="my-5"> Welcome Back <?php echo strtoupper($_SESSION['name']) ?>!</h5>
  </div>
  <form method="POST" action="cancelbooking.php" style="padding:10px; overflow: auto;">
  <table class="table">
  <!-- Below is the field for it -->
      <thead class="thead-dark">
        <tr>
          <th scope="col">Trip Count</th> 
          <th scope="col">Booking ID</th>
          <th scope="col">Driver Name</th>
          <th scope="col">Place of Journey</th>
          <th scope="col">Start Date</th>
          <th scope="col">End Date</th>
          <th scope="col">Booking Cancelation</th>
        </tr>
      </thead>
      <tbody>

    <?php
      $query = "SELECT `BookingID`, `OrderIDs`, `Driver_Alloted`, `Place`, `Start_Journey`, `End_Journey` FROM passenger_info WHERE `Pemail_ID`='".$_SESSION['mobile']."'";
      $run = mysqli_query($stat, $query);
      $sr = 0;
      # In here the values for particular column will be inserted
      while($passenger = mysqli_fetch_assoc($run))
      {
        $sr+=1;
        if(!empty($passenger['Driver_Alloted']))
        {
        ?>

          <tr>
            <th scope="row"><?php echo $sr;?></th>
            <td><?php echo $passenger['BookingID'];?></td>
            <td><?php echo $passenger['Driver_Alloted'];?></td>
            <td><?php echo $passenger['Place'];?></td>
            <td><?php echo $passenger['Start_Journey'];?></td>
            <td><?php echo $passenger['End_Journey'];?></td>
            <?php
            if($passenger['Start_Journey'] > date('Y-m-d'))
            {
              ?>
              <td><button class="btn btn-outline-primary my-2 my-sm-0" type="submit" name="cancel" value="<?php echo $passenger['OrderIDs'];?>"> Cancel Booking </button></td>
              <?php
            }
            ?>
          </tr>

        <?php
        }
      }
    ?>
  </tbody>
</table>
</form>

<h6 style="text-align: center;"> <i> Eagerly waiting for your next trips </i> </h6>
  
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
            <p style="text-align: center;"> Visit Our Instagram Page : <a href="https://www.instagram.com/"> Instagram Page </a></p>
            <p style="text-align: center;"> Visit Our Facebook Page : <a href="https://www.facebook.com/login/"> Facebook Page </a></p>
            <p style="padding-bottom: 20px; text-align: center;"> Visit Our YouTube Chanel : <a href="https://www.youtube.com/"> YouTube Chanel </a></p>
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