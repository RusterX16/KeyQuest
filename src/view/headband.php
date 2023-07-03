<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport"
        content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link rel="stylesheet" href="src/css/style.css"/>
  <link rel="stylesheet" href="src/css/headband.css"/>
  <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
  <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons+Outlined">
  <link rel="icon" href="../resources/images/logo.png" type="image/x-icon">
  <script src="/key_quest/src/js/script.js" type="text/javascript"></script>
  <script src="/key_quest/src/js/headband.js" type="text/javascript"></script>
  <title>Headband</title>
</head>
<body>
<header>
  <div class="headband">
    <a href="/key_quest/index.php?action=home">
      <div class="left">
        <div class="img-container">
          <img
              src="/key_quest/src/resources/images/logo.png"
              alt="logo"
              class="logo"
              width="50px"
              height="50px"
          />
        </div>
        <h2 class="title">Key-Quest</h2>
      </div>
    </a>
    <div class="middle">
      <h4 class="slogan">Build your own, enjoy more !</h4>
    </div>
    <div class="right">
      <?php
      $html = '';

      if (!isset($_SESSION['user'])) {
        $html = "
        <a href='/key_quest/index.php?action=login'>
          <button class='login-button'>
            <i class='material-icons-outlined'>login</i> Login
          </button>
        </a>
      ";
      } else {
        $totalItems = 0;

        if (isset($_SESSION['basket']['items'])) {
          foreach ($_SESSION['basket']['items'] as $item) {
            if (is_array($item) && isset($item['quantity'])) {
              $totalItems += intval($item['quantity']); // Convert the quantity to an integer before adding
            }
          }
        }

        $html = "
          <div class='welcome-message'>
            <h5 style='margin-block-start: 0; margin-block-end: 0'>Welcome back</h5>
            <h4 style='margin-block-start: 0; margin-block-end: 0'>" . $_SESSION["user"]["name"] . "</h4>
          </div>
          <a href='/key_quest/index.php?action=basket'>
            <button class='basket-button'>
              <i class='material-icons-outlined'>shopping_cart</i> Basket
              <div class='basket-quantity-badge'>$totalItems</div>
            </button>
          </a>
          <button class='logout-button' onclick='showLogoutModal()'>
            <i class='material-icons-outlined'>logout</i> Logout
          </button>
        ";
      }
      echo $html;
      ?>
    </div>
  </div>
  <?php include('navbar.php'); ?>
</header>
</body>
</html>