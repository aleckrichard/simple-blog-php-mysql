<?php
include_once("../config/db.php");

function registerUser($username, $email, $password) {
    global $pdo;
    $passwordHash = password_hash($password, PASSWORD_BCRYPT);
    $stmt = $pdo->prepare("INSERT INTO users (username, email, password) VALUES (?,?,?)");
    return $stmt->execute([$username, $email, $passwordHash]);
}

function createPost($userId, $title, $content){
    global $pdo;
    $stmt = $pdo->prepare("INSERT INTO posts (user_id, title, content) VALUES (?,?,?)");
    return $stmt->execute([$userId, $title, $content]);
}

function getPosts(){
    global $pdo;
    $stmt = $pdo->prepare("SELECT posts.id, posts.title, posts.created_at, posts.content, users.username FROM posts INNER JOIN users ON users.id = posts.user_id");
    $stmt->execute();
    if($stmt->rowCount() > 0){
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }    
    return false;
}

function getPostById($postId) {
    global $pdo;
    $stmt = $pdo->prepare("SELECT posts.id, posts.title, posts.created_at, posts.content, users.username FROM posts INNER JOIN users ON users.id = posts.user_id WHERE posts.id = ?");
    $stmt->execute([$postId]);
    if($stmt->rowCount() > 0){
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }    
    return false;
}

function updatePost($postId, $title, $content){
    global $pdo;
    $stmt = $pdo->prepare("UPDATE posts SET title = ?, content = ? WHERE id = ?");
    return $stmt->execute([$title, $content, $postId]);
}

function createComment($userId, $postId, $content){
    global $pdo;
    $stmt = $pdo->prepare("INSERT INTO comments (user_id, post_id, content) VALUES (?,?,?)");
    return $stmt->execute([$userId, $postId, $content]);
}

function getComments($postId) {
    global $pdo;
    $stmt = $pdo->prepare("SELECT comments.*, users.username FROM comments JOIN users ON comments.user_id = users.id WHERE post_id = ? ORDER BY created_at DESC");
    $stmt->execute([$postId]);
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}

function loginUser($username, $password) {
    global $pdo;
    $stmt = $pdo->prepare("SELECT * FROM users WHERE username = ?");
    $stmt->execute([$username]);
    $user = $stmt->fetch(PDO::FETCH_ASSOC);
    if ($user && password_verify($password, $user['password'])) {
        return $user;
    }
    return false;
}
