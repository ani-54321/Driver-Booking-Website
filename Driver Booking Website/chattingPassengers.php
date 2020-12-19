<?php
    session_start();
    include "sdp/connection.php";
    //apiKey = AIzaSyDCa1XHlhbunyZnXbZk3UTkk5IfbD2_644
?>

<!doctype html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css"
    integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">

  <title>Q & A | GoGetWay</title>

  <script>
    function func(val) {
      console.log(val);
      document.getElementById('que').style.display = 'none';
      document.getElementById('submit').value = val;
      document.getElementById('textbox').placeholder = "For question : " + val;
      // console.log(document.getElementById('submit').value);
      document.getElementById('answer').style.display = 'block';
    }

    function func2(){
      document.getElementById('answer').style.display = 'none';
      document.getElementById('que').style.display = 'block';
    }
  </script>

  <style>
    html{
      scroll-behavior: smooth;
    }

    #que{
      display: none;
    }

    #answer{
      display: none;
    }

    .ansbox{
      margin: auto;
      font-stretch: expanded;
      line-height: normal;
      padding: 1% 5% 10% 5%;
      text-align: justify;
      border-radius: 10px 10px;
      background-color:#f0f0f0;
    }

  </style>
</head>

<body>
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <a class="navbar-brand" href="login.html"><i>Go</i><b>Get</b><i style="color: #f0f0f0;">Way</i></a>
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
        <li class="nav-item">
          <a class="nav-link" href="makeTrip.php"> Book Driver </a>
        </li>
        <li class="nav-item active">
          <a class="nav-link" href="chattingPassengers.php"> Q & A </a>
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
        if(@$_GET['Success']==true){
            ?>
  <div class="alert alert-success alert-dismissible fade show" role="alert">
    <strong>Thanking You!</strong><?php echo $_GET['Success'];?>
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
      <span aria-hidden="true">&times;</span>
    </button>
  </div>
  <?php
        }
    ?>

  <?php

  function answerSeparator($str){
    $sentence = "";
    $arr = [];

    for($i=0; $i<strlen($str); $i++)
    {
        if($str[$i]=="|")
        {
            array_push($arr, $sentence);
            $sentence = "";
            continue;
        }
        else{
            $sentence .= $str[$i];
        }
    }

    return $arr;
  }

  $query = "SELECT `QueNo`, `QuestionSender`, `Question`, `Answer`, `DatePostedQ`, `AnswerSender` FROM `q&a`";
  $runQ = mysqli_query($stat, $query);
  $counterQ = 0;
  $counterA = 0;
  $answer = [];
  $nameAOld = [];

  while($result = mysqli_fetch_assoc($runQ))
  {
    $counterA = 0;
    $qnum = $result['QueNo'];
    $name = $result['QuestionSender'];
    $question = $result['Question'];
    $ans = $result['Answer'];
    $answer = answerSeparator($ans);
    $date = $result['DatePostedQ'];
    $temp = $result['AnswerSender'];
    $nameAns = answerSeparator($temp);
    $counterQ+=1;
    ?>
  <div class="container my-5" style="padding: 2%;">
    <div class="card">
      <div class="card-header text-center">
        <?php echo "<b>Questioned by : </b>" . $name; ?>
      </div>
      <div class="card-body">
        <h5 class="card-title text-center"><?php echo "<b>que $counterQ. </b>". $question; ?></h5>
        <p class="card-text"><?php
            if(count($answer)>0)
            {
              for($i=0; $i<count($answer); $i++)
              {
                $counterA+=1;
                echo "<b>". $counterA. ") " . " Answered by ".$nameAns[$i] . " </b>";
                echo "<p  class='ansbox'>" . ucfirst($answer[$i]) . "</p><br>";
              }
            }
            else
            {
              echo "Enter your opinion here...";
            }
            if($name == $_SESSION['name'])
            {
            }
            else{
          ?></p>
        <a href="#answer"><button class="btn btn-primary num" onclick="func(this.value)" value="<?php echo $counterQ; ?>">Your
          Answer</button></a>
            <?php
            } 
            ?>
      </div>
      <div class="card-footer text-muted text-right">
        <?php echo "<b>Question Posted On : </b>" . $date; ?>
      </div>
    </div>
  </div>
  <?php
  }

?>
  <div class="form-group" id="answer" style="z-index:+100; width:80%; margin: auto;">
    <form method="post" action="addQandA.php">
      <label for="textbox">Write your ANSWER</label>
      <textarea class="form-control" name="answer" id="textbox" rows="3" placeholder=""
        style="box-shadow: 5px 5px grey;"></textarea>
      <button type="submit" name="addAns" class="btn btn-primary" style="margin: 2%;" id="submit" value="">Submit</button>
    </form>
  </div>
  <div class="container">
    <a href="#que"><button class="btn btn-info float-right" onclick="func2()" style="border-radius: 100px; height: 85px; width: 85px;"><b>Ask Question </b></button></a>
  </div><br><br><br><br><br><br>

  <div class="container" id="que" style="display: none;">
    <div class="form-group">
    <form method="post" action="addQandA.php">
      <input type="text" class="form-control" id="question" name="question" aria-describedby="emailHelp" placeholder="Ask question here..." autocomplete="off">
      <small id="emailHelp" class="form-text text-muted">People who know will react on your questions.</small>
      <button type="submit" name="queBut" class="btn btn-primary" style="margin: 2%;" id="submit">Submit</button>
    </form>
  </div>
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
            <a href="https://www.instagram.com/" style="text-decoration: none;"> <img src="insta2.png" height="50px" width="50px" style="z-index: inherit; box-shadow: 2px 5px black;"> </a> &nbsp;&nbsp;&nbsp;&nbsp;
            <a href="https://www.facebook.com/login/" style="text-decoration: none;"> <img src="facebook.png" style="z-index: inherit; box-shadow: 2px 5px black;" height="50px" width="50px"> </a> &nbsp;&nbsp;&nbsp;&nbsp;
            <a href="https://www.youtube.com/" style="text-decoration: none;"> <img src="youtube.png" style="z-index: inherit; box-shadow: 2px 5px black;" height="50px" width="50px"> </a>&nbsp;&nbsp;&nbsp;&nbsp;
            <a href="https://www.linkedin.com/" style="text-decoration: none;"> <img src="linkedin.png" style="z-index: inherit; box-shadow: 2px 5px black;" height="50px" width="50px"> </a></p>
            <br><br><br><br>
            <h5 style="color: #B8B8B8; text-align: right; padding-right: 10px;">creator - Anish Shaha</h5>
        </div>
    </footer>
  <!-- Optional JavaScript; choose one of the two! -->

  <!-- Option 1: jQuery and Bootstrap Bundle (includes Popper) -->
  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"
    integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj"
    crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx"
    crossorigin="anonymous"></script>

  <!-- Option 2: jQuery, Popper.js, and Bootstrap JS
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.min.js" integrity="sha384-w1Q4orYjBQndcko6MimVbzY0tgp4pWB4lZ7lr30WKz0vr/aWKhXdBNmNb5D92v7s" crossorigin="anonymous"></script>
    -->
</body>

</html>