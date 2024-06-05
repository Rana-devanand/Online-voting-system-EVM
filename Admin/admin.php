<?php  

        if($_SERVER["REQUEST_METHOD"] == "POST"){

            $admin_code = "admin@gmail.com";
            $admin_password = "admin";

            $email = $_POST['email'];
            $password = $_POST['password'];

            if($email == $admin_code && $password == $admin_password){
                echo 
                '
                <script>
                window.alert("Admin Logged in ");
                window.location.href="adminPage.php";
                </script>
                ';
               
                session_start();
                $_SESSION["email"] = $email;

            }
            else{
                echo 
                '
                <script>
                window.alert("Unauthorised Code Enter");
                window.location.href="admin.php";
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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css"
        integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/style.css">

    <link rel="icon" href="assets/img/tittle.png" type="image/icon type">
    <link rel="stylesheet" href="css/admin.css">
    <title>Admin</title>
</head>

<body>

    <div class="container-fluid">
        <div class="d-flex justify-content-center h-100">
            <div class="card">
                <div class="card-header">
                    <h3 style="color:#fff"> Admin Login </h3>
                    <div class="d-flex justify-content-end social_icon">

                    </div>
                </div>

                <div class="card-body">

                    <form action="/voting/Admin/admin.php" method="POST">
                        <div class="input-group form-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-envelope"></i></span>
                            </div>
                            <input type="email" class="form-control" placeholder="Admin Email" name="email">

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
                            <input type="submit" value="LOGIN" class="btn float-right btn-warning btn-lg">
                        </div>
                    </form>

                </div>
                <div class="card-footer">

                    <div class="d-flex justify-content-center links">
                        <a href="#">Forgot password?</a>
                    </div>
                    <div class="d-flex justify-content-center links">
                        <span><i class="fas fa-home"></i></span>
                        <a href="http://localhost/voting/index.php">Home</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>