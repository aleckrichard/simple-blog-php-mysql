<?php
include_once("../includes/functions.php");

if ($_SERVER['REQUEST_METHOD'] == 'POST'){
    $username = $_POST['username'];
    $password = $_POST['password'];
    $email = $_POST['email'];

    if(registerUser($username, $email, $password)){
        header('Location: register.php');
    }
    else{
        echo 'Error registering user';
    }
}

?>

<form method="POST" action="register.php";>
<input type="text" name="username" placeholder="User name" required>
<input type="password" name="password" required>
<input type="email" name="email" placeholder="Email" required>
<button type="submit">Register User</button>
</form>