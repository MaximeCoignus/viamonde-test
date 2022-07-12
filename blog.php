<?php

    // We need to use sessions, so you should always start sessions using the below code.
    session_start();
    // If the user is not logged in redirect to the login page...
    if (!isset($_SESSION['loggedin']) || (time() - $_SESSION['CREATED']) > 7200) {
        header('Location: logout.php');
        exit;
    }
    
    include("db_link.php");

    $postsStatement = $bdd->prepare('SELECT * FROM posts');
    $postsStatement->execute();
    $posts = $postsStatement->fetchAll();

    function get_posts(array $posts) : array
    {
        $valid_posts = [];
        $counter = 0;

        foreach($posts as $post) {
            $valid_posts[] = $post;
            $counter++;
        }

        return $valid_posts;
    }
?>

<!DOCTYPE html>
<html lang="fr">
<head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1">
  		<title>Viamonde 2022</title>
    	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css">
    	<link href="main.css" rel="stylesheet" type="text/css">
</head>
<body>

<div class="header">
  <h2>Le blog test de Viamonde</h2>
  <a href="#"><i class="fas fa-user-circle"></i>Bienvenue <?=$_SESSION['name']?></a>
  <a href="logout.php"><i class="fas fa-sign-out-alt"></i>Logout</a>
</div>

<div class="row">
  <div class="leftcolumn">
    <?php foreach(get_posts($posts) as $post) : ?>
        <div class="card">
            <h2><?php echo($post['title']) ?></h2>
            <h5>Créé le <?php echo($post['date']) ?></h5>
            <p><?php echo($post['content']) ?></p>
            <?php echo '<a href="update.php?id=' . $post['id'] . '">Modifier</a>' ?>
            <?php echo '<a href="delete.php?id=' . $post['id'] . '">Supprimer</a>' ?>
        </div>
    <?php endforeach ?>
    <br/><a href="create.php">Publier</a>
  </div>
</div>

<div class="footer">
  <?php echo '<h2>Viamonde ' . date("Y") . '</h2>' ?>
</div>

</body>
</html>
