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
    	<div class="login-page">
  			<div class="form">
            	<h1>Supprimer l'article définitivement ?</h1>
        		<form class="login-form" method="post" action="post_delete.php">
                    <input type="hidden" name="id" value="<?php echo($post['id']) ?>">
      				<input class="button" type="submit" value="Confirmer" />
    			</form>
                <a href="blog.php">Retour</a>
  			</div>
    	</div>
    </body>
</html>
