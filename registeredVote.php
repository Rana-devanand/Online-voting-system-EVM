<?php
        // email  send  code
        $otp = rand(100000,999999); 

        session_start();

        use PHPMailer\PHPMailer\PHPMailer;
        use PHPMailer\PHPMailer\SMTP;
        use PHPMailer\PHPMailer\Exception;
        function sendmail($email, $otp)
       {
            //Load Composer's autoloader
            require ("phpmailer/PHPMailer.php");
            require ("phpmailer/Exception.php");
            require ("phpmailer/SMTP.php");
    
            //Create an instance; passing `true` enables exceptions
            $mail = new PHPMailer(true);
    
            try {
                //Server settings
                $mail->isSMTP();                                            //Send using SMTP
                $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
                $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
                $mail->Username   = 'dspmugatepass12@gmail.com';                     //SMTP username
                $mail->Password   = 'wyigvsilmoodzadg';                               //SMTP password
                $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
                $mail->Port       = 465;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`
            
                //Recipients
                $mail->setFrom('dspmugatepass12@gmail.com', 'Devanand');
                $mail->addAddress($email);     //Add a recipient
               
                // //Attachments
                // $mail->addAttachment('/var/tmp/file.tar.gz');         //Add attachments
                // $mail->addAttachment('/tmp/image.jpg', 'new.jpg');    //Optional name
            
                //Content
                $mail->isHTML(true);                                  //Set email format to HTML
                $mail->Subject = 'Email verification | Enter the One Time Password ';
                $mail->Body    = "Thanks for Registration ! 
                        <br><br>    Your otp is : $otp
                        <br><br>  
                        "; 
            
                $mail->send();
                return $mail;
    
            } 
            catch (Exception $e) {
                return false;
            }
       }
?>
<?php 

        // Email send code end

    if($_SERVER["REQUEST_METHOD"] == "POST")
    {
        include 'database/voter.php';
        $email = $_POST['email'];
        $number = $_POST['number'];


        // if user already registered...
        $existsql = "SELECT * From `registered_vote` where email = '$email' or  number = '$number' ";
        $result = mysqli_query($conn, $existsql);
        $numExitRows = mysqli_num_rows($result);

        if($numExitRows == 1)
        {
            echo '
                <script>
                alert("user Already registered !");
                window.location.href="index.php";
                </script>';
        }
        else
        {
            $sql ="INSERT INTO `registered_vote` (`email` , `number` ,`otp`,`confirm`)
                    VALUES('$email', '$number','$otp','0') ";
            $result = mysqli_query($conn, $sql);
            if($result == true && sendmail($_POST['email'], $otp))
                {
                    
                    echo '
                    <script>
                         alert("Otp send to your email !");
                         </script>
                         ';
                         session_start();
                         $_SESSION['email'] = $email;
                         $_SESSION['number'] = $number;
                         $_SESSION['loggedin']= true;
                         header("location: otp.php");

                }

            else{
                echo '
                <script>
                alert("Email not send ");
                window.location.href="registeredVote.php";
                </script>';
            }
   
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

    <title>registered For Vote |</title>
</head>
<style>
.input {
    border: 1px solid #006492;
    border-radius: 5px;
    width: 300px;
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
        <?php require 'navbar/registeredVote.php' ?>
    </div>
    <hr>
    <div class="container">
        <div class="row">
            <div class="col-md-2"></div>
            <div class="col-md-8 pl-1 pr-1 ml-1 form pb-4 mb-4 mt-4"
                style="border:1px solid #006492; border-radius: 5px;">
                <h6 class="pt-3 pb-3 pl-3 pr-3" style="background-color:#006492; color:#fff;">
                    Verify Email for Registration</h6>

                <form action="/voting/registeredVote.php" method="POST">
                    <div class="form-group">
                        <label for="email" class="pl-5 mr-5 pt-4"><b
                                style="color:red">*</b>Email</label>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
                        <input type="email" class="input" name="email" required>
                    </div>
                    <div class="form-group">
                        <label for="text" class="pl-5 mr-5"><b style="color:red">*</b>Aadhar
                            number:</label>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
                        <input type="text" class="input" name="number" id="credit-card-number" onsubmit="aadhar()"
                            required>
                    </div>
                    <div class="form-group">
                        <label class="form-check-label"><input type="checkbox"> Remember me</label>
                    </div>
                    <button type="submit" class="btn btn-primary input">Sign in</button>

                </form>
            </div>
        </div>
    </div>

    <?php require 'footer.php' ?>
    <script>
    function aadhar() {
        var regexp = /^[2-9]{1}[0-9]{3}\s{1}[0-9]{4}\s{1}[0-9]{4}$/;

        var x = document.getElementById("credit-card-number").value;
        if (regexp.test(x)) {
            window.alert("Valid Aadhar no.");

        } else {
            window.alert("Invalid Aadhar no.");
        }
    }


    const ccInputElement = document.querySelector('#credit-card-number');

    ccInputElement.format = () => {
        // split at cursor position
        let cursorPosition = ccInputElement.selectionStart;
        let partBeforeCursorPosition = ccInputElement.value.substring(0, cursorPosition);
        let partAfterCursorPosition = ccInputElement.value.substring(cursorPosition);

        // remove whitespace, set cursor position accordingly
        const originalLength = partBeforeCursorPosition.length;
        partBeforeCursorPosition = partBeforeCursorPosition.replace(/\s/gi, '');
        cursorPosition -= originalLength - partBeforeCursorPosition.length;
        partAfterCursorPosition = partAfterCursorPosition.replace(/\s/gi, '');
        const ccNumber = partBeforeCursorPosition + partAfterCursorPosition;

        // break into groups of 4 digits
        const parts = ccNumber.match(/.{1,4}/g);

        // add spaces, set cursor position accordingly
        ccInputElement.value = parts?.join(' ') || '';
        cursorPosition += Math.floor(cursorPosition * 1 / 4);
        ccInputElement.setSelectionRange(cursorPosition, cursorPosition);
    };

    ccInputElement.addEventListener('input', ccInputElement.format);

    ccInputElement.addEventListener('keydown', event => {
        const cursorPosition = ccInputElement.selectionStart;

        // when the cursor is positioned after a space, deleting applies to the space and the digit before the space
        if (event.key == 'Backspace') {
            // if space before cursor and no selection, remove two characters and set cursor position accordingly
            if (cursorPosition == ccInputElement.selectionEnd &&
                ccInputElement.value[cursorPosition - 1] == ' ') {
                event.preventDefault();
                const newCursorPosition = cursorPosition - 2;
                ccInputElement.value = ccInputElement.value.substring(0, newCursorPosition) + ccInputElement
                    .value.substring(cursorPosition);
                ccInputElement.setSelectionRange(newCursorPosition, newCursorPosition);
                ccInputElement.format();
            }
        } else if (event.key == 'ArrowRight') {
            if (ccInputElement.value[cursorPosition + 1] == ' ') {
                const newCursorPosition = cursorPosition + 1;
                ccInputElement.setSelectionRange(newCursorPosition, newCursorPosition);
            }
        } else if (event.key == 'ArrowLeft') {
            if (ccInputElement.value[cursorPosition - 1] == ' ') {
                const newCursorPosition = cursorPosition - 1;
                ccInputElement.setSelectionRange(newCursorPosition, newCursorPosition);
            }
        }
    });
    </script>
</body>

</html>