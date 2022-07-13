<?php
    // We need to use sessions, so you should always start sessions using the below code.
    session_start();
    // If the user is not logged in redirect to the login page...
    if (!isset($_SESSION['loggedin']) || (time() - $_SESSION['CREATED']) > 7200) {
        header('Location: logout.php');
        exit;
    }
?>