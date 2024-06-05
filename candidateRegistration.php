<?php

        // email  send  code

        $otp = rand(100000,999999); 

        // mail verification send code 
       
        use PHPMailer\PHPMailer\PHPMailer;
        use PHPMailer\PHPMailer\SMTP;
        use PHPMailer\PHPMailer\Exception;
        function sendmail($email, $otp)
       {
          

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
                        <br><br>      Your Otp is : $otp
                        <br><br>    <h3>Log-in And see your Party details</h3>;
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

    if($_SERVER["REQUEST_METHOD"] == "POST")
    {
    require "database/voters_list.php";

        $Cname = $_POST['Cname'];
        $dob = $_POST['dob'];
        $email = $_POST['email'];
        $Aadhar = $_POST['Aadhar'];
        $Password = $_POST['Password'];
        $cPassword = $_POST['cPassword'];
        $Pname = $_POST['Pname'];


          // Candidate photo and symbol  files upload ....
           if($_FILES["photo"]["sign"]["error"] === 4)
           {
               echo "<script> alert('image not exist'); </script>";
           }
           else
           {
               $filename = $_FILES["photo"]["name"];
               $filesize = $_FILES["photo"]["size"];
               $tmpName = $_FILES["photo"]["tmp_name"];
                   // photo 
   
               $Signname = $_FILES["sign"]["name"];
               $Signsize = $_FILES["sign"]["size"];
               $tmp_signName = $_FILES["sign"]["tmp_name"];
                   // sign 
   
               $validimageExtension = ['jpg' , 'jpeg' , 'png'];
   
               $ValidSignExtension = ['jpg' , 'jpeg' , 'png'];
   
               $imageExtension = explode('.', $filename);
               $imageExtension = strtolower(end($imageExtension));
   
               $signExtension =  explode('.' , $Signname);
               $signExtension =  strtolower(end($signExtension));
   
               if(!in_array($imageExtension , $validimageExtension)){
                   
                   echo "<script> alert('Invalid image extension !'); 
                        </script>";

               }else if(!in_array( $signExtension , $ValidSignExtension))
               {
                echo  "<script> alert('Party symbol extension is not valid'); 
                </script>";
               }else if ($filesize > 1000000){
                
                   echo "<script> alert(' Image File size is too large .'); </script>";
                   
               }
               else if ($Signsize > 1000000){
                   echo "<script> alert('Signature size is too large .'); </script>";
               }
               else {
                   $newImgageName = uniqid();
                   $newImgageName .= '.' . $imageExtension;
                   move_uploaded_file($tmpName, 'party/' . $newImgageName);
   
                   $new_Sign_Name = uniqid();
                   $new_Sign_Name .= '.' . $signExtension;
                   move_uploaded_file($tmp_signName, 'party/' . $new_Sign_Name);
   
                  if($Password == $cPassword)
                  {
                    $sql = "INSERT INTO `candidate` (`Cname`, `dob`, `email`,`otp`, `Aadhar`, `Password`, `cPassword`, `Pname`,`Cphoto`,`symbol`,`confirm`) 
                      VALUES ('$Cname', '$dob', '$email','$otp', '$Aadhar', '$Password', '$cPassword', '$Pname','$newImgageName','$new_Sign_Name','0')";
                      $result = mysqli_query($conn, $sql);
                      if($result == true && sendmail($_POST['email'], $otp))
                      {
                        echo  "<script>
                        alert('DATA INSERTED');
                        alert('Log-in to view your Party details');
                        window.location.href='CandidateVerfication.php';
                        </script>";
                        session_start();
                        $_SESSION['Cname'] = $Cname;
                        $_SESSION['email'] = $email;
                        $_SESSION['loggedin'] = true;
                      }
                      else
                      {
                        echo "<script>
                        alert('DATA NOT INSERTED');
                        window.location.href='index.php';
                        </script>";
                      }
                  }
                  else
                  {
                    echo "<script>
                                alert('Registration Successfull');
                                window.location.href='voter_registration.php';
                            </script>";
                  }
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
    <link rel="stylesheet" href="assets/css/style.css">
    <!-- <link rel="stylesheet" href="assets/bootstrap.css"> -->

    <link rel="icon" href="assets/img/tittle.png" type="image/icon type">

    <title> Candidate registration |</title>
</head>
<style>
.input {
    border: 1px solid #006492;
    border-radius: 5px;
    width: 250px;
    height: 35px;
    font-size: 15px;
    color: green;
    font-weight: 500;
}

p {
    color: #000;
    font-size: 12px;
}

body 
{
    min-height: 1vh;
}
</style>

<body>

    <div class="container">
        <?php include "navbar/Candi_navbar.php" ?>

        <div class="row">
            <div class="col-md-1"></div>
            <div class="col-md-10">
                <div class="header" style="background-color: #cde7ff; border-radius: 5px; border : 2px solid #000">
                    <div class="form pt-2 pr-3 pl-2 pb-3">

                        <div class="form-group">
                            <br>
                            <img src="assets/img/flag.png"
                                class="img-fluid " style="max-width: 20%; height: auto;">

                            <img src="https://upload.wikimedia.org/wikipedia/commons/5/55/Emblem_of_India.svg"
                                class="img-fluid rounded float-right" style="max-width: 120px; height: auto;">

                            <h6>CANDIDATE REGISTRATION</h6>
                            <hr style="border: 1px solid #006492;
                                border-radius: 1px;">

                            <form action="/voting/candidateRegistration.php" method="POST" enctype="multipart/form-data">
                                <div class="form-group">

                                    <label for="text" class="pl-5 mr-5 pt-4"><b style="color:red">*</b>Full Name</label>
                                    <input type="text" class="input" name="Cname" required>

                                    <label for="date" class="pl-5 mr-4"><b
                                            style="color:red">*</b>Date-of-birth</label>&nbsp
                                    <input type="date" class="input" name="dob" required>

                                </div>


                                <div class="form-group">

                                    <label for="Email" class="pl-5 mr-4"><b
                                            style="color:red">*</b>Email</label>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
                                    <input type="Email" class="input" name="email">

                                    <label for="text" class="pl-5 mr-4"><b style="color:red">*</b>Aadhar
                                        card</label>&nbsp&nbsp&nbsp
                                    <input type="text" class="input" name="Aadhar" id="credit-card-number" onsubmit="aadhar()" required>
                                </div>

                                <div class="form-group">

                                    <label for="Password" class="pl-5 mr-4"><b
                                            style="color:red">*</b>Password</label>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
                                    <input type="Password" class="input" name="Password">

                                    <label for="Password" class="pl-5 "><b
                                            style="color:red">*</b>Confirm Password</label>
                                    <input type="Password" class="input" name="cPassword">
                                </div>

                                <div class="form-group">
                                    <label for="text" class="pl-5 mr-4"><b
                                            style="color:red">*</b>Party-Name</label>&nbsp&nbsp
                                    <input type="text" class="input" name="Pname">
                                </div>

                                <hr style="border: 1px solid #006492;
                                border-radius: 1px;">


                                <p><b style="color:red">*</b> jpeg , jpg , png format only supported with 1Mb</p>
                                <div class="form-group">
                                <label class="pl-3 mr-2">Candidate Photo :</label>
                        <input type="file" name="photo" id="photo" accept=".jpeg, .jpg, .png" required>

                        <label class="pl-3 mr-2"> Party Symbol :</label>
                        <input type="file" name="sign" id="photo" accept=".jpeg, .jpg, .png" required>
                  
                                </div>

                                <div class="form-group">
                                    <label class="form-check-label pl-5 mr-5"><input type="checkbox"> Remember me</label>
                                </div>

                                <button type="submit" class="btn btn-success btn-lg ml-5 ">Registered</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

        </div>
</div>
        <?php include "footer.php" ?>
        <script>
    
function aadhar()
{
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