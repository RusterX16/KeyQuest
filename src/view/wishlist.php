<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport"
        content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link rel="stylesheet" href="src/css/style.css"/>
  <link rel="stylesheet" href="src/css/basket.css"/>
  <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons"/>
  <link rel="icon" href="../resources/images/logo.png" type="image/x-icon">
  <script src="/key_quest/src/js/script.js" type="text/javascript"></script>
  <script src="/key_quest/src/js/basket.js" type="text/javascript"></script>
  <title>Wishlist</title>
</head>
<body>
<?php include 'headband.php' ?>
<main>
  <?php
  require_once File ::buildPath([
    'model',
    'Model.php'
  ]);
  $pdo = Model ::getPDO();

  if (empty($_SESSION['fav'])) {
    echo '
      <p style="margin-left: 10px">Yo got no products in favorite. 
        <a href="/key_quest/index.php?action=home" style="text-decoration: underline">Browse products</a>
      </p>
    ';
  } else {
    $wishlistIds = array_keys($_SESSION['fav']);
    $sql = "SELECT * FROM products p JOIN favorites f ON p.id = f.product_id WHERE id IN (" . implode(',', $wishlistIds) . ")";
    $query = $pdo -> prepare($sql);
    $query -> execute();
    $products = $query -> fetchAll(PDO::FETCH_ASSOC);

    foreach ($products as $product) {
      $name = $product['name'];
      $price = $product['price'];
      $imageUrl = $product['image_url'];
      $id = $product['id'];
      ?>
      <div class='product'>
        <div class='product-image'>
          <img src='<?php echo $imageUrl; ?>' alt='<?php echo $name; ?>'>
        </div>
        <div class='product-info'>
          <h3 class='product-name'><?php echo $name; ?></h3>
          <p class='product-price'><?php echo $price; ?> $</p>
          <div class='product-actions'>
            <form
                class='delete-item'
                action='/key_quest/index.php?action=trtToggleWishlist&id=<?php echo $id; ?>'
                method='POST'>
              <button type='submit' name='id' value='<?php echo $id; ?>'>
                <i class='material-icons'>favorite</i>Remove from Wishlist
              </button>
            </form>
          </div>
        </div>
      </div>
    <?php } ?>
  <?php } ?>
</main>
</body>
</html>
