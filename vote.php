<?php
session_start();
if(!$_SESSION['fname'])
    {
        header("location: vote_from_here.php");
        exit;
    }
?>
<?php 

    require "database/voteCounting.php";
    require "database/voters_list.php";
  

    if($_SERVER["REQUEST_METHOD"] == "POST")
    {
        $vote = $_POST['vote'];
        $username = $_SESSION['fname'];
        $number = $_SESSION['number'];

        $sql = mysqli_query($conn ,"INSERT INTO `vote_counting` (`username`, `aadhar_no`, `vote_to`,`vote_confirm`) 
                                VALUES ('$username', '$number', '$vote','0');");
        if($sql == true){
            echo 
            '
            <script>
            window.alert(" Successfully ");
            </script>
            ';
            session_start();
            $sqlQuery = mysqli_query($conn ,  "UPDATE `vote_counting` SET vote_confirm = 1 Where username ='$username' ");
            header("location: vote_logout.php");
        }
        else
        {
            echo 
            '
            <script>
            window.alert("Failed ");
            </script>
            ';
            header("location: vote.php");
        }
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css"
        integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/style.css">
    <title>Vote Your Leader |</title>
    <link rel="icon" href="assets/img/tittle.png" type="image/icon type">

    <link rel="stylesheet" href="assets/css/realVote.css">
</head>
<body>

<div class="container-fluid">
        <div class="row">
            <div class="col-md-1"></div>
            <div class="col-md-10 ">
                <div class="card" style="background-color:#cde7ff">
                    <div class="container">
                        <div class="row">
                            <marquee behavior="" direction="left">Once you click to vote , your vote is submitted and your session is terminated.</marquee>
                            <hr><div class="form-group">
                                    <button class="btn btn-danger btn-sm float-right"
                                            type="submit">
                                        <a href="vote_logout.php" style="color:#fff;text-decoration: none;">Logout</a>
                                    </button>
                                </div>
                          <form action="/voting/vote.php" method="post">
                            <table class="table table-secondary table-striped table-bordered border-success">
                                <thead >
                                    <tr class="table-warning">
                                        <th scope="col">S.no</th>
                                        <th scope="col">Candidate Photo</th>
                                        <th scope="col" style="text-align:center">Candidate Name </th>
                                        <th scope="col">Party Name</th>
                                        <th scope="col" style="text-align:center">Party Symbol</th>
                                        <th scope="col">Click to vote</th>
                                    </tr>
                                </thead>
                                <tr>
                                    <th scope="row">1</th>
                                    <td><img src="party/648c9cfc81da7.png" alt="" width="120px"height="120px"></td>
                                    <td style="text-align:center"><b>Narendra Modi</b></td>
                                    <td><b>Bhartiya Janta Party</b></td>
                                    <td style="text-align:center"> <img src="party/648c9cfc8326a.jpg" alt="" width="120px"height="120px"> </td>
                                    <td style="text-align:center; position: absolute;
                                        transform: translate(50%, 50%);">
                                    <button type="submit" class="btn btn-success btn-sm" value="1" name="vote">VOTE</button></td>
                                </tr>

                                <tr>
                                    <th scope="row">2</th>
                                    <td><img src="party/648ca9ed12a75.jpg" alt="" width="120px"height="120px"></td>
                                    <td style="text-align:center"><b>Rahul Ghandhi</b></td>
                                    <td><b>Congress Party</b></td>
                                    <td style="text-align:center"> <img src="party/648ca9ed13336.png" alt="" width="120px"height="120px"> </td>
                                    <td style="text-align:center; position: absolute;
                                        transform: translate(50%, 50%);">
                                    <button type="submit" class="btn btn-success btn-sm" value="2" name="vote"> VOTE</button></td>
                                </tr>

                                <tr>
                                    <th scope="row">3</th>
                                    <td><img src="party/648caa68a3db9.jpg" alt="" width="120px"height="120px"></td>
                                    <td style="text-align:center"><b>Arbind Kejriwal</b></td>
                                    <td><b>Aam Aadmi Party</b></td>
                                    <td style="text-align:center"> <img src="party/648caa68a441c.jpg" alt="" width="120px"height="120px"> </td>
                                    <td style="text-align:center; position: absolute;
                                        transform: translate(50%, 50%);">
                                    <button type="submit" class="btn btn-success btn-sm" value="3" name="vote"> VOTE</button></td>
                                </tr>

                                <tr>
                                    <th scope="row">4</th>
                                    <td><img src="party/648cab0256f0f.jpg" alt="" width="120px"height="120px"></td>
                                    <td style="text-align:center"><b>Binoy Viswam</b></td>
                                    <td><b>Communist Party of India</b></td>
                                    <td style="text-align:center"> <img src="party/648cab0257660.png" alt="" width="120px"height="120px"> </td>
                                    <td style="text-align:center; position: absolute;
                                        transform: translate(50%, 50%);">
                                    <button type="submit" class="btn btn-success btn-sm" value="4" name="vote"> VOTE</button></td>
                                </tr>

                                <tr>
                                    <th scope="row">5</th>
                                    <td><img src="party/64b3ade815d2b.jpg" alt="" width="120px"height="120px"></td>
                                    <td style="text-align:center"><b>Nitish Kumar</b></td>
                                    <td><b>Janata Dal (United)</b></td>
                                    <td style="text-align:center"> <img src="party/64b3ad4aa230a.png" alt="" width="120px"height="120px"> </td>
                                    <td style="text-align:center; 
                                               position: absolute;
                                               transform: translate(50%, 50%);">
                                        <button type="submit" class="btn btn-success btn-sm" value="5" name="vote"> VOTE</button></td>
                                </tr>
                            </table>
                            </form>
                        </div>
                    </div>

                </div>

            </div>
            <div class="col-md-1"></div>

        </div>
    </div>


</body>
</html>