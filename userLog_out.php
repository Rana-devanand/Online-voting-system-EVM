<?php

    session_start();

    unset($_SESSION['fname']);
    // session_destroy();
    echo '
        <script>
        alert("You are successfully Logout .");
        </script>';
    header("location: index.php");
    // exit;

?>

