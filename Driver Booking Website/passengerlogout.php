<!-- Logs out passenger -->

<?php
    session_start();
    include "sdp/connection.php";

    if(isset($_POST['submit']))
    {
        echo "<script> alert('Would you like to Logout?') </script>";
        session_unset();
        session_destroy();
        echo "<script> location.href = 'login.html' </script>";
    }
?>