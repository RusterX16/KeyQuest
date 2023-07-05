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
        // Display login button if user is not logged in
        $html = "
        <a href='/key_quest/index.php?action=login'>
          <button class='login-button'>
            <i class='material-icons-outlined'>login</i>
            <span>Login</span>
          </button>
        </a>
      ";
      } else {
        // User is logged in
        $basketCount = 0;
        $favCount = 0;

        // Calculate basket count
        if (isset($_SESSION['basket'])) {
          foreach ($_SESSION['basket'] as $item) {
            if (is_array($item) && isset($item['quantity'])) {
              $basketCount += intval($item['quantity']); // Convert the quantity to an integer before adding
            }
          }
        }

        // Calculate wishlist count
        if (isset($_SESSION['fav'])) {
          if (is_array($_SESSION['fav'])) {
            $favCount = count($_SESSION['fav']);
          }
        }

        // Display user information and buttons for wishlist, basket, and logout
        $html = "
          <div class='welcome-message'>
            <h5 style='margin-block-start: 0; margin-block-end: 0'>Welcome back</h5>
            <h4 style='margin-block-start: 0; margin-block-end: 0'>" . $_SESSION["user"]["name"] . "</h4>
          </div>
          <a href='/key_quest/index.php?action=wishlist'>
            <button class='wishlist-button'>
              <i class='material-icons-outlined'>favorite_border</i>
              <span>Wishlist</span>
              <div class='basket-quantity-badge'>$favCount</div>
            </button>
          </a>
          <a href='/key_quest/index.php?action=basket'>
            <button class='basket-button'>
              <i class='material-icons-outlined'>shopping_cart</i>
              <span>Basket</span>
              <div class='basket-quantity-badge'>$basketCount</div>
            </button>
          </a>
          <button class='logout-button' onclick='showLogoutModal()'>
            <i class='material-icons-outlined'>logout</i>
            <span>Logout</span>
          </button>
        ";
      }
      echo $html;
      ?>
    </div>
  </div>
  <?php include 'navbar.php'; ?>
</header>
</body>
</html>
