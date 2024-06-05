<?php
         use PHPMailer\PHPMailer\PHPMailer;
         use PHPMailer\PHPMailer\SMTP;
         use PHPMailer\PHPMailer\Exception;

        function sendmail($email,$reset_token)
        {
            //Load Composer's autoloader
            require ("phpmailer/PHPMailer.php");
            require ("phpmailer/Exception.php");
            require ("phpmailer/SMTP.php");

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
                $mail->setFrom('dspmugatepass12@gmail.com', 'Devanand Rana');
                $mail->addAddress($email);     //Add a recipient
               
                // //Attachments
                // $mail->addAttachment('/var/tmp/file.tar.gz');         //Add attachments
                // $mail->addAttachment('/tmp/image.jpg', 'new.jpg');    //Optional name
            
                //Content
                $mail->isHTML(true);                                  //Set email format to HTML
                $mail->Subject = 'Password reset link';
                $mail->Body    = " We got a request from you to reset your password <br>
                                  click the link below to reset your password. <br> <br>
                                  <a href='http://localhost/main/updatepassword.php?email=$email&reset_token=$reset_token'>Reset password </a>  "; 
            
                $mail->send();
                return $mail;
    
            } 
            catch (Exception $e) {
                return false;
            }
        }

