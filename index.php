<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
  <div class="container">
    <div class="auth-form register">
      <h2>Register</h2>
      <form>    <!-- method="post" action="register.php"        -->
        <div class="form-group">
          <label for="username">Username:</label>
          <input type="text" id="username" name="username" required />
        </div>
        <!--<div class="form-group">
          <label for="email">Почта:</label>
          <input type="email" name="email" id="email" required />
        </div>-->
        <div class="form-group">
          <label for="password">Password:</label>
          <input type="password" id="password" name="password" required />
        </div>
        <button type="submit" id="register">Register</button>
      </form>
    </div>
    <div class="auth-form login">
      <h2>Login</h2>
      <form> <!-- method="post" action="login.php"> -->
        <div class="form-group">
          <label for="username">Username:</label>
          <input type="text" id="username" name="username" required />
        </div>
        <!--<div class="form-group">
            <label for="email">Почта:</label>
            <input type="email" name="email" id="email" required />
        </div>-->
        <div class="form-group">
          <label for="password">Password:</label>
          <input type="password" id="password" name="password" required />
        </div>
        <button type="submit" id="login">Login</button>
      </form>
    </div>
  </div>
  <script src="script.js"></script>
</body>
</html>