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
    $stmt = $pdo->prepare("SELECT * FROM posts");
    $stmt->execute();
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
