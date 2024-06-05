<?php 
   include "database/voter.php";
   session_start();
   if(!isset($_SESSION['loggedin']) || $_SESSION['loggedin']!= true)
   {
     header("location: registeredVote.php");
     exit;
   }

?>
<?php 
    $UserEmail = $_SESSION['email'];
    // $UserNumber = $_SESSION['number'];
?>

<?php 
        if($_SERVER['REQUEST_METHOD'] == "POST")
        {
            include 'database/voter.php';
            $UserEmail;
            $otp = $_POST['otp'];

            $sql = "SELECT * FROM `Registered_vote` WHERE email = '$UserEmail' AND otp ='$otp'";
            $result = mysqli_query($conn, $sql);
            $num = mysqli_num_rows($result);
            if($num == 1)
            {
                echo "<script>
                alert('Otp verified');
                </script>";
                $sqlQuery = mysqli_query($conn, "UPDATE `Registered_vote` SET confirm = 1 where email= '$UserEmail'");
                session_start();
                $_SESSION['loggedin'] = true;
                header("location: voter_registration.php");

            }
            else
            {
                echo "<script>
                alert('Incorrect OTP| Please try again');
                window.location.href='otp.php'
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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css"
        integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">

    <link rel="icon" href="assets/img/tittle.png" type="image/icon type">

    <title>ECI |OTP verfication</title>
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
        <?php require 'navbar/otp.php' ?>
    </div>
    <hr><br><br>
    <div class="container">
        <div class="row">
            <div class="col-md-3"></div>
            <div class="col-md-5 pl-1 pr-1 ml-1 form pb-4 mb-4 mt-4"
                style="border:1px solid #006492; border-radius: 5px;">
                <h6 class="pt-3 pb-3 pl-3 pr-3" style="background-color:#006492; color:#fff;">
                    Verify Email With OTP</h6>
                    <?php echo $UserEmail;?>
                    
                <marquee behavior="" direction="left" style="color: red"><b><i>Check your Entered Email</i></b>
                </marquee>

                <form action="/voting/otp.php" method="POST">
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
    <br><br>
    <?php require 'footer.php' ?>
    <script>
    var timeLeft = 30;
    var elem = document.getElementById('Timer');

    var timerId = setInterval(countdown, 1000);

    function countdown() {
        if (timeLeft == 0) {
            clearTimeout(timerId);
            doSomething();
        } else {
            elem.innerHTML = timeLeft + 'sec remaining';
            timeLeft--;
        }
    }
    </script>
</body>

</html>