<?php
session_start();
if (isset($_SESSION['user'])): ?>
    <p><a href="index.php">Home</a> | Welcome, <?= $_SESSION['user']['username'] ?> | <a href="create_post.php">Create Post</a> | <a href="logout.php">Logout</a></p>
<?php else: ?>
   <?php header('Location: login.php'); ?>
<?php endif; ?>