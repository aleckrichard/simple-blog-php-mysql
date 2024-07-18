<?php
include_once '../includes/functions.php';
session_start();

$posts = getPosts();
?>

<?php if (isset($_SESSION['user'])): ?>
    <p>Welcome, <?= $_SESSION['user']['username'] ?> | <a href="create_post.php">Create Post</a> | <a href="logout.php">Logout</a></p>
<?php else: ?>
   <?php header('Location: login.php'); ?>
<?php endif; ?>

<?php foreach ($posts as $post): ?>
    <h2><a href="post.php?id=<?= $post['id'] ?>"><?= $post['title'] ?></a></h2>
    <p>by <?= $post['username'] ?> on <?= $post['created_at'] ?></p>
    <p><?= substr($post['content'], 0, 100) ?>...</p>
<?php endforeach; ?>