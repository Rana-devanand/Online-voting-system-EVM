<?php

if($_SERVER["REQUEST_METHOD"] == "POST")
{
    if($_FILES["photo"]["error"] === 4)
    {
        echo "<script> alert('image not exist'); </script>";
    }
    else
    {
        $filename = $_FILES["photo"]["name"];
        $filesize = $_FILES["photo"]["size"];
        $tmpName = $_FILES["photo"]["tmp_name"];
            
        echo $filename.$filesize.$tmpName;
    
    }
}
   
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
        <form action="/voting/qrcode.php" method="POST" enctype="multipart/form-data">
        file : <input type="file" name="photo" id="photo">
        <button type="submit">Submit</button>
        </form>
</body>
</html>