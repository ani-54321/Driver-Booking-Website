<?php
    session_start();
    include "sdp/connection.php";
    //apiKey = AIzaSyDCa1XHlhbunyZnXbZk3UTkk5IfbD2_644

    if(isset($_POST['submit'])){

        $but = (int)$_POST['submit'];

        $ansNow = "";
        $pass = "";
    
        $q3 = "SELECT `AnswerSender`, `Answer` FROM `q&a` WHERE QueNo='$but'";
        $run3 = mysqli_query($stat, $q3);
    
        while($res3 = mysqli_fetch_assoc($run3)){
          $ansNow = $res3['Answer'];
          $pass = $res3['AnswerSender'];
        }

        if($pass=="No One Yet|")
        {
          $ansNow = $_POST['answer'] . "|";
          $pass = $_SESSION['name'] . "|";

          $query2 = "UPDATE `q&a` SET `AnswerSender`='$pass', `Answer`='$ansNow' WHERE QueNo='$but'";
          mysqli_query($stat, $query2);

          echo "name";
        }

        else{
          $ansNow .= $_POST['answer'] . "|";
          $pass .= $_SESSION['name'] . "|";

          // echo "$ansNow, $pass";
    
          $query2 = "UPDATE `q&a` SET `AnswerSender`='$pass', `Answer`='$ansNow' WHERE QueNo='$but'";
          mysqli_query($stat, $query2);
        }

        header("location:chattingDrivers.php?Success= Your answer is successfully sent...");
      }
      else if(isset($_POST['queBut'])){

        $que = $_POST['question'];
        $nameQ = $_SESSION['name'];

        date_default_timezone_set('Asia/Kolkata');
        $date = date("Y-m-d H:i:s");

        $q4 = "INSERT INTO `q&a` (`QuestionSender`, `Question`, `DatePostedQ`) VALUES ('$nameQ', '$que', '$date')";
        mysqli_query($stat, $q4);

        header("location:chattingDrivers.php?Success= You will get response soon...");
      }
?>