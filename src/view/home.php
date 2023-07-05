<?php
session_start();

require_once File ::buildPath([
  'model',
  'Model.php'
]);

// Get the 'rel' parameter from the URL or set it to null if not present
$rel = $_GET['rel'] ?? null;
// Get the 'type' parameter from the URL or set it to null if not present
$type = $_GET['type'] ?? null;

// Get the product data based on 'rel' and 'type'
$result = getProductData($rel, $type);
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
  <?php include 'headband.php'; ?>
  <main>
    <?php
    if (empty($result)) {
      // Display a message if no products found
      echo "<p style='margin: 20px'>No product in this category</p>";
    } else {
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
    }
    ?>
  </main>
  </body>
  </html>

<?php
function getProductData($rel, $type): false|array
{
  $pdo = Model ::getPDO();

  $allowedTables = ['products', 'sets', 'keyboards', 'keycaps', 'switches', 'cases', 'pcbs', 'tools', 'accessories'];
  // Validate the 'rel' parameter against allowed tables
  $rel = in_array($rel, $allowedTables, true) ? $rel : null;

  $sql = 'SELECT * FROM products';
  if (!is_null($rel)) {
    // Build the SQL query with the specified table
    $sql = "SELECT * FROM $rel JOIN products ON $rel.product_id = products.id";
  }

  if (!is_null($type)) {
    // Append the WHERE clause based on 'rel' and 'type'
    $sql .= !is_null($rel) ? " WHERE $rel.type = :type" : " WHERE type = :type";
  }

  $query = $pdo -> prepare($sql);

  if (!is_null($type)) {
    // Bind the 'type' parameter if not null
    $query -> bindValue(':type', $type);
  }

  $query -> execute();
  // Fetch all the results as an associative array
  return $query -> fetchAll(PDO::FETCH_ASSOC);
}
