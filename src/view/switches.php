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
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@48,400,0,0" />
    <script src="/src/js/script.js" type="text/javascript"></script>
    <title>KeyQuest</title>
</head>

<body>
<?php include('headband.php'); ?>
<main>
    <?php
    require_once File::buildPath([
        'model',
        'Model.php'
    ]);
    $pdo = Model::getPDO();

    $sql = 'SELECT * FROM products WHERE type = \'switches\'';
    $query = $pdo -> prepare($sql);
    $query -> execute();
    $result = $query -> fetchAll();

    foreach ($result as $key => $value) {
        echo "
      <div class='product-card'>
        <div class='product-image' style='background-image: url({$value['image_url']});'>
          <!-- Image will be placed here -->
        </div>
        <h4 class='product-name'>{$value['name']}</h4>
        <p class='product-price'>\${$value['price']}</p>
        <div class='buttons'>
          <a href='#' class='add-to-cart'><i class='material-icons-outlined'>shopping_cart</i>Add to Cart</a>
          <a href='#' class='add-to-fav'>
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
