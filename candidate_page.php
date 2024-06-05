<?php
    session_start();
    
if(!$_SESSION['Cname']){
    header("location: Candidate_login.php");
}
    $cname = $_SESSION['Cname'];
    $aadhar = $_SESSION['Aadhar'];
    $pname = $_SESSION['Pname'];
    $cphoto = $_SESSION['Cphoto'];
    $symbol = $_SESSION['symbol'];

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="icon" href="assets/img/tittle.png" type="image/icon type">

    <title> Welcome :<?php echo $cname; ?></title>
</head>

<body>
    <div class="container">
        <?php require "navbar/candidate_page.php"?>
        <div class="row">
            <div class="col-md-1"></div>

            <div class="col-md-10"
                         style="border: 1px solid #000 ;
                          border-radius: 5px ; 
                          background-color: rgb(215, 252, 243);
                          height:400px">
                <img src="assets/img/Emblem_of_India.svg" class="rounded float-left" alt="..." width="50px"
                    height="50px">
                <img src="assets/img/logo.png" class="rounded float-right" alt="..." width="50px" height="50px">
                <p class="text-center pb-2">Electoral Commission of India</p>
                <hr style="border: 1px solid #000;border-radius: 5px;">
                <p class="text-center">भारत निर्वाचन आयोग</p>

                <h6 class="text-left" id="Cname"><b>Candidate Name :</b> <?php echo $_SESSION['Cname']; ?></h6>
                <h6 class="text-right">Party logo</h6>
                <img src="party/<?php echo $_SESSION['Cphoto'];?>" class="rounded float-left" alt="..." width="150px"
                    height="180px">
                
                <img src="party/<?php echo $symbol?>" class="rounded float-right" alt="..." width="100px"
                    height="100px">
                
                <div class="text-center">
                    <h6>Party Name : <?php echo $pname ?></h6>
                    <h6>Aadhar no : <?php echo $aadhar?></h6>
                
                </div>             

            </div> <!-- middle col exit  -->
           
            <div class="col-md-1"></div>   
            <button class="btn btn-primary " onclick="window.print()">Print</button>         
        </div>
    </div>
    </div>

    <?php  require "footer.php" ?>
</body>

</html>