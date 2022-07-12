<?php

    include("db_link.php");

    $username = $_POST['login'];
    $password = $_POST['password'];
    $hash = password_hash($password, PASSWORD_DEFAULT);

    $stmt = $bdd->prepare('insert into users set login=?, password=?');
    $stmt->execute([$username, $hash]);
?>