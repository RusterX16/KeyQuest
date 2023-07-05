<?php
session_start();
error_reporting(E_ALL);
ini_set('display_errors', 1);
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <base href="/">
  <link rel="icon" type="image/x-icon" href="src/resources/icons/logo.ico">
  <link rel="stylesheet" href="src/css/style.css" type="text/css"/>
  <link rel="stylesheet" href="src/css/home.css" type="text/css"/>
  <link rel="stylesheet" href="src/css/product.css" type="text/css"/>
  <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
  <link rel="stylesheet"
        href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@48,400,0,0"/>
  <script src="/src/js/script.js" type="text/javascript"></script>
  <title>KeyQuest</title>
</head>

<body>
<?php include_once 'headband.php'; ?>
<main>
  <?php
  require_once File ::buildPath([
    'model',
    'Model.php'
  ]);
  $pdo = Model ::getPDO();

  if (isset($_GET['rel'])) {
    $rel = $_GET['rel'];
    $sql = "SELECT * FROM $rel JOIN products ON $rel.product_id = products.id";

    // Assuming 'rel' refers to a table in your database:
    if (isset($_GET['type'])) {
      $sql .= " WHERE $rel.type = :type";
    }
  } else {
    $sql = 'SELECT * FROM products';
    if (isset($_GET['type'])) {
      $sql .= ' WHERE type = :type';
    }
  }

  $query = $pdo -> prepare($sql);
  if (isset($_GET['type'])) {
    $query -> bindValue(':type', $_GET['type']);
  }
  $query -> execute();
  $result = $query -> fetchAll(PDO::FETCH_ASSOC);

  if (!$result) {
    echo "<p style='margin: 20px'>No product in this category</p>";
  }

  foreach ($result as $value) {
    $productId = $value['id'];
    $price = $value['price'];
    $isFavorite = isset($_SESSION['fav'][$value['id']]);
    $favoriteClass = $isFavorite ? 'favorite-active' : '';

    echo "
      <div class='product-card'>
        <div class='product-image'>
          <img src='{$value['image_url']}' alt='product image'>
        </div>
        <h4 class='product-name'>{$value['name']}</h4>
        <p class='product-price'>\${$value['price']}</p>
        <div class='buttons'>
          <a href='/key_quest/index.php?action=trtAddToBasket&id=$productId&price=$price' class='add-to-cart'>
            <i class='material-icons-outlined'>shopping_cart</i>Add to Cart
          </a>
          <a href='/key_quest/index.php?action=trtToggleWishlist&id={$value['id']}' class='add-to-fav $favoriteClass'>
            <i class='material-icons-outlined'>favorite_border</i>
            <i class='material-icons'>favorite</i>
          </a>
        </div>
      </div>
    ";
  }
  ?>
</main>
</body>
</html>
