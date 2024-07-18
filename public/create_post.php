<?php
include_once '../includes/functions.php';
include_once '../includes/header.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST'){
    $title = $_POST['title'];
    $content = $_POST['content'];
    if (createPost($_SESSION['user']['username'], $title, $content)){
        header('Location: create_post.php');
        exit;
    }else{
        echo "Error creating post";
    }
}
?>
<form method="post" action="create_post.php">
<input type="text" name="title" placeholder="Title" required>
<textarea name="content" placeholder="content" required></textarea>
<button type="submit">Create Post</button>
</form>

