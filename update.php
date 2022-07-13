<?php
	
	include_once("session_verification.php");

	include_once("db_link.php");

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
			<form method="post" action="post_update.php">
				<div class="container">
					<h1>Modifier l'article</h1>
					<hr>

					<input type="hidden" name="id" value="<?php echo($post['id']) ?>">

					<label for="title"><b>Titre</b></label>
					<?php echo '<input type="text" name="title" value="' . $post['title'] . '" placeholder="Il était une fois..."/>' ?><br/>

					<label for="content"><b>Texte</b></label>
					<textarea id="content" name="content" rows="4" cols="50"><?php echo($post['content']) ?></textarea><br/>

					<button type="submit" class="registerbtn">Modifier</button>
				</div>
			</form>
    	</div>
    </body>
</html>
