<?php 
	include_once("session_verification.php");
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
			<form method="post" action="post_create.php">
				<div class="container">
					<h1>Créer un nouvel article</h1>
					<hr>

					<label for="title"><b>Titre</b></label>
					<input type="text" placeholder="Il était une fois..." name="title" id="title">

					<label for="content"><b>Texte</b></label>
					<textarea id="content" name="content" rows="4" cols="50">Votre texte ici...</textarea><br/>

					<button type="submit" class="registerbtn">Publier</button>
				</div>
			</form>
    	</div>
    </body>
</html>
