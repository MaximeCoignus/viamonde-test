<?php

include_once("session_verification.php");

if (empty($_POST['id'])) {
    echo 'Un identifiant est nécessaire pour supprimer cet article.';
    return;
}

$id = $_POST['id'];

include_once("db_link.php");

$updateStatement = $bdd->prepare('DELETE FROM posts WHERE id = :id');
$updateStatement->execute([
    'id' => $id,
]);

header('Location: blog.php');

?>

