<?php 

$login_failed=false;
if($_SERVER["REQUEST_METHOD"] == "POST")
{
    include "database/voters_list.php";
    $email = $_POST['email'];
    $password = $_POST['password'];

    $sql = "SELECT * FROM `voters_list` WHERE email ='$email' and cpassword='$password'";
    $check_conn= mysqli_query($conn,$sql);
    $result = mysqli_num_rows($check_conn);
    if($result == 1)
    {
        $fetch_name = mysqli_fetch_assoc($check_conn);
        $username = $fetch_name['fname'];

        echo '
            <script>
            alert("You are successfully logged-in ");
            window.location.href="userpage.php";
            </script>';
            session_start();
            $_SESSION['fname'] = $username;
            $_SESSION['email'] = $email;
            $_SESSION['loggedin'] = true;
            

    }
    else
    {
        $login_failed = true;
    }
}

?>

<!DOCTYPE html>

<head>
    <meta charset="UTF-8">
    <!-- bootstrap min link file  -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet"integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <!-- font icon link  -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css"integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g=="crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <!-- <link rel="stylesheet" href="assets/css/UserLogin.css"> -->
    <link rel="stylesheet" href="assets/css/voterlogin.css">

    <link rel="icon" href="assets/img/tittle.png" type="image/icon type">

    <title>Voter Login |</title>
</head>

<body>

    <div class="container">

        <div class="container-fluid">
            <div class="d-flex justify-content-center h-100">
                <div class="card">
                    <div class="card-header">
                        <h3 style="color:#fff">Voter Login</h3>
                        <div class="d-flex justify-content-end social_icon">

                        </div>
                    </div>
                    <div class="card-body">

                        <form action="/voting/userLogin.php" method="POST">
                            <div class="input-group form-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fas fa-envelope"></i></span>
                                </div>
                                <?php if($login_failed)
                                    {
                                      echo' 
                                      <script>
                                       window.alert("please Enter Valid Email and Password")
                                      </script>';
                                    }
                                    ?>
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
                                <input type="submit" value="LOGIN" class="btn float-right btn-success btn-lg">
                            </div>
                        </form>

                    </div>
                    <div class="card-footer">
                        <div class="d-flex justify-content-center links">
                            Don't have an account?<a href="registeredVote.php">Sign Up</a>
                        </div>
                        <div class="d-flex justify-content-center links">
                            <a href="VoterForget.php">Forgot your password?</a>
                        </div>
                        <div class="d-flex justify-content-center links">

                            <span><i class="fas fa-home"></i></span>
                            <a href="index.php">HOME </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</body>

</html>