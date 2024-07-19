<?php
include_once '../includes/functions.php';
include_once '../includes/header.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST'){
    $title = $_POST['title'];
    $content = $_POST['content'];
    if (createPost($_SESSION['user']['id'], $title, $content)){
        header('Location: create_post.php');
        exit;
    }else{
        echo "Error creating post";
    }
}
?>


<main>
<form class="needs-validation" method="post" action="create_post.php">

<div class="col-md-6">
              <label class="form-label">Title</label>
              <input type="text" class="form-control" name="title" placeholder="Title" required="">
              <div class="invalid-feedback">
              Title is required
              </div>
            </div>

            <div class="col-md-6">
              <label class="form-label">Content</label>
              <textarea name="content" class="form-control" placeholder="content" required></textarea>
              <div class="invalid-feedback">
              Content is required
              </div>
            </div>
            <hr class="my-4">
            <button class="btn btn-primary btn-lg" type="submit">Create Post</button>
</form>
  </main>

<?php include_once '../includes/footer.php'; ?>
