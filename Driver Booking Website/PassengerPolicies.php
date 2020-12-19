<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">

    <title>Passengers | GoGetWay</title>
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <a class="navbar-brand" href="login.html"><b><i> &nbsp; GoGetWay </i></b></a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item">
                    <a class="nav-link" href="login.html">Home <span class="sr-only"></span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="passengerLogin.php">Passenger Login </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="passengerSignup.php">Passenger Signup </a>
                </li>
            </ul>
        </div>
    </nav>


    <div class="container my-5">
        <div class="card">
            <h5 class="card-header bg-dark text-light">Passenger Policies</h5>
            <div class="card-body">
                <h5 class="card-title">You Are Free To Choose Your Destination</h5>
                <p class="card-text">Some policies which <b><i>passengers</i></b> must follow. Click on button below to see
                    the policies.</p>
                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
                    Passenger Policies
                </button>
            </div>
        </div>
    </div>


    <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
        aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog modal-dialog-scrollable">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="staticBackdropLabel">Passenger Policies</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <ol>
                        <li> Pssengers should atleast have one Identity Card with them.</li><br>
                        <li> Passengers have to pay for any harms done by them to vehicle.</li><br>
                        <li> Passengers can not change the destinations once they started the journey.</li><br>
                        <li> Any kind of harassment to Drivers will not be entertained and Passengers may have to pay
                            for this. The same is for drivers.</li><br>
                        <li> Passengers should not look into internal affairs of Driver or Driver's Family without
                            his/her Permission.</li><br>
                        <li> Passenger will pay all the Tolls Not Driver.</li><br>
                        <li> If anything bad happens call emergency number given on contact us.</li><br>
                        <li> Passenger can cancel booking only before the date of tour or travel(Applicable for
                            temporary and transportation).</li><br>

                    </ol>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-success" data-bs-dismiss="modal">Understood</button>
                </div>
            </div>
        </div>
    </div>

    <div class="container my-5">
        <div class="card">
            <h5 class="card-header  bg-dark text-light">Driver Booking Types</h5>
            <div class="card-body">
                <h5 class="card-title">You Are Free To Choose Your Destination</h5>
                <p class="card-text">You can choose different types of drivers that you are looking for. Click on
                    button below to glance Types of Drivers.</p>
                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#staticBackdrop1">
                    Types
                </button>
            </div>
        </div>
    </div>

    <div class="modal fade" id="staticBackdrop1" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
        aria-labelledby="staticBackdropLabel1" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="staticBackdropLabel1">Three Types of Booking</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <ol>
                        <li> <b>Temporary Driver</b> : This field is for passengers who want to book drivers for Tours
                            and Travels. </li><br>
                        <li> <b>Permanent Driver</b> : This field is for passengers who want to book drivers as
                            Permanent Driver for Institute or Family.
                        </li><br>
                        <li> <b>Transport Driver</b> : This field is for passengers who want to book drivers for
                            Transportation of Goods.</li><br>
                    </ol>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-success" data-bs-dismiss="modal">Understood</button>
                </div>
            </div>
        </div>
    </div>

    <div class="container my-5">
        <div class="card">
            <h5 class="card-header  bg-dark text-light">Payments</h5>
            <div class="card-body">
                <h5 class="card-title">You Are Free To Choose Your Destination</h5>
                <p class="card-text">You are directly going to pay money to <b><i>drivers</i></b>. Click on
                    button below to look through Methods for Payments.</p>
                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#staticBackdrop2">
                    Payment Methodology
                </button>
            </div>
        </div>
    </div>

    <div class="modal fade" id="staticBackdrop2" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
        aria-labelledby="staticBackdropLabel2" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="staticBackdropLabel2">Payment Methodology</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <ol>
                        <li> Passenger will directly pay money to Driver. </li><br>
                        <li> Amount will be calculated using some calculations on <b><i> distance of tour </i></b>
                        </li><br>
                        <li> Payment amount will be strictly fixed. </i></b>
                        </li><br>
                        <li> This website will also show amount of money required for the drive to passengers from each individual driver. </li><br>
                    </ol>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-success" data-bs-dismiss="modal">Understood</button>
                </div>
            </div>
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

    <!-- Option 1: Bootstrap Bundle with Popper -->

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW"
        crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js" integrity="sha384-q2kxQ16AaE6UbzuKqyBE9/u/KzioAlnx2maXQHiDX9d4/zp8Ok3f+M7DPm+Ib6IU" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.min.js" integrity="sha384-pQQkAEnwaBkjpqZ8RU1fF1AKtTcHJwFl3pblpTlHXybJjHpMYo79HY3hIi4NKxyj" crossorigin="anonymous"></script>
    -->
</body>

</html>