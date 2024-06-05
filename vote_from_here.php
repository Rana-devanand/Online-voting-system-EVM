<?php
    require "database/voters_list.php";

    if($_SERVER["REQUEST_METHOD"] == "POST")
    {
        $email = $_POST['email'];
        $password = $_POST['password'];
        $sql = "SELECT * FROM `voters_list` WHERE email = '$email' AND cpassword ='$password' and vote = 0" ;
        $query = mysqli_query($conn , $sql);
        $result = mysqli_num_rows($query);

        // candidate login verification code 
        $Can_sql = "SELECT * FROM `candidate` WHERE email ='$email' AND Password = '$password'";
        $Can_query = mysqli_query($conn , $Can_sql);
        $Can_result = mysqli_num_rows($Can_query);
        if($result == 1 )
        {   
            $fetch_data = mysqli_fetch_assoc($query);
            $username = $fetch_data['fname'];
            $lastname = $fetch_data['lname'];
            $number = $fetch_data['number'];
            echo 
            '
            <script>
            window.alert("Voter Logged_in Successfully ");
            </script>
            ';
            $sqlQuery = mysqli_query($conn ,"UPDATE `voters_list` SET vote = 1 Where email ='$email' ");
            session_start();
            $_SESSION['loggedin'] = true;
            $_SESSION['fname'] = $username;
            $_SESSION['lname'] = $lastname;
            $_SESSION['number'] = $number;
            header("location: vote.php");

        }
        elseif($Can_result > 0)
        {
            echo '
            <script>
            window.alert("Candidate are not able to Vote ! ");
            window.location.href="vote_from_here.php";
            </script>
            ';

        }
        else{
            echo 
            '
            <script>
            window.alert(" Voter is already Voted");
            window.location.href="vote_from_here.php";
            </script>
            ';

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
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css"
        integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>


    <link rel="stylesheet" href="assets/css/vote.css">

    <link rel="icon" href="assets/img/tittle.png" type="image/icon type">
    <title>Terms and condition</title>
</head>


<body>

    <div class="container-fluid">

        <div class="container-fluid">
            <div class="d-flex justify-content-center h-100">
                <div class="card">
                    <div class="card-header">
                        <h3 style="color:#fff">Vote From Here </h3>
                        <div class="d-flex justify-content-end social_icon">

                        </div>
                    </div>

                    <div class="card-body">
                        <form action="/voting/vote_from_here.php" method="POST">
                            <div class="input-group form-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fas fa-envelope"></i></span>
                                </div>
                                <input type="email" class="form-control" placeholder="Voter Email" name="email">

                            </div>
                            <div class="input-group form-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fas fa-key"></i></span>
                                </div>
                                <input type="password" class="form-control" placeholder="password" name="password">
                            </div>
                            <div class="row align-items-center remember">
                                <input type="checkbox">Remember Me
                            </div>
                            <div class="form-group">
                                <input type="submit" value="LOGIN" class="btn float-right btn-warning btn-lg">
                            </div>
                        </form>

                    </div>
                    <div class="card-footer">
                        <div class="d-flex justify-content-center links">
                            Don't have an account?<a href="registeredVote.php">Sign Up</a>
                        </div>
                        <div class="d-flex justify-content-center links">
                            <a href="#">Forgot your password?</a>
                        </div>
                        <div class="d-flex justify-content-center links">
                            <span><i class="fas fa-home"></i></span>
                            <a href="index.php">Home</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>