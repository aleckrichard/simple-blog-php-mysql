<?php
include_once '../includes/functions.php';
session_start();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];
    $user = loginUser($username, $password);
    if ($user) {
        $_SESSION['user'] = $user;
        header('Location: index.php');
        exit;
    } else {
        echo "Invalid login credentials.";
    }
}
?>

<form method="post" action="login.php">
    <input type="text" name="username" placeholder="Username" required>
    <input type="password" name="password" placeholder="Password" required>
    <button type="submit">Login</button>
</form>