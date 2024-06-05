<?php  
        session_start();
        if(! $_SESSION['password']){
            header("location: electionResult.php");
        }
            require "database/voters_list.php";
            $sql = mysqli_query($conn , "SELECT * FROM `vote_counting` WHERE  vote_to ='1'");
            $query = mysqli_num_rows($sql);

            $sql1 = mysqli_query($conn , "SELECT * FROM `vote_counting` WHERE vote_to ='2'");
            $query1 = mysqli_num_rows($sql1);

            $sql2 = mysqli_query($conn , "SELECT * FROM `vote_counting` WHERE vote_to ='3'");
            $query2 = mysqli_num_rows($sql2);

            $sql3 = mysqli_query($conn , "SELECT * FROM `vote_counting` WHERE vote_to ='4'");
            $query3 = mysqli_num_rows($sql3);

            $sql4 = mysqli_query($conn , "SELECT * FROM `vote_counting` WHERE vote_to ='5'");
            $query4 = mysqli_num_rows($sql4);

            $add = $query + $query1 + $query2 + $query3 + $query4;
            
            $total_seats = 543;
            $available_seats = $total_seats -$add;
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css"
        integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

    <link rel="stylesheet" href="assets/css/resultpage.css">
    <link rel="icon" href="assets/img/tittle.png" type="image/icon type">
    <title>Election Commision Of India </title>

</head>

<body>
    <div class="container-fluid mt-2">
    <!-- <img class="image" src="assets/css/back/chakra.png" alt="" width="200px" height="200px"> -->
        <div class="row">
            <div class="col-md-1"></div>
            <div class="col-md-10 image ">
                <div class="card" style="background-color:#424242">
                    <div class="container">
                        <div class="row">
  
                            <marquee behavior="" direction="left">Here You seen all the List Of Candidate and their vote.</marquee>
                         <hr style="height:2px;" >
                                <div class="form-group">
                                    <button class="btn btn-danger btn-sm float-right"
                                            type="submit">
                                         
                                        <a href="ECi_logout.php" style="color:#fff;text-decoration: none;">Logout</a>
                                    </button>
                                </div>  
                            <form action="/voting/resultPage.php" method="POST">
                                <table class="table  table-secondary table-striped table-bordered border-success">
                                    <thead>
                                        <tr class="table-warning">
                                            <th scope="col">S.no</th>
                                            <th scope="col">Candidate Photo</th>
                                            <th scope="col" style="text-align:center">Candidate Name </th>
                                            <th scope="col">Party Name</th>
                                            <th scope="col" style="text-align:center">Party Symbol</th>
                                            <th scope="col">Total Votes</th>
                                        </tr>
                                    </thead>
                                    <tr>
                                        <th scope="row">1</th>
                                        <td><img src="party/648c9cfc81da7.png" alt="" width="120px" height="120px"></td>
                                        <td style="text-align:center"><b>Narendra Modi</b></td>
                                        <td><b>Bhartiya Janta Party</b></td>
                                        <td style="text-align:center"> <img src="party/648c9cfc8326a.jpg" alt=""
                                                width="120px" height="120px"> </td>
                                        <td style="position: absolute;font-size:20px;
                                        transform: translate(130%, 100%);">
                                            <b><?php echo $query  ?></b>
                                        </td>
                                    </tr>

                                    <tr>
                                        <th scope="row">2</th>
                                        <td><img src="party/648ca9ed12a75.jpg" alt="" width="120px" height="120px"></td>
                                        <td style="text-align:center"><b>Rahul Ghandhi</b></td>
                                        <td><b>Congress Party</b></td>
                                        <td style="text-align:center"> <img src="party/648ca9ed13336.png" alt=""
                                                width="120px" height="120px"> </td>
                                        <td style="position: absolute;font-size:20px;
                                        transform: translate(130%, 100%);">
                                            <b> <?php echo $query1 ?> </b>
                                        </td>
                                    </tr>

                                    <tr>
                                        <th scope="row">3</th>
                                        <td><img src="party/648caa68a3db9.jpg" alt="" width="120px" height="120px"></td>
                                        <td style="text-align:center"><b>Arbind Kejriwal</b></td>
                                        <td><b>Aam Aadmi Party</b></td>
                                        <td style="text-align:center"> <img src="party/648caa68a441c.jpg" alt=""
                                                width="120px" height="120px"> </td>
                                        <td style="position: absolute;font-size:20px;
                                        transform: translate(130%, 100%);">
                                            <b><?php echo $query2  ?></b>
                                        </td>
                                    </tr>

                                    <tr>
                                        <th scope="row">4</th>
                                        <td><img src="party/648cab0256f0f.jpg" alt="" width="120px" height="120px"></td>
                                        <td style="text-align:center"><b>Binoy Viswam</b></td>
                                        <td><b>Communist Party of India</b></td>
                                        <td style="text-align:center"> <img src="party/648cab0257660.png" alt=""
                                                width="120px" height="120px"> </td>
                                        <td style="position: absolute;font-size:20px;
                                        transform: translate(130%, 100%);">
                                            <b><?php echo $query3  ?></b>
                                        </td>
                                    </tr>

                                    <tr>
                                        <th scope="row">5</th>
                                        <td><img src="party/64b3ad4aa0c6b.jpg" alt="" width="120px" height="120px"></td>
                                        <td style="text-align:center"><b>Binoy Viswam</b></td>
                                        <td><b>Communist Party of India</b></td>
                                        <td style="text-align:center"> <img src="party/64b3ad4aa230a.png" alt=""
                                                width="120px" height="120px"> </td>
                                        <td style="position: absolute;font-size:20px;
                                        transform: translate(130%, 100%);">
                                            <b><?php echo $query3  ?></b>
                                        </td>
                                    </tr>
                                </table>
                            </form>
                        </div>
                    </div>


                    <div class="col-md-4 mb-5 mt-2 seats">
                            <div class="card-body">
                                <h4 class="card-subtitle"><b>Total Seats: &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp</b> <?php echo $total_seats ?></h4>
                            </div>
                                <hr style="height:1px;background-color: #fff">
                            <div class="card-body">
                                <h4 class="card-subtitle"><b>vote By people: &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp</b> <?php echo $add ?></h4>
                            </div>
                            <hr style="height:1px;background-color: #fff">

                            <div class="card-body">
                                <h4 class="card-subtitle"><b>Available Seats: &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp</b><?php echo $available_seats ?></h4>
                            </div>

                           
                    </div>

                          

                    <!-- code end total seats -->
                </div>

            </div>

        </div>
    </div>



</body>

</html>