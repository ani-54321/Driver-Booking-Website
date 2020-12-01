<!-- This page is containing form for booking driver -->

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

    <title>Book Driver | GoGetWay</title>
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
        <li class="nav-item">
          <a class="nav-link" href="passengerTrips.php">Your Home <span class="sr-only">(current)</span></a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="chartsforpassenger.php"> Statistics </a>
        </li>
        <li class="nav-item active">
          <a class="nav-link" href="makeTrip.php"> Book Driver </a>
        </li>
        <!-- <li class="nav-item active">
          <a class="nav-link" href="chattingPassengers.php"> Chat </a>
        </li> -->
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

  <div class='container bg-dark text-light my-3'>
    <h3 style="padding-top: 5px;"> Driver Booking Form </h3>
    <p style="text-align: right; color: #a0a0a0; padding-bottom: 5px;"></p>
  </div>
  <div class='container' style="width:50vm; background-color:#e5e5e5; height: 10vm;">
    <form method="POST" action="wantdriver.php" style="padding:10px;">
      <div class="form-group my-4" style='width:100%'>
        <label for="fname">First Name</label>
        <input type="text" class="form-control" id="fname" name='f_name' autocomplete="off" placeholder="eg. Maddie" required>
        <small id="emailHelp" class="form-text text-muted"></small>
      </div>
      <div class="form-group my-4" style='width:100%'>
        <label for="lname">Last Name</label>
        <input type="text" class="form-control" id="lname" name="l_name" autocomplete="off" placeholder="eg. Wolpheart" required>
        <small id="emailHelp" class="form-text text-muted">  </small>
      </div>
      
      <div class="form-group my-4" style='width:100%'>
        <label for="email">State for Travel</label>
        <?php include "cities/index.html";?>
        <small id="emailHelp" class="form-text text-muted"></small>
      </div><br>

      <div class="form-group my-5">
        <label for="password"> Purpose for Tour </label><br>

      <div class="input-group">
          <div class="input-group-prepend">
            <div class="input-group-text">
              <input type="radio" aria-label="Radio button for following text input" id="travelFor" name="driver_type" value="temporary"> 
              &nbsp;&nbsp; <div style="border-left: 2px solid #B8B8B8; height: 25px;"></div> &nbsp;&nbsp; Driver/Rider For A Tour
            </div>
          </div>
      </div><br>

      <div class="input-group">
          <div class="input-group-prepend">
            <div class="input-group-text">
            <input type="radio" aria-label="Radio button for following text input" id="travelFor" name="driver_type" value="permanent"> 
              &nbsp;&nbsp; <div style="border-left: 2px solid #B8B8B8; height: 25px;"></div> &nbsp;&nbsp; Permanent Driver/Rider For Your Family
            </div>
          </div>
      </div><br>

      <div class="input-group">
          <div class="input-group-prepend">
            <div class="input-group-text">
            <input type="radio" aria-label="Radio button for following text input" id="travelFor" name="driver_type" value="transport"> 
              &nbsp;&nbsp; <div style="border-left: 2px solid #B8B8B8; height: 25px;"></div> &nbsp;&nbsp; For Goods Transportation
            </div>
          </div>
      </div>
    </div><br>

      <div class="form-group my-4" style='width:100%'>
        <label for="sdate">Start Date of Journey</label>
        <input type="date" class="form-control" id="sdate" name="start_date" autocomplete="off" required>
        <small id="emailHelp" class="form-text text-muted">*in case of permanent driver you can specify any date for start</small>
      </div>

      <div class="form-group my-4" style='width:100%'>
        <label for="edate">End Date of Journey</label>
        <input type="date" class="form-control" id="edate" name="end_date" autocomplete="off" required>
        <small id="emailHelp" class="form-text text-muted">*in case of permanent driver you can specify 2 years atleast after start date</small>
      </div><br>

      <div class="form-group my-5" style='width:100%'>
        <label for="password"> Vehicle Type </label><br>

        <div class="input-group mb-3">
          <div class="input-group-prepend">
            <div class="input-group-text">
              <input type="radio" aria-label="Checkbox for following text input" name="vehicle_type" value="2_Wheels">
              &nbsp;&nbsp; <div style="border-left: 2px solid #B8B8B8; height: 25px;"></div> &nbsp;&nbsp; 2 wheeler
            </div>
          </div>
        </div>

        <div class="input-group mb-3">
          <div class="input-group-prepend">
            <div class="input-group-text">
              <input type="radio" aria-label="Checkbox for following text input" name="vehicle_type" value="3_Wheels">
              &nbsp;&nbsp; <div style="border-left: 2px solid #B8B8B8; height: 25px;"></div> &nbsp;&nbsp; 3 wheeler
            </div>
          </div>
        </div>

        <div class="input-group mb-3">
          <div class="input-group-prepend">
            <div class="input-group-text">
              <input type="radio" aria-label="Checkbox for following text input" name="vehicle_type" value="4_Wheels">
              &nbsp;&nbsp; <div style="border-left: 2px solid #B8B8B8; height: 25px;"></div> &nbsp;&nbsp; 4 wheeler
            </div>
          </div>
        </div>
      </div><br>

      <div class="form-group my-4" style='width:100%'>
        <label for="edate">Vehicle Name</label>
        <input type="text" class="form-control" id="vehicle" name="vehicle_name" autocomplete="off">
        <small id="emailHelp" class="form-text text-muted"> *if known </small>
      </div><br>

      <br><br>
      <button type="submit" class="btn btn-primary my-2" name="submit"> Get Driver </button>
    </form>
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
