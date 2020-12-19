<?php
    session_start();
    include "sdp/connection.php";
    $username = $_POST['mobile'];
    $password = $_POST['password'];
    $fetched1 = NULL;
    $fetched2 = NULL;
    $fetched3 = NULL;

    $passengers = array();
    $query1 = "SELECT * FROM `logedinpassengers` WHERE `Username`='$username' AND `Password`='$password'";
    $run1 = mysqli_query($stat, $query1);
    $fetched1 = mysqli_fetch_array($run1);

    if(isset($fetched1))
    {
        $name = $fetched1['Username'];
        $email = $fetched1['Email'];
        $phone = $fetched1['Mobile'];
    }
    else
    {
        header("location:passengerLogin.php?Empty= You have NOT enrolled yet...");
    }

    $_SESSION['name'] = $name;
    $_SESSION['email'] = $email;
    $_SESSION['mobile'] = $phone;

    echo "<script> location.href = 'passengerTrips.php'</script>";
?>