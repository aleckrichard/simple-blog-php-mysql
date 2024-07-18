<?php
include_once '../includes/functions.php';
include_once '../includes/header.php';

$postId = $_GET['id'];
$post = getPostById($postId)[0];
$comments = getComments($postId);

if($_SERVER['REQUEST_METHOD'] == 'POST'){
    $content = $_POST['content'];

    if (createComment($_SESSION['user']['id'], $postId, $content)) {
        header("Location: post.php?id=$postId");
        exit;
    } else {
        echo 'Error to create comment';
    }
    
}
?>


<h2><?= $post['title'] ?></h2>
<p>by <?= $post['username'] ?> on <?= $post['created_at'] ?></p>
<p><?= $post['content'] ?></p>

<hr>
<h3>Comments</h3>
<?php foreach ($comments as $comment): ?>
    <p><strong><?= $comment['username'] ?>:</strong> <?= $comment['content'] ?></p>
<?php endforeach; ?>
<hr>

<form method="POST">
<textarea name="content" placeholder="content" required></textarea>
<button type="submit">Comment</button>
</form>