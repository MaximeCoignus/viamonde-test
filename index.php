<?php

	// We need to use sessions, so you should always start sessions using the below code.
	session_start();
	// If the user is logged in redirect to the blog page...
	if (isset($_SESSION['loggedin']) && (time() - $_SESSION['CREATED']) <= 7200) {
		header('Location: blog.php');
		exit;
	}

?>
<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="utf-8" />
    	<link href="main.css" rel="stylesheet" type="text/css">
        <title>Viamonde 2022</title>
    </head>
    <body>
    	<div class="form">
			<form method="post" action="login_confirmation.php">
				<div class="container">
					<h1>Bienvenue sur le blog de Viamonde</h1>
					<p>Veuillez renseigner vos identifiants</p>
					<hr>

					<label for="login"><b>Nom d'utilisateur</b></label>
					<input type="text" placeholder="Nom d'utilisateur" name="login" id="login">

					<label for="password"><b>Mot de passe</b></label>
					<input type="password" placeholder="Mot de passe" name="password" id="password">

					<button type="submit" class="registerbtn">Connexion</button>
				</div>
			</form>
    	</div>
    </body>
</html>
