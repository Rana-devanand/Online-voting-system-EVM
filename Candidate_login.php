<?php
    

?>

<?php 
$login_failed=false;
if($_SERVER["REQUEST_METHOD"] == "POST")
{
    include "database/voters_list.php";
    $email = $_POST['email'];
    $password = $_POST['password'];

    $sql = "SELECT * FROM `candidate` WHERE email ='$email' and Password='$password'";
    $check_conn= mysqli_query($conn,$sql);
    $result = mysqli_num_rows($check_conn);
    if($result == 1)
    {   
        $fetch_deta = mysqli_fetch_assoc($check_conn);
        $cname = $fetch_deta['Cname'];
        $aadhar = $fetch_deta['Aadhar'];
        $pname = $fetch_deta['Pname'];
        $cphoto = $fetch_deta['Cphoto'];
        $symbol = $fetch_deta['symbol'];

        echo '
            <script>
            alert("You are successfully logged-in |");
            window.location.href="candidate_page.php";
            </script>';
            session_start();
            $_SESSION['Cname'] = $cname;
            $_SESSION['Aadhar'] = $aadhar ;
            $_SESSION['Pname'] = $pname;
            $_SESSION['Cphoto'] = $cphoto;
            $_SESSION['symbol'] = $symbol;
            $_SESSION['loggedin'] = true;
           

    }
    else
    {
        $login_failed = true;
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
    
    <link rel="stylesheet" href="assets/css/candidate.css">
    <link rel="icon" href="assets/img/tittle.png" type="image/icon type">


    <title>Candidate Login |</title>

</head>

<style>
    .input{
    border: 1px solid #006492;
    border-radius: 5px;
    width: 80px;
    height: 40px;
}
.form{
    text-align: center;
}

.corner{
    border: 1px solid #00608D;
    border-radius: 5px;
    width: 240px;
    height: 30px;
}
</style>
<body>
        <div class="container">
        <div class="container-fluid">
            <div class="d-flex justify-content-center h-100">
                <div class="card">
                    <div class="card-header">
                        <h3 style="color:#fff">Candidate Login </h3>
                        <div class="d-flex justify-content-end social_icon">

                        </div>
                    </div>
                    <div class="card-body">

                        <form action="/voting/Candidate_login.php" method="POST">
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
                                <input type="email" class="form-control" placeholder="Candidate Email" name="email">

                            </div>
                            <div class="input-group form-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fas fa-key"></i></span>
                                </div>
                                <input type="password" class="form-control" placeholder="Password" name="password">
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
                            Don't have an account?<a href="candidateRegistration.php">Sign Up</a>
                        </div>
                        <div class="d-flex justify-content-center links">
                            <a href="#">Forgot your password?</a>
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