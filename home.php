<?php
// We need to use sessions, so you should always start sessions using the below code.
session_start();
// If the user is not logged in redirect to the login page...
if (!isset($_SESSION['loggedin']) || (time() - $_SESSION['CREATED']) > 7200) {
	header('Location: logout.php');
	exit;
}
?>
<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="utf-8" />
  		<title>Viamonde 2022</title>
    	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css">
    	<link href="main.css" rel="stylesheet" type="text/css">
	</head>
    <body class="loggedin">
    	<nav class="navtop">
			<div>
				<h1>Viamonde 2022</h1>
            	<a href="#"><i class="fas fa-user-circle"></i><?=$_SESSION['name']?></a>
				<a href="logout.php"><i class="fas fa-sign-out-alt"></i>Déconnexion</a>
			</div>
		</nav>
	</body>
</html>
