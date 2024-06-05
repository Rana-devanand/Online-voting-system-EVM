<?php
    session_start();
    $cname = $_SESSION['Cname'];
    $email = $_SESSION['email'];

?>


<?php
              if($_SERVER['REQUEST_METHOD'] == "POST")
              {
                  include 'database/voters_list.php';
                  $email;
                  $otp = $_POST['otp'];
      
                  $sql = "SELECT * FROM `candidate` WHERE email = '$email' AND otp ='$otp'";
                  $result = mysqli_query($conn, $sql);
                  $num = mysqli_num_rows($result);
                  if($num == 1)
                  {
                      echo "<script>
                      alert('Otp verified');
                      </script>";
                      $sqlQuery = mysqli_query($conn, "UPDATE `candidate` SET confirm = 1 where email= '$email'");
                      session_start();
                      $_SESSION['loggedin'] = true;
                      header("location: Candidate_login.php");
      
                  }
                  else
                  {
                      echo "<script>
                      alert('Incorrect OTP| Please try again');
                      window.location.href='CandidateVerfication.php'
                      </script>";
                  }
              }
      
 ?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="icon" href="assets/img/tittle.png" type="image/icon type">

    <title>Enter OTP | </title>
</head>
<style>
    .input {
    border: 1px solid #006492;
    border-radius: 5px;
    width: 250px;
    height: 35px;
}

.form {
    text-align: center;
}

.otp {
    border: 1px solid #006492;
    border-radius: 5px;
    width: 150px;
    height: 30px;
}
</style>
<body>
        <div class="container">
            <?php require "navbar/candidate_Navbar.php" ?>
                <div class="row">
                <div class="col-md-3"></div>
            <div class="col-md-5 pl-1 pr-1 ml-1 form pb-4 mb-4 mt-4"
                style="border:1px solid #006492; border-radius: 5px;">
                <h6 class="pt-3 pb-3 pl-3 pr-3" style="background-color:#00B80F; color:#fff;">
                    Verify Email With OTP</h6>
                    <?php echo $email;?>
                    
                <marquee behavior="" direction="left" style="color: red"><b><i>Check your Entered Email</i></b>
                </marquee>

                <form action="/voting/CandidateVerfication.php" method="POST">
                <div class="form-group mt-3">
                        <label for="email" class="pr-2 mr-3">Email</label>&nbsp&nbsp&nbsp&nbsp
                        <input type="email" class="email"  name="email" value="<?php echo $_SESSION['email'];  ?>" disabled>
                    </div>

                    <div class="form-group mt-3">
                        <label for="number" class="pr-2 mr-3">OTP</label>&nbsp&nbsp&nbsp&nbsp
                        <input type="text" class="otp" name="otp">
                    </div>
                    <div id="Timer"></div>
                    <button type="submit" class="btn btn-success input">Confirm</button>
                </form>

            </div>
                </div>
        </div>

        <?php require "footer.php" ?>
</body>
</html>