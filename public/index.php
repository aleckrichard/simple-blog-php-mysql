<?php
include_once '../includes/functions.php';
include_once '../includes/header.php';
$posts = getPosts();
?>



<?php foreach ($posts as $post): ?>
    <h2><a href="post.php?id=<?= $post['id'] ?>"><?= $post['title'] ?> </a></h2>
    <p>By <?= $post['username'] ?> <br> On <?= $post['created_at'] ?></p>
    <p><?= substr($post['content'], 0, 100) ?>...</p>
<?php endforeach; ?>