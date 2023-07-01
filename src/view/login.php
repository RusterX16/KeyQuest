<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="/key_quest/src/css/style.css"/>
  <link rel="stylesheet" href="/key_quest/src/css/login.css"/>
  <script src="/key_quest/src/js/script.js" type="text/javascript"></script>
  <script src="/key_quest/src/js/login.js" type="text/javascript"></script>
  <title>Login</title>
</head>
<body>
<?php include('headband.php'); ?>
<main>
  <div class="container">
    <div class="login-register-container">
      <!-- Login form -->
      <form class="login-form" method="post" action="/key_quest/index.php?action=trtLogin">
        <h2>Login</h2>
        <div class="form-group">
          <input id="login-input" name="login-input" type="text" required />
          <label for="login-input">Username or Email</label>
          <span id="loginError" class="error-message"></span>
        </div>
        <div class="form-group">
          <input id="password-input" name="password-input" type="password" required />
          <label for="password-input">Password</label>
        </div>
        <div class="form-group">
          <input type="Submit" class="button" value="Submit"/>
        </div>
      </form>

      <!-- Register form -->
      <form class="register-form" method="post" action="/key_quest/index.php?action=trtRegister">
        <h2>Register</h2>
        <div class="form-group">
          <input id="username-register" name="username-register" type="text" required />
          <label for="username-register">Username</label>
          <span id="usernameRegisterError" class="error-message"></span>
        </div>
        <div class="form-group">
          <input id="email-register" name="email-register" type="email" required />
          <label for="email-register">Email</label>
          <span id="emailRegisterError" class="error-message"></span>
        </div>
        <div class="form-group">
          <input id="password-register" name="password-register" type="password" required />
          <label for="password-register">Password</label>
        </div>
        <div class="form-group">
          <input id="password-verify" name="password-verify" type="password" required />
          <label for="password-verify">Confirm Password</label>
          <span id="passwordRegisterError" class="error-message"></span>
        </div>
        <div class="form-group-2">
          <label class="label">Profile picture (optional)</label>
          <input
            id="image-input"
            class="avatar-button"
            type="file"
            name="avatar-url-register"
            accept="image/*"
          />
        </div>
        <div class="form-group">
          <input type="submit" class="button" value="Register"/>
        </div>
      </form>
    </div>
  </div>
</main>
</body>
</html>
