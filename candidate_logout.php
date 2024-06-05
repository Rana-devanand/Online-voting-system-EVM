<?php

    session_start();

    unset($_SESSION['Cname']);
    // session_destroy();
    echo '
        <script>
        alert("You are successfully Logout .");
        </script>';
    header("location: Candidate_login.php");
    // exit;

?>

