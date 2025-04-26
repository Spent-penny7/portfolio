<?php

session_start();

$errors = [
  'login' => $_SESSION['login_error'] ?? '',
  'signup' => $_SESSION['signup_error'] ?? ''
];
$activeForm = $_SESSION['active_form'] ?? 'login';

session_unset();

function showError($error) {
  return !empty($error) ? "<p class='error-message'>$error</p>" : '';
}

function isActiveForm($formName, $activeForm) {
  return $formName === $activeForm ? 'active' : '';
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>login_signup page</title>
    <link rel="stylesheet" href="styleP.css">
</head>
<body>
    <div class="container">
        <div class="form-box <?= isActiveForm('login', $activeForm); ?>" id="login-form">
           <form action="join.php" method="post">
             <h2>Login</h2>
             <?= showError($errors['login']); ?>
             <input type="email" name="email" placeholder="Email" required>
             <input type="password" name="password" placeholder="Password" required>
             <button type="submit" name="login">Login</button>
             <p>Don't have an account? <a href="#" onclick="showForm('signup-form')">Signup</a></p>
           </form>
</div>

        <div class="form-box <?= isActiveForm('signup', $activeForm); ?>" id="signup-form">
            <form action="join.php" method="post">
              <h2>Signup</h2>
              <?= showError($errors['signup']); ?>
              <input type="text" name="name" placeholder="Username" required>
              <input type="email" name="email" placeholder="Email" required>
              <input type="password" name="password" placeholder="Password" required>
              <select name="role" id=""required>
                <option value="">--Select Role--</option>
                <option value="admin">Admin</option>
                <option value="user">User</option>
              </select>
              <button type="submit" name="signup">Signup</button>
              <p>Already have an account? <a href="#" onclick="showForm('login-form')">Login</a></p>
            </form>
         </div>
    </div>
    <script src="script.js"></script>
</body>
</html>