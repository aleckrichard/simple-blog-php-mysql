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
<main>

<article class="blog-post">
        <h2 class="display-5 link-body-emphasis mb-1"><?= $post['title'] ?></h2>
        <p class="blog-post-meta"><?= $post['created_at'] ?> by <a href="#">@<?= $post['username'] ?> </a></p>
        <p><?= $post['content'] ?></p>
      </article>
<hr>

<div class="my-3 p-3 bg-body rounded shadow-sm">
    <h6 class="border-bottom pb-2 mb-0">Comments</h6>
    <?php foreach ($comments as $comment): ?>
    <div class="d-flex text-body-secondary pt-3">
      <svg class="bd-placeholder-img flex-shrink-0 me-2 rounded" width="32" height="32" xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder: 32x32" preserveAspectRatio="xMidYMid slice" focusable="false"><title>Placeholder</title><rect width="100%" height="100%" fill="<?= getRandomColor() ?>"></rect></svg>
      <p class="pb-3 mb-0 small lh-sm border-bottom">
        <strong class="d-block text-gray-dark">@<?= $comment['username'] ?></strong>
        <?= $comment['content'] ?>
      </p>
    </div>
    <?php endforeach; ?>
    <small class="d-block text-end mt-3">
      <a href="#">All comments</a>
    </small>
  </div>
<hr>


<form class="needs-validation" method="post">

            <div class="col-md-12">
              <label class="form-label">Comment</label>
              <textarea name="content" class="form-control" required></textarea>
              <div class="invalid-feedback">
              Comment is required
              </div>
            </div>
            <hr class="my-4">
            <button class="btn btn-primary btn-md" type="submit">Comment</button>
</form>
  </main>

<?php include_once '../includes/footer.php'; ?>