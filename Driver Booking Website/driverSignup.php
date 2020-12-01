<!-- This is Driver Signup form -->

<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">

    <title>Driver SignUp | GoGetWay</title>
  </head>
  <body>
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <a class="navbar-brand" href="login.html"><b><i>GoGetWay</i></b></a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item">
                    <a class="nav-link" href="login.html">Home <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="driverstatus.php">Driver Login </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="passengerLogin.php">Passenger Login </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="passengerSignup.php">Passenger Signup </a>
                </li>
                <li class="nav-item active">
                    <a class="nav-link" href="driverSignup.php">Driver Signup </a>
                </li>
            </ul>
        </div>
</nav>

<?php
    if(@$_GET['Empty']==true)
    {
      ?>
      <div class="alert alert-danger alert-dismissible fade show" role="alert">
        <strong>Error!</strong> <?php echo $_GET['Empty'];?>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <?php
    }
    if(@$_GET['Unknown']==true)
    {
      ?>
      <div class="alert alert-danger alert-dismissible fade show" role="alert">
        <strong>Error!</strong> <?php echo $_GET['Unknown'];?>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <?php
    }
?>

    <div class='container bg-dark text-light my-3'>
        <h3 style="padding-top: 5px;"> SignUp Form </h3>
        <p style="text-align: right; color: #a0a0a0; padding-bottom: 5px;"> This feature is for drivers... </p>
    </div>
    <div class='container' style="width:50vm; background-color:#e5e5e5; height: 10vm;">
        <form method="POST" action="signUpConfirm.php" enctype="multipart/form-data" style="padding:10px;">
            <div class="form-group my-4" style='width:100%'>
                <label for="fname">First Name</label>
                <input type="text" class="form-control" id="fname" name="fname" autocomplete="off" required>
            </div>

            <div class="form-group my-4" style='width:100%'>
                <label for="lname">Last Name</label>
                <input type="text" class="form-control" id="lname" name="lname" autocomplete="off" required>
            </div>

            <div class="form-group my-4" style='width:100%'>
                <label for="Mob">Mobile Number</label>
                <input type="number" class="form-control" id="Mob" name="Mob" autocomplete="off" required>
            </div>
            
            <div class="form-group my-4" style='width:100%'>
                <label for="age">Age</label>
                <input type="number" class="form-control" id="age" name="age" autocomplete="off" required>
            </div>

            <div class="form-group my-4" style='width:100%'>
            <label for="gender">Gender</label>
                <div class="input-group">
                    <div class="input-group-prepend">
                        <div class="input-group-text" style="width: 50%;">
                        <input type="radio" aria-label="Radio button for following text input" id="gender" name="gender" value="Male"> 
                        &nbsp;&nbsp; <div style="border-left: 2px solid #B8B8B8; height: 25px;"></div> &nbsp;&nbsp; Male
                        
                        </div>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                        <div class="input-group-text" style="width: 50%;">
                        <input type="radio" aria-label="Radio button for following text input" id="gender" name="gender" value="Female"> 
                        &nbsp;&nbsp; <div style="border-left: 2px solid #B8B8B8; height: 25px;"></div> &nbsp;&nbsp; Female
                        </div>
                    </div>
                </div><br>

            </div>

            <div class="form-group my-4" style='width:100%'>
                <label for="email">Your Location</label>
                <?php include "cities/index.html";?>
                <small id="emailHelp" class="form-text text-muted"></small>
            </div><br>

            <div class="form-group my-4" style='width:100%'>
                <label for="email">Identity</label>
                <input type="email" class="form-control" id="email" name="email" autocomplete="off" placeholder="email id" required>
                <small id="emailHelp" class="form-text text-muted">*working email id</small>
            </div>

            <div class="form-group my-5" style='width:100%'>
                <label for="password">Enrollment Basis</label>
                <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <div class="input-group-text">
                    <input type="checkbox" aria-label="Checkbox for following text input" name="basis[]" value="Temporary">
                    &nbsp;&nbsp; <div style="border-left: 2px solid #B8B8B8; height: 25px;"></div> &nbsp;&nbsp; Temporary Driver Driving For Tours
                    </div>
                </div>
                </div>

                <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <div class="input-group-text">
                    <input type="checkbox" aria-label="Checkbox for following text input" name="basis[]" value="Permanent"> 
                    &nbsp;&nbsp; <div style="border-left: 2px solid #B8B8B8; height: 25px;"></div> &nbsp;&nbsp; Permanent Driver Driving For Family
                    </div>
                </div>
                </div>

                <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <div class="input-group-text">
                    <input type="checkbox" aria-label="Checkbox for following text input" name="basis[]" value="Transport"> 
                    &nbsp;&nbsp; <div style="border-left: 2px solid #B8B8B8; height: 25px;"></div> &nbsp;&nbsp; Transportation Of Goods
                    </div>
                </div>
                </div>
            </div>

            <div class="form-group my-5" style='width:100%'>
                <label for="password">Licensed Vehicle Type</label>
                <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <div class="input-group-text">
                    <input type="checkbox" aria-label="Checkbox for following text input" name="type[]" value="2_Wheels">
                    &nbsp;&nbsp; <div style="border-left: 2px solid #B8B8B8; height: 25px;"></div> &nbsp;&nbsp; 2 Wheelers
                    </div>
                </div>
                </div>

                <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <div class="input-group-text">
                    <input type="checkbox" aria-label="Checkbox for following text input" name="type[]" value="3_Wheels"> 
                    &nbsp;&nbsp; <div style="border-left: 2px solid #B8B8B8; height: 25px;"></div> &nbsp;&nbsp; 3 Wheelers
                    </div>
                </div>
                </div>

                <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <div class="input-group-text">
                    <input type="checkbox" aria-label="Checkbox for following text input" name="type[]" value="4_Wheels">
                    &nbsp;&nbsp; <div style="border-left: 2px solid #B8B8B8; height: 25px;"></div> &nbsp;&nbsp; 4 Wheelers
                    </div>
                </div>
                </div>
            </div>

            <div class="form-group my-4" style='width:100%'>
                <label for="photo">Profile Photo</label>
                <input type="file" class="form-control" name="photo" required>
                <small id="emailHelp" class="form-text text-muted">*only jpg/png</small>
            </div>

            <div class="form-group my-4" style='width:100%'>
                <label for="adhar">Adhar Card</label>
                <input type="file" class="form-control" name="adhar" required>
                <small id="emailHelp" class="form-text text-muted">*only jpg/png</small>
            </div>

            <div class="form-group my-4" style='width:100%'>
                <label for="license">License</label>
                <input type="file" class="form-control" name="license" required>
                <small id="emailHelp" class="form-text text-muted">*only jpg/png</small>
            </div>

            <button type="submit" class="btn btn-primary my-2" name="submit">Enroll Me</button>
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