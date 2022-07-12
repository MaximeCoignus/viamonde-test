<?php
	include("db_link.php");

	if (empty($_GET['id'])) {
		echo('Il faut un identifiant pour modifier l\'article');
		return;
	}

	$retrieveArticleStatement = $bdd->prepare('SELECT * FROM posts WHERE id = :id');
	$retrieveArticleStatement->execute([
		'id' => $_GET['id'],
	]);

	$post = $retrieveArticleStatement->fetch(PDO::FETCH_ASSOC);
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
			<form method="post" action="post_delete.php">
				<div class="container">
					<h1>Supprimer l'article définitivement ?</h1>
					<hr>

					<input type="hidden" name="id" value="<?php echo($post['id']) ?>">

					<button type="submit" class="registerbtn">Confirmer</button>
				</div>
			</form>
    	</div>
    </body>
</html>
