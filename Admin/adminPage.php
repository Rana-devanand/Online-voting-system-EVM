<?php

session_start();
        if(!$_SESSION["email"]){
            header("location: /voting/Admin/admin.php");
        }
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description"
        content="Responsive sidebar template with sliding effect and dropdown menu based on bootstrap 3">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
        integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link href="https://use.fontawesome.com/releases/v5.0.6/css/all.css" rel="stylesheet">

    <link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
    <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>


    <link rel="stylesheet" href="admin1.css">
    <link rel="stylesheet" href="progressbar.css">

    <title> Admin | Devanand Rana</title>
    <link rel="icon" href="tittle.png" type="image/icon type">
</head>
<style>
span {
    font-size: 15px;
}

#myDIV {
    width: 100%;
    padding: 50px 0;
    text-align: center;
    background-color: lightblue;
    margin-top: 20px;
}
</style>

<body>
    <div class="page-wrapper chiller-theme toggled">
        <a id="show-sidebar" class="btn btn-sm btn-dark" href="#">
            <i class="fas fa-bars"></i>
        </a>
        <nav id="sidebar" class="sidebar-wrapper">
            <div class="sidebar-content">
                <div class="sidebar-brand">
                    <a href="#" style="font-size:15px">Admin</a>
                    <div id="close-sidebar">
                        <i class="fas fa-times"></i>
                    </div>
                </div>
                <div class="sidebar-header">
                    <div class="user-pic">
                        <img class="img-responsive img-rounded" src="pick.jpg" alt="User picture">
                    </div>
                    <div class="user-info">
                        <span class="user-name">Devanand
                            <strong>Rana</strong>
                        </span>
                        <span class="user-role">Project owner</span>
                        <span class="user-status">
                            <i class="fa fa-circle"></i>
                            <span>Online</span>
                        </span>
                    </div>
                </div>
                <!-- sidebar-header  -->


                <div class="sidebar-menu">
                    <ul>
                        <li class="header-menu">
                            <span>Voters </span>
                        </li>
                        <li class="sidebar-dropdown">
                            <a href="#">
                                <i class="fa fa-chart-line"></i>
                                <span>Registered Voter</span>
                                <!-- <span class="badge badge-pill badge-warning">New</span> -->
                            </a>

                        <li class="sidebar-dropdown">
                            <a href="#">
                                <i class="fa fa-globe"></i>
                                <span>Voters list</span>
                                <!-- <span class="badge badge-pill badge-danger">3</span> -->
                            </a>

                        <li class="sidebar-dropdown">
                            <a href="#">
                                <i class="fa fa-globe"></i>
                                <span>Update Voters list</span>
                                <!-- <span class="badge badge-pill badge-danger">3</span> -->
                            </a>

                        <li class="sidebar-dropdown">


                        <li class="header-menu">
                            <span>Candidate </span>
                        </li>

                        <li class="sidebar-dropdown">
                            <a href="#">
                                <i class="fa fa-chart-line"></i>
                                <span>Registered Candidate</span>
                            </a>

                        <li class="sidebar-dropdown">
                            <a href="#">
                                <i class="fa fa-globe"></i>
                                <span>Candidate List</span>
                            </a>

                        <li class="header-menu">
                            <span>Update</span>
                        </li>
                        <li>
                            <a href="#" onclick="myFunction()">
                                <i class="fa fa-book"></i>
                                <span>News And Update</span></a>

                        </li>
                        <br>
                        <a href="admin_logout.php" style="color:#fff;text-decoration: none;"><button type="button"
                                class="btn btn-danger btn-lg btn-block">Logout</button></a>
        </nav>


        <!-- sidebar-wrapper  -->
        <main class="page-content">

            <div class="container">
                <h2>Admin Control Panel</h2>
                <!-- <div class="d-grid d-md-flex justify-content-md-end">
                    <button class="btn btn-primary" type="button">Button</button>
                    </div> -->
                <hr>

                <div class="container">

                    <div class="row">
                        <div class="col-md-3 col-sm-6">
                            <div class="progress blue">
                                <span class="progress-left">
                                    <span class="progress-bar"></span>
                                </span>
                                <span class="progress-right">
                                    <span class="progress-bar"></span>
                                </span>
                                <div class="progress-value">90%</div>
                            </div>
                            <h4><b>Total Registered Voters</b></h4>

                        </div>


                        <div class="col-md-3 col-sm-6">
                            <div class="progress yellow">
                                <span class="progress-left">
                                    <span class="progress-bar"></span>
                                </span>
                                <span class="progress-right">
                                    <span class="progress-bar"></span>
                                </span>
                                <div class="progress-value">75%</div>
                            </div>
                            <h4><b>Confirm Voters</b></h4>
                        </div>

                        <div class="details">
                            <h3>Total Registered Voters : </h3>
                            <h4>Confirms Voters : </h4>
                        </div>
                    </div>
                </div>


                <hr>

                <div class="container">

                    <div class="row">
                        <div class="col-md-3 col-sm-6">
                            <div class="progress green">
                                <span class="progress-left">
                                    <span class="progress-bar"></span>
                                </span>
                                <span class="progress-right">
                                    <span class="progress-bar"></span>
                                </span>
                                <div class="progress-value">90%</div>
                            </div>
                            <h4><b>Total Registered Candidate</b></h4>

                        </div>


                        <div class="col-md-3 col-sm-6">
                            <div class="progress pink">
                                <span class="progress-left">
                                    <span class="progress-bar"></span>
                                </span>
                                <span class="progress-right">
                                    <span class="progress-bar"></span>
                                </span>
                                <div class="progress-value">60%</div>
                            </div>
                            <h4><b>Confirm Candidate</b></h4>
                        </div>
                        <div class="details">
                            <h3>Total Registered Candidate: </h3>
                            <h4>Confirms Candidate : </h4>
                        </div>
                    </div>
                </div>
        </main>
        <div id="myDIV">
            <!-- This is my DIV element. -->
        </div>

    </div>
    <!-- page-wrapper -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"
        integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous">
    </script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"
        integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous">
    </script>
    <script src="assets/js/admin.js"></script>



</body>

</html>