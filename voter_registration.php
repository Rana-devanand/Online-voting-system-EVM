<?php
    include 'database/voter.php';
    session_start();
    $fetchEmail = $_SESSION['email'];
    if(!isset($_SESSION['loggedin']) || $_SESSION['loggedin']!= true)
    {
      header("location: otp.php");
      exit;
    }
    
?>
<?php
    $sql_get = "SELECT * from `Registered_vote` where email = '$fetchEmail' and confirm ='1'";
    $get_result = mysqli_query($conn , $sql_get);
    $fetch_data = mysqli_num_rows($get_result);
    if($fetch_data == 1)
    {
        $get_data = mysqli_fetch_assoc($get_result);
        $fetchNumber = $get_data['number'];
    }

?>

<?php


if($_SERVER["REQUEST_METHOD"] == "POST")
    {
        $otp = rand(100000,999999); 


        $fname = $_POST['fname'];
        $lname = $_POST['lname'];
        $FatherName = $_POST['FatherName'];
        $MotherName = $_POST['MotherName'];
        $dob = $_POST['dob'];

        $number = $_POST['number'];
        $password = $_POST['password'];
        $cpassword = $_POST['cpassword'];

        $street = $_POST['street'];
        $street1 = $_POST['street1'];
        $city = $_POST['city'];

        $state = $_POST['state'];
        $zip = $_POST['zip'];
        $Assembly = $_POST['Assembly'];
        $gender = $_POST['gender'];

        $email = $fetchEmail;

        $Epic_no = substr($fname,0,4).$otp;

     

    // photo and signature  files upload ....
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
                
                echo "<script> alert('Invalid image extension !'); </script>";
                
            }else if ($filesize > 1000000){
             
                echo "<script> alert(' Image File size is too large .'); </script>";
                
            }
            else if ($Signsize > 1000000){
                echo "<script> alert('Signature size is too large .'); </script>";
            }
            else {
                $newImgageName = uniqid();
                $newImgageName .= '.' . $imageExtension;
                move_uploaded_file($tmpName, 'img/' . $newImgageName);

                $new_Sign_Name = uniqid();
                $new_Sign_Name .= '.' . $signExtension;
                move_uploaded_file($tmp_signName, 'img/' . $new_Sign_Name);

                
                            if($password == $cpassword)
                            {
                                include 'database/voters_list.php';
                                   $sql =  "INSERT INTO `voters_list` ( `fname`, `lname`, `FatherName`, `MotherName`, `dob`, `number`, `gender`, `password`, `cpassword`, `email`, `cemail`, `street`, `street1`, `city`, `state`, `Assembly`, `zip`, `photo`, `sign`, `epic_no`, `vote`) 
                                   VALUES ( '$fname', '$lname', '$FatherName', '$MotherName', '$dob', '$number', '$gender', '$password', '$cpassword', '$email', '$email', '$street', '$street1', '$city', '$state', '$Assembly', '$zip', '$newImgageName', '$new_Sign_Name', '$Epic_no', '0')";
                                
                                $result = mysqli_query($conn , $sql);
                                    if($result == true){
                                        echo "<script>
                                        alert('DATA INSERTED');
                                        window.location.href='userpage.php';
                                        </script>";
                                        session_start();
                                        $_SESSION['fname'] = $fname;
                                        $_SESSION['email']= $email;
                                    }else
                                    {
                                        
                                        echo "<script>
                                        alert('DATA insertion failed');
                                        window.location.href='voter_registration.php';
                                        </script>";
                                        session_start();
                                        $_SESSION['fname'] = $fname;
                                        $_SESSION['email']= $email;
                                    }
                                
                                
                            }       
                            else{
                                echo "<script>
                                alert('DATA NOT INSERTED');
                                window.location.href='voter_registration.php'
                                </script>";
                                
                            }

                        } //end of password line..
                        
                    
            }

            
        }



    // photo and signature end line----

 

?>



<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/css/style.css">


    <link rel="icon" href="assets/img/tittle.png" type="image/icon type">

    <title>Voter Registration | </title>
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
</style>

<body>
    <div class="container">
        <?php require 'navbar.php' ?>
    </div>
    <div class="conatiner">
        <div class="row">
            <div class="col-md-2"></div>
            <div class="col-md-8 pl-1 pr-1 ml-1 form pb-4 mb-4 mt-4"
                style="border:1px solid #006492; border-radius: 5px;">
                <h6 class="pt-3 pb-3 pl-3 pr-3" style="background-color:#006492; color:#fff;">
                    Please provide the following information to registered.

                </h6>

                <form action="/voting/voter_registration.php" method="POST" enctype="multipart/form-data"
                    autocomplete="off">
                    <div class="form-group">
                        <br>
                        <h6>Voter information</h6>
                        <hr style="border: 1px solid #006492;
                                border-radius: 1px;">
                        <label for="text" class="pl-5 mr-5 pt-4"><b style="color:red">*</b>First-Name</label>
                        <input type="text" class="input" name="fname" required>

                        <label for="text" class="pl-5 mr-5 pt-4"><b
                                style="color:red">*</b>last-Name</label>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
                        <input type="text" class="input" name="lname" required>
                    </div>

                    <div class="form-group">
                        <label for="text" class="pl-5 mr-4"><b style="color:red">*</b>FatherName</label>&nbsp&nbsp&nbsp
                        <input type="text" class="input" name="FatherName" required>

                        <label for="text" class="pl-5 mr-5"><b
                                style="color:red">*</b>MotherName</label>&nbsp&nbsp&nbsp&nbsp
                        <input type="text" class="input" name="MotherName" required>
                    </div>

                    <div class="form-group">
                        <label for="date" class="pl-5 mr-4"><b style="color:red">*</b>Date-of-birth</label>&nbsp
                        <input type="date" class="input" name="dob" required>

                        <label for="text" class="pl-5 mr-5"><b style="color:red">*</b>Phone Number</label>&nbsp
                        <input type="text" class="input" name="number" value="<?php echo $fetchNumber; ?>" disabled>
                    </div>


                    <div class="form-group">
                        <label for="Email" class="pl-5 mr-4"><b
                                style="color:red">*</b>Email</label>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
                        <input type="Email" class="input" name="email" value="<?php echo $fetchEmail; ?>" disabled>

                        <label for="Email" class="pl-5 mr-5"><b style="color:red">*</b>Confirm
                            Email</label>&nbsp&nbsp&nbsp
                        <input type="Email" class="input" name="cemail" value="<?php echo $fetchEmail; ?>" disabled>
                    </div>

                    <div class="form-group">
                        <label for="password" class="pl-5 mr-5"><b style="color:red">*</b>Password</label>&nbsp&nbsp
                        <input type="password" class="input" name="password" required>
                        <div class="valid-feedback">
                            Looks good!
                        </div>

                        <label for="cpassword" class="pl-5 mr-4"><b style="color:red">*</b>Confirm
                            password</label>&nbsp&nbsp
                        <input type="password" class="input" name="cpassword" required>
                        <div class="valid-feedback">
                            Looks good!
                        </div>
                    </div>




                    <div class="form-group">
                        <label for="Email" class="pl-5 mr-5"><b style="color:red">*</b>
                            Gender</label>&nbsp&nbsp&nbsp&nbsp
                        <select class="form-select mb-3 input" aria-label="Default select example" name="gender">
                            <option selected>Gender</option>
                            <option value="Male">Male</option>
                            <option value="Female">Female</option>
                            <option value="Other">Other</option>
                        </select>
                    </div>
                    <br>
                    <h6>Residence Address</h6>
                    <hr style="border: 1px solid #006492;
                                border-radius: 1px;">

                    <div class="form-group">
                        <label for="text" class="pl-5 mr-4"><b
                                style="color:red">*</b>Street</label>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
                        <input type="text" class="input" name="street" required>

                        <label for="text" class="pl-5 mr-5"><b style="color:red">*</b>Street2</label>&nbsp&nbsp&nbsp
                        <input type="text" class="input" name="street1" required>
                    </div>

                    <div class="form-group">
                        <label for="text" class="pl-5 mr-5"><b
                                style="color:red">*</b>City</label>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
                        <input type="text" class="input" name="city" required>

                        <label for="text" class="pl-5 mr-5"><b
                                style="color:red">*</b>State</label>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
                        <select class="form-select input" aria-label="Default select example" name="state" required>
                            <option selected>choose State</option>
                            <option value="Andaman & Nicobar Islands"><a href="https://www.ceoandaman.nic.in/election/">
                                    Andaman & Nicobar Islands </a></option>
                            <option value="Arunachal Pradesh"><a
                                    href="https://ceoandhra.nic.in/ceoap_new/ceo/index.html">Arunachal Pradesh</a>
                            </option>
                            <option value="Andhra Pradesh"><a href="http://ceoarunachal.nic.in/">Andhra Pradesh</a>
                            </option>
                            <option value="Assam"><a href="https://ceoassam.nic.in/">Assam</a></option>
                            <option value="Bihar"><a href="https://ceobihar.nic.in/">Bihar</a></option>
                            <option value="Chandigarh"><a href="https://ceochandigarh.gov.in/en">Chandigarh</a></option>
                            <option value="Chhattisgarh"><a href="https://ceochhattisgarh.nic.in/">Chhattisgarh</a>
                            </option>
                            <option value="Goa"><a href="https://ceogoa.nic.in/">Goa</a></option>
                            <option value="Gujarat"><a href="https://ceo.gujarat.gov.in/">Gujarat</a></option>
                            <option value="Haryana"><a href="https://ceoharyana.gov.in/">Haryana</a></option>
                            <option value="Himachal Pradesh"><a href="https://ceohimachal.gov.in/">Himachal Pradesh</a>
                            </option>
                            <option value="Jharkhand"><a href="https://ceo.jharkhand.gov.in/">Jharkhand</a></option>
                            <option value="Karnataka"><a href="https://ceo.karnataka.gov.in/">Karnataka</a></option>
                            <option value="Kerala"><a href="http://www.ceo.kerala.gov.in/">Kerala</a></option>
                            <option value="Madhya Pradesh"><a href="https://ceomadhyapradesh.nic.in/">Madhya Pradesh</a>
                            </option>
                            <option value="Maharashtra"><a href="https://ceo.maharashtra.gov.in/">Maharashtra</a>
                            </option>
                            <option value="Manipur"><a href="https://ceomanipur.nic.in/">Manipur</a></option>
                            <option value="Meghalaya"><a href="http://ceomeghalaya.nic.in/">Meghalaya</a></option>
                            <option value="Mizoram"><a href="https://ceo.mizoram.gov.in/">Mizoram</a></option>
                            <option value="Nagaland"><a href="https://ceo.nagaland.gov.in/">Nagaland</a></option>
                            <option value="Odisha"><a href="https://ceoodisha.nic.in/">Odisha</a></option>
                            <option value="Punjab"><a href="https://www.ceopunjab.gov.in/">Punjab</a></option>
                            <option value="Rajasthan"><a href="https://ceorajasthan.nic.in/">Rajasthan</a></option>
                            <option value="Sikkim"><a href="https://ceosikkim.nic.in/">Sikkim</a></option>
                            <option value="Tamil Nadu"><a href="https://www.elections.tn.gov.in/">Tamil Nadu</a>
                            </option>
                            <option value="Telangana"><a href="https://ceotelangana.nic.in/">Telangana</a></option>
                            <option value="Tripura"><a href="https://ceotripura.nic.in/">Tripura</a></option>
                            <option value="Uttar Pradesh"><a href="http://ceouttarpradesh.nic.in/">Uttar Pradesh</a>
                            </option>
                            <option value="Uttrahand"><a href="https://ceo.uk.gov.in/">Uttrahand</a></option>
                            <option value="West Bengal"><a href="http://ceowestbengal.nic.in/">West Bengal</a></option>
                        </select>
                    </div>

                    <div class="form-group">

                        <label for="text" class="pl-5 mr-5"><b style="color:red">*</b>Assembly</label>&nbsp&nbsp&nbsp
                        <input type="text" class="input" name="Assembly" required>

                        <label for="number" class="pl-5 mr-4"><b
                                style="color:red">*</b>Zip</label>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
                        <input type="number" class="input" name="zip" required>
                    </div>

                    <br>
                    <h6>Upload Your documents :</h6>
                    <hr style="border: 1px solid #006492;
                                border-radius: 1px;">
                    <p><b style="color:red">*</b> jpeg , jpg , png format only supported with 1Mb</p>
                    <div class="form-group">
                        <label class="pl-3 mr-2">Photo :</label>
                        <input type="file" name="photo" id="photo" accept=".jpeg, .jpg, .png" required>

                        <label class="pl-3 mr-2"> Signature :</label>
                        <input type="file" name="sign" id="photo" accept=".jpeg, .jpg, .png" required>
                    </div>


                    <div class="form-group">
                        <label class="form-check-label pl-5 mr-5"><input type="checkbox"> Remember me</label>
                    </div>
                    &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
                    &nbsp&nbsp&nbsp

                    <button type="submit" class="btn btn-success input">Sign in</button>

                </form>
                <br>
                <div class="col-lg-12">
                    <div class="info pt-2 pb-2 pr-2 pl-2" style="border: 2px solid rgb(131, 28, 28);">
                        <h6 style="text-align: center" ;><b><u>कृपया नोट करे/ Kindly note that :</u></b></h6>
                        <p>1.e-एक चुनाव के लिये पहचान पत्र है।</p>
                        <p>2. एचिक रखना मतदाता सूची में नाम दर्ज होने की गारंटी नहीं है, कृपया प्रत्येक चुनाव से पहले
                            मतदाता सूची में अपना नाम दर्ज होने से संबंधित कर लें कृपया www.nvsp.in पर जाएँ।</p>
                        <p>3. इस कार्य में लिखित जन्मतिथि को मतदाता सूची में पंजीकरण के अलावा अन्य किसी भी उद्देश्य के
                            लिए आयु या जन्म तिथि प्रमाण के लिए नहीं माना जाएगा।</p>
                        <p>4. जब तक आप का नाम भारत की किसी भी विधानसभा निर्वाचन क्षेत्र की मतदाता सूची में दर्ज है, एपिक
                            सम्पूर्ण देश में मान्य है। </p>
                        <p>5. एपिक का प्रमाणिक एवं सुरक्षित QR कोड रीडर एप्लीकेशन का प्रयोग कर सत्यापित किया जा सकता है।
                        </p>
                        <p> 6. यह इलेक्ट्रॉनिकली जेनरेटेड दस्तावेज है।</p>
                        <br>
                        <p>1. e-EPIC is a proof of identity for the purpose of an election. </p>
                        <p> 2. Mere possession of EPIC is no guarantee of name being present in electoral roll. Please
                            check your name in the current electoral roll before every election. Kindly visit
                            www.nvsp.in.</p>
                        <p>3. Date of birth mentioned in this card shall not be treated as proof of age or date of birth
                            for any purpose other than registration in electoral roll</p>
                        <p>4. e-EPIC is valid throughout the country, till you are enrolled in electoral roll for any
                            constituency in India.</p>
                        <p>5. e-EPIC can be verified using authentic and secure QR code reader application 6. This is
                            electronically generated document.</p>
                    </div>
                </div>

            </div>


        </div>
    </div>


    <?php require 'footer.php' ?>
</body>

</html>