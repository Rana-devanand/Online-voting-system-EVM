<?php

    session_start();

    unset($_SESSION['password']);

    header("location: electionResult.php");

?>

