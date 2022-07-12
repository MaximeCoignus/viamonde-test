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
            	<h1>Modifier l'article</h1>
        		<form class="login-form" method="post" action="post_update.php">
					<input type="hidden" name="id" value="<?php echo($post['id']) ?>">
      				<?php echo '<input type="text" name="title" value="' . $post['title'] . '" placeholder="Titre"/>' ?><br/>
      				<textarea id="content" name="content" rows="4" cols="50"><?php echo($post['content']) ?></textarea><br/>
      				<input class="button" type="submit" value="Modifier" />
    			</form>
                <a href="blog.php">Retour</a>
  			</div>
    	</div>
    </body>
</html>
