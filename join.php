<?php

session_start();
require_once 'config.php';

if(isset($_POST['signup'])){
    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
    $role = $_POST['role'];

    $checkEmail = $conn->query("SELECT email FROM users WHERE email = '$email'");
    if($checkEmail->num_rows > 0) {
        $_SESSION['signup_error'] = 'Email already exists';
        $_SESSION['active_form'] = 'signup';
    }else{
        $conn->query("INSERT INTO users (name, email, password, role) VALUES ('$name','$email','$password','$role')");
    }

    header("location: index.php");
    exit();
}
if(isset($_POST['login'])){
    $email = $_POST['email'];
    $password = $_POST['password'];

    $result = $conn->query("SELECT * FROM users WHERE email = '$email'");
    if($result->num_rows > 0) {
        $users = $result->fetch_assoc();
        if(password_verify($password, $users['password'])) {
            $_SESSION['name'] = $users['name'];
            $_SESSION['email'] = $users['email'];

            if($users['role'] === 'admin'){
                header("location: admin_page.php");
            }else{
                header("location: user_page.php");
            }
            exit();
        }
    }
    $_SESSION['login_error'] = 'Incorrect email or password';
    $_SESSION['active_form'] = 'login';
    header("location: index.php");
    exit();
}
?>