<?php 
session_start();
if(!$_SESSION['fname']){
    header("location: userLogin.php");
}

$name =$_SESSION['fname'];
$UserEmail = $_SESSION['email'];
?>
<?php 
    require "database/voters_list.php";
    $sql = "SELECT * FROM `voters_list` WHERE email = '$UserEmail' And fname='$name'" ;
    $query_run = mysqli_query($conn , $sql);
    $result = mysqli_num_rows($query_run);
    if($result == 1)
    {
        $fetch_data = mysqli_fetch_assoc($query_run);
        $image = $fetch_data['photo'];
        $sign = $fetch_data['sign'];
        $epic_no = $fetch_data['epic_no'];
        $dob = $fetch_data['dob'];
        $fathername = $fetch_data['FatherName'];
        $MotherName = $fetch_data['MotherName'];
        $street = $fetch_data['street'];
        $street1 = $fetch_data['street1'];
        $city = $fetch_data['city'];
        $state = $fetch_data['state'];
        $assemble = $fetch_data['Assembly'];
        $zip = $fetch_data['zip'];
        $gender = $fetch_data['gender'];

        $s_no = substr($epic_no,4,-2);
        $AC_no = substr($epic_no,8,9);

    }

?>



<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="icon" href="assets/img/tittle.png" type="image/icon type">

    <title>Welcome | <?php echo $name ;?></title>
</head>
<style>
p,
h6,
b {
    font-style: arial;
}

.form {
    align-items: center;
    border: 1px solid #000000;
    border-radius: 5px;
}

b {
    text-align: center;
    align-items: center;
}

.header p {
    font-size: 20px;
    font-weight: 800;
    font-family: arial;
}

.info p {
    font-size: 12px;
}

.btn {
    position: absolute;
    right: 12px;
}
</style>

<body onload="qrcodevalue()">

    <div class="container">
        <?php include "navbar/userNav.php" ?>
    </div>
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-1"></div>

            <div class="col-md-10 header"
                style="border: 1px solid #000 ; border-radius: 5px ; background-color: rgb(215, 252, 243);">
                <img src="assets/img/Emblem_of_India.svg" class="rounded float-left" alt="..." width="50px"
                    height="50px">
                <img src="assets/img/logo.png" class="rounded float-right" alt="..." width="50px" height="50px">
                <p class="text-center pb-2">Election Commission of India</p>
                <hr style="border: 1px solid #000;border-radius: 5px;">
                <p class="text-center">भारत निर्वाचन आयोग</p>

                <!-- // header close  -->
                <br>
                <!-- 2nd row start  -->
                <div class="col-lg-8">

                    <h6 class="text-left" id="epic_no"><b>Epic-no :</b> <?php echo $epic_no; ?></h6>
                    <img src="img/<?php echo $image;?>" class="rounded float-left" alt="..." width="150px"
                        height="180px">
                    <h6 class="text-left" id="name"><b>Name :</b><?php echo $name; ?></h6>
                    <h6 class="text-left" id="fathername"><b>FatherName :</b> <?php echo $fathername; ?></h6>
                    <h6 class="text-left" id="MotherName"><b>MotherName :</b> <?php echo $MotherName ; ?></h6>
                    <h6 class="text-left" id="dob"><b>Date-of-birth :</b><?php echo $dob ; ?></h6>
                    <h6 class="text-left" id="gender"><b>Gender :</b><?php echo $gender ; ?></h6>
                    <h6 class="text-left" id="Street"><b>Address
                            :</b><?php echo $street." ".$street1." ".$city;echo ", "; echo $state."  ".$zip ?></h6>
                    <br>
                    <h6 class="text-left"><b>Digital Signature </b></h6> <img src="img/<?php echo $sign;?>"
                        class="rounded float-left" alt="..." width="250px" height="100px">
                </div>

                <div class="qrcodeGenerator">
                    <div id="qrcode" class="text-top text-right" download></div>
                    <!-- <input type="text" name="" id="" value=""> -->
                </div>

                <hr style="border: 2px solid green;border-radius: 5px;">
                <br>
                <h6>मतदाता पहचान पत्र संख्या / EPIC No.: <?php echo $epic_no; ?></h6><br>
                <h6>मतदाता क्रमांक / Serial number : <?php echo $s_no ; ?></h6><br>
                <h6> विधानसभा निर्वाचन क्षेत्र संख्या व नाम : <?php echo $AC_no;  ?><br> Assembly Constituency No. and
                    Name :<?php echo $AC_no;  ?></h6> <br>
                <h6>मतदान केंद्र का पता :
                    <br> Polling Station Address :
                    <?php echo $street." ".$street1." ".$city;echo ", "; echo $state."  ".$zip?>
                </h6>




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
                    <p> 5. e-EPIC can be verified using authentic and secure QR code reader application 6. This is
                        electronically generated document.</p>
                </div>

                <div class="padding mt-3 mb-4 py-4">
                    <button class="btn btn-primary " onclick="window.print()">Print</button>
                </div>

            </div> <!-- middle col exit  -->

            <div class="col-md-1"></div>
        </div>
    </div>

    <?php include "footer.php" ?>


    <script>
    function qrcodevalue() {
        var name = document.getElementById("name").textContent;
        var epic_no = document.getElementById("epic_no").textContent;
        var dob = document.getElementById("dob").textContent;
        var fathername = document.getElementById("fathername").textContent;
        var MotherName = document.getElementById("MotherName").textContent;

        console.log(name + epic_no + dob + fathername + MotherName);

        var url = `https://chart.googleapis.com/chart?cht=qr&chs=200x200&chl=`

            +
            name + "%0a" +
            epic_no + "%0a" +
            fathername + "%0a" +
            MotherName;

        var ifr = `<img src="${url}" height="180" width="180">`;
        document.getElementById('qrcode').innerHTML = ifr;
    }

    // Script.js 
    // create a new QRCode instance 
    </script>

</body>

</html>