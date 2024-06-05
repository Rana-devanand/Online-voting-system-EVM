<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- bootstrap min link file  -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">

    <!-- font icon link  -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css"
        integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />

    <title>Forget Password</title>
</head>

<body>

    <div class="container">

        <br>
        <section class="h-100 h-custom" style="background-color: #8fc4b7;">
            <div class="container py-3 h-100">
                <div class="row d-flex justify-content-center align-items-center h-100">
                    <div class="col-lg-8 col-xl-6">
                        <div class="card rounded-3">
                            <img src="assets/img/stuforget.jpg" ; class="w-100"
                                style="border-top-left-radius: .3rem; border-top-right-radius: .3rem; height: 250px;"
                                alt="Sample photo">
                            <div class="card-body p-4 p-md-5">
                                <h3 class="mb-4 pb-2 pb-md-0 mb-md-5 px-md-2">Forget password :</h3>

                                <!-- login detail form  -->

                                <form class="px-md-2" action="/main/forgetpassword.php" method="POST">
                                    <!-- User-id  -->
                                    <div class="form-floating mb-3">
                                        <input type="email" class="form-control" id="email" placeholder="email"
                                            name="email">
                                        <label for="email">email</label>
                                    </div>

                                    <!-- remember me chechbox  -->
                                    <div class="text-center text-lg-start mt-4 pt-2">
                                        <button type="submit" class="btn btn-primary btn-lg" name="reset-link"
                                            style="padding-left: 2.5rem; padding-right: 2.5rem;">Send link</button>


                                    </div>
                                </form>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

    </div>
</body>

</html>