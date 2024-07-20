<?php
include_once '../includes/functions.php';
include_once '../includes/header.php';
$posts = getPosts();
?>

<main>
    
    <div class="pricing-header p-3 pb-md-4 mx-auto text-center">
      <h1 class="display-4 fw-normal text-body-emphasis">Welcome, <?= $_SESSION['user']['username'] ?></h1>
    </div>
    <div class="row row-cols-1 row-cols-md-3 mb-3 text-center">

    <?php foreach ($posts as $post): ?>
      <div class="col">
        <div class="card mb-4 rounded-3 shadow-sm">
          <div class="card-header py-3">
            <h4 class="my-0 fw-normal"><?= $post['title'] ?></h4>
          </div>
          <div class="card-body">
            <ul class="list-unstyled mt-3 mb-4">
              <li><?= substr($post['content'], 0, 120) ?>...</li>
              <li>By @<a class="link-primary text-decoration-none" href="#"><?= $post['username'] ?></a></li>
              <li>On <?= $post['created_at'] ?></li>
            </ul>
            <a href="post.php?id=<?= $post['id'] ?>" class="w-100 btn btn-md btn-outline-primary">Read more</a>
          </div>
        </div>
      </div>   
      <?php endforeach; ?>    
      
    </div>

<?php include_once '../includes/footer.php'; ?>