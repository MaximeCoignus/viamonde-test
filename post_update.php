<?php

if (empty($_POST['title']) || empty($_POST['content'])) {
    echo 'Veuillez enter un titre et du contenu.';
    return;
}

$id = $_POST['id'];
$title = $_POST['title'];
$content = $_POST['content'];

include("db_link.php");

$updateStatement = $bdd->prepare('UPDATE posts SET title = :title, content = :content WHERE id = :id');
$updateStatement->execute([
    'title' => $title,
    'content' => $content,
    'id' => $id,
]);

header('Location: blog.php');

?>

