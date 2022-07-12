<?php

if (empty($_POST['title']) || empty($_POST['content'])) {
    echo 'Veuillez enter un titre et du contenu.';
    return;
}

$title = $_POST['title'];
$content = $_POST['content'];

include("db_link.php");

$insertStatement = $bdd->prepare('INSERT INTO posts(title, content) VALUES (:title, :content)');
$insertStatement->execute([
    'title' => $title,
    'content' => $content
]);

header('Location: blog.php')

?>

