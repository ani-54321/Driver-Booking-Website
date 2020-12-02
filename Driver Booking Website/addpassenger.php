<!-- Confirming booking if all information is correct -->
<?php
    include "sdp/connection.php";
    $user = $_POST['uname'];
    $password = $_POST['password'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];

    if(strlen($password)==0 or strlen($user)==0 or strlen($email)==0)
    {
        header("location:passengerSignup.php?Empty= Please fill all the information needed...");
    }

    else if(strlen($password)<8)
    {
        header("location:passengerSignup.php?Empty= Password should be greater than or equal to 8 characters...");
    }

    else
    {
        $query = "INSERT INTO `logedinpassengers` (`Username`, `Email`, `Password`, `Mobile`) VALUES ('$user', '$email', '$password', '$phone')";
        $run = mysqli_query($stat, $query);
        header("location:passengerLogin.php?Success= You Have Successfully Registered!!");
    }

?>
