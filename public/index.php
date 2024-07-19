<?php
include_once '../includes/functions.php';
include_once '../includes/header.php';
$posts = getPosts();
?>

<main>
    <div class="row row-cols-1 row-cols-md-3 mb-3 text-center">

    <?php foreach ($posts as $post): ?>
      <div class="col">
        <div class="card mb-4 rounded-3 shadow-sm">
          <div class="card-header py-3">
            <h4 class="my-0 fw-normal"><?= $post['title'] ?></h4>
          </div>
          <div class="card-body">
            <ul class="list-unstyled mt-3 mb-4">
              <li><?= substr($post['content'], 0, 100) ?>...</li>
              <li>By <?= $post['username'] ?></li>
              <li>On <?= $post['created_at'] ?></li>
            </ul>
            <a href="post.php?id=<?= $post['id'] ?>" class="w-100 btn btn-md btn-outline-primary">Read more</a>
          </div>
        </div>
      </div>   
      <?php endforeach; ?>    
      
    </div>

    <h2 class="display-6 text-center mb-4">Compare plans</h2>

 <?php    include_once '../includes/header.php'; ?>