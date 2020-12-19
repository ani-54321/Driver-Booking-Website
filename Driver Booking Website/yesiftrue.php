<?php
    session_start();
    include "sdp/connection.php";
    $username = $_POST['email'];
    $password = $_POST['password'];
    $fetched1 = NULL;
    $fetched2 = NULL;
    $fetched3 = NULL;

    $drivers = array();
    $inas = "";
    $query1 = "SELECT * FROM driver_info WHERE Email_ID='$username' AND Driver_ID='$password'";
    $run1 = mysqli_query($stat, $query1);
    $fetched1 = mysqli_fetch_array($run1);

    $query2 = "SELECT * FROM permanent_info WHERE Email_ID='$username' AND Driver_ID='$password'";
    $run2 = mysqli_query($stat, $query2);
    $fetched2 = mysqli_fetch_array($run2);

    $query3 = "SELECT * FROM transport_info WHERE Email_ID='$username' AND Driver_ID='$password'";
    $run3 = mysqli_query($stat, $query3);
    $fetched3 = mysqli_fetch_array($run3);

    if(isset($fetched1))
    {
        $inas .= "Temporary Driver";
        $name = $fetched1['Driver_Name'];
        $phone = $fetched1['Mobile_No'];
    }
    if(isset($fetched2))
    {
        if(strlen($inas)>0)
        {
            $inas .= ", ";
        }
        $inas .= "Permanent Driver";
        $name = $fetched2['Driver_Name'];
        $phone = $fetched1['Mobile_No'];
    }
    if(isset($fetched3))
    {
        if(strlen($inas)>0)
        {
            $inas .= ", ";
        }
        $inas .= "Transport Driver";
        $name = $fetched3['Driver_Name'];
        $phone = $fetched1['Mobile_No'];
    }
    else if(strlen($inas)==0 or strlen($username)==0 or strlen($password)==0)
    {
        header("location:driverstatus.php?Empty=You have not enrolled yet...");
    }

    $_SESSION['name'] = $name;
    $_SESSION['mobile'] = $phone;
    $_SESSION['email'] = $username;
    $_SESSION['password'] = $password;
    $_SESSION['fields'] = $inas;

    echo "<script> location.href = 'ownhome.php'</script>";
?>