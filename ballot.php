<?php
        require "database/voters_list.php";
    $sql ="SELECT * FROM `candidate` where confirm ='1'";
    $connection = mysqli_query($conn , $sql);
    $result = mysqli_num_rows($connection);
    if($result == 1)
    {
        $get_data = mysqli_fetch_assoc($connection);
        $cname = $get_data['Cname'];
        $aadhar = $get_data['Aadhar'];
        $pname = $get_data['Pname'];
        $cphoto = $get_data['Cphoto'];
        $symbol = $get_data['symbol'];
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
    <link rel="icon" href="assets/img/tittle.png" type="image/icon type">

    <!-- <link rel="stylesheet" href="assets/bootstrap.css"> -->
    <title>Ballot Details |</title>
</head>
<style>
body{
    min-height: 1vh;
}
.header {
    border: 1px solid #000;
    border-radius: 5px;
}

.ui-datepicker-calendar {
    display: none;
}
b{
    font-size:18px;
}
</style>

<body>
    <div class="container">
        <?php require "navbar/registeredVote.php" ?>

    </div>
    <div class="container-fluid">

        <div class="row" id="row2">
            <div class="col-md-1"></div>
            <div class="col-md-6" id="info-2"> <br>
                <h4>Whats On the Ballot..</h4>
                <p style="color:#fff">A ballot, which can be found as a sheet of paper or a tiny ball used in voting, is
                    a device used to cast votes in an election.
                    Its original form was a little ball used in Italy in the 16th century to record electors' choices.
                    Each voter uses a unique ballot; they are not exchanged.</p>
                <button type="button" class="btn btn-warning btn-lg"><a href="https://en.wikipedia.org/wiki/Ballot"
                        style="color:#000">Know More</a></button>
            </div>

            <div class="col-md-4">
                <img src="assets/img/ballotimg2.png" class="img-fluid" style="max-width: 65%; height: auto;">
            </div>
        </div>

    </div>
    <br>

    <div class="container-fluid">
        <div class="row">
            <div class="col-md-1"></div>
            <div class="col-md-10 ">
                <div class="card" style="background-color:#cde7ff">
                   <div class="image">
                   <img src="assets/img/ballotimg.png" class="rounded float-right" alt="..." width="400px"
                        height="auto">

                        <img src="assets/img/demo.png" class="rounded float-left" alt="..." width="550px"
                        height="auto">
                   </div>
                    <div class="container">
                        <div class="row">
                            <table class="table table-secondary table-striped table-bordered border-success">
                                <thead >
                                    <tr class="table-warning">
                                        <th scope="col">S.no</th>
                                        <th scope="col">Candidate Photo</th>
                                        <th scope="col" style="text-align:center">Cantidate Name </th>
                                        <th scope="col">Party Name</th>
                                        <th scope="col" style="text-align:center">Party Symbol</th>
                                    </tr>
                                </thead>

                                <?php
                      include "database/voters_list.php";

                        $sr_no =1;
                        $sql_get = mysqli_query($conn,"SELECT *  FROM `candidate` WHERE confirm = '1'");

                        if(mysqli_num_rows($sql_get) > 0)
                        {
                          foreach($sql_get as $row)
                          {
                              // echo $row['name'];
                              ?>
                                <tr>
                                    <th scope="row"><?php echo $sr_no++; ?></th>
                                    <td><img src="party/<?php echo $row['Cphoto'] ?>" alt="" width="150px"height="150px"></td>
                                    <td style="text-align:center"><b><?php echo $row['Cname']; ?></b></td>
                                    <td><b><?php echo $row['Pname']; ?></b></td>
                                    <td style="text-align:center"> <img src="party/<?php echo $row['symbol'] ?>" alt="" width="150px"height="150px"> </td>
                                </tr>
                                <?php
                       
                          }
                         
                        }
                        else
                        {
                          echo '<script>
                            alert("No record Found")
                              </script>';
                        } 
                      
                    ?>

                            </table>
                        </div>
                    </div>

                </div>

            </div>
            <div class="col-md-1"></div>

        </div>
    </div>

    <?php require "footer.php" ?>


</body>

</html>