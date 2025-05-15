

<?php session_start(); ?>
<!DOCTYPE html>
<html>

<head>
   <title>Login Admin</title>
   <link rel="stylesheet" href="/blog/css/style.css">
   <style>
.login-bg {
    min-height: 100vh;
    background: linear-gradient(135deg, #FF7300 0%, #FFD900 100%);
    display: flex;
    align-items: center;
    justify-content: center;
}

.login-container {
    background: #fff;
    padding: 32px 32px 24px 32px;
    border-radius: 12px;
    box-shadow: 0 8px 32px 0 rgba(31, 38, 135, 0.15);
    min-width: 340px;
    text-align: center;
}

.login-container h2 {
    margin-bottom: 24px;
    color: #ff9800;
}

.login-container form {
    display: flex;
    flex-direction: column;
    gap: 12px;
}

.login-container input[type="text"],
.login-container input[type="password"] {
    padding: 10px;
    border: 1px solid #ddd;
    border-radius: 6px;
    font-size: 16px;
}

.login-container input[type="submit"] {
    background: #ff9800;
    color: #fff;
    border: none;
    padding: 10px;
    border-radius: 6px;
    font-size: 16px;
    cursor: pointer;
    font-weight: bold;
    margin-top: 10px;
    transition: background 0.2s;
}

.login-container input[type="submit"]:hover {
    background: #FF7300;
}
</style>
</head>

<body class="login-bg">
   <div class="login-container">
      <h2>Login Admin</h2>
      <form method="POST" action="../auth/proses_login.php">
         <label>Username:</label>
         <input type="text" name="username" required>
         <label>Password:</label>
         <input type="password" name="password" required>
         <input type="submit" value="Login">
      </form>
      <?php if (isset($_SESSION['error'])): ?>
         <p style="color:red; text-align:center;">
            <?php echo $_SESSION['error'];
            unset($_SESSION['error']); ?>
         </p>
      <?php endif; ?>
   </div>
</body>

</html>