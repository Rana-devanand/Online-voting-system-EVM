<?php  
    if($_SERVER['REQUEST_METHOD'] == "POST"){
        
        $eci_code = "ecindia@gmail.com";
        $eci_pass = "eci2023";
        $eci_name = "ECI HEAD";

        $eci_email = $_POST['email'];
        $eci_password = $_POST['password'];

        if($eci_password == $eci_pass)
        {
            echo 
            '
            <script>
            window.alert("ECI Logged-In ");
            window.location.href="resultPage.php";
            </script>
            ';
            session_start();
            $_SESSION['password'] = $eci_password;
        }
        else{
            echo 
            '
            <script>
            window.alert("Unauthorised Code Enter");
            window.location.href="electionResult.php";
            </script>
            ';
        }
    }

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
    
    <link rel="stylesheet" href="assets/css/result.css">
    <link rel="icon" href="assets/img/tittle.png" type="image/icon type">


    <title>Authentic ECI USER </title>
</head>
<body>
           
<div class="container-fluid">
            <div class="d-flex justify-content-center h-100">
                <div class="card">
                    <div class="card-header">
                        <h3 style="color:#fff"> Election Commission Of India Login : </h3>
                        <div class="d-flex justify-content-end social_icon">

                        </div>
                    </div>

                    <div class="card-body">

                        <form action="/voting/electionResult.php" method="POST">
                            <div class="input-group form-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fas fa-envelope"></i></span>
                                </div>
                                <input type="email" class="form-control" name="email" value="ecindia@gmail.com" disabled>

                            </div>
                            <div class="input-group form-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fas fa-key"></i></span>
                                </div>
                                <input type="password" class="form-control" placeholder="password" name="password">
                            </div>
                            <div class="row align-items-center remember">
                                <input type="checkbox" required>Remember Me
                            </div>
                            <div class="form-group">
                                <input type="submit" value="LOGIN" class="btn float-right btn-primary btn-lg">
                            </div>
                        </form>

                    </div>
                    <div class="card-footer">
                       
                        <div class="d-flex justify-content-center links">
                            <a href="#">Forgot password?</a>
                        </div>
                        <div class="d-flex justify-content-center links">
                            <span><i class="fas fa-home"></i></span>
                            <a href="index.php">Home</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
</body>
</html>