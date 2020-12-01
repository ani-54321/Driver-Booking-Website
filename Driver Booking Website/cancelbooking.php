<!-- Cancels booking on passenger's request -->

<?php
    include "sdp/connection.php";
    $cancel = $_POST['cancel'];
    $query = "DELETE FROM `passenger_info` WHERE `OrderIDs`='$cancel'";
    $type = "SELECT `Driver`, `Driver_Contact` FROM passenger_info WHERE `OrderIDs`='$cancel'";
    $run = mysqli_query($stat, $type);
    $val = mysqli_fetch_assoc($run);
    $mobile = $val['Driver_Contact'];
    $dtype = $val['Driver'];

    if(isset($cancel))
    {
        mysqli_query($stat, $query);
        if($dtype=='temporary')
        {
            $ifq = "UPDATE driver_info SET Trips=Trips-1 WHERE `Mobile_No`='$mobile'";
            mysqli_query($stat, $ifq);
        }
        else if($dtype=='permanent')
        {
            $ifq = "UPDATE permanent_info SET Trips=Trips-1 WHERE `Mobile_No`='$mobile'";
            mysqli_query($stat, $ifq);
        }
        else if($dtype=='transport')
        {
            $ifq = "UPDATE transport_info SET Trips=Trips-1 WHERE `Mobile_No`='$mobile'";
            mysqli_query($stat, $ifq);
        }
        header("location:passengerTrips.php?Success2=You Have Successfully Canceled Booking");
    }
?>