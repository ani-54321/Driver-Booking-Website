<!-- This is backend for logout, engaging and unengaging -->

<?php
    session_start();
    include "sdp/connection.php";

    if(isset($_POST['engage'])){
        $queryT = "UPDATE driver_info SET `Working_Status`='Engaged' WHERE `Mobile_No`='".$_SESSION['mobile']."'";
        $queryP = "UPDATE permanent_info SET `Working_Status`='Engaged'  WHERE `Mobile_No`='".$_SESSION['mobile']."'";
        $queryTr = "UPDATE transport_info SET `Working_Status`='Engaged'  WHERE `Mobile_No`='".$_SESSION['mobile']."'";
    
        $runT = mysqli_query($stat, $queryT);
        $runP = mysqli_query($stat, $queryP);
        $runTr = mysqli_query($stat, $queryTr);
    
        header("location:".$_POST['engage']."?Done=You will not recieve any notifications from now onwards");
      }
    
    else if(isset($_POST['unengage'])){
        $queryT2 = "UPDATE driver_info SET `Working_Status`='Unengaged'  WHERE `Mobile_No`='".$_SESSION['mobile']."'";
        $queryP2 = "UPDATE permanent_info SET `Working_Status`='Unengaged'  WHERE `Mobile_No`='".$_SESSION['mobile']."'";
        $queryTr2 = "UPDATE transport_info SET `Working_Status`='Unengaged'  WHERE `Mobile_No`='".$_SESSION['mobile']."'";
    
        $runT2 = mysqli_query($stat, $queryT2);
        $runP2 = mysqli_query($stat, $queryP2);
        $runTr2 = mysqli_query($stat, $queryTr2);

        header("location:".$_POST['unengage']."?Done=You will get notifications regarding drives");
      }

    
    else{
        echo "not set";
    }
?>