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
  <title>Basket</title>
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

  if (empty($_SESSION['basket']['items'])) {
    echo '
      <p style="margin-left: 10px">Your basket is empty. 
        <a href="/key_quest/index.php?action=home" style="text-decoration: underline">Jump to shop</a>
      </p>
      ';
  } else {
    $basketItems = $_SESSION['basket']['items'];
    $tabId = [];
    $totalPrice = 0;

    foreach ($basketItems as $productId => $item) {
      if (is_numeric($productId)) {  // only add numeric product ids
        $tabId[] = $productId;
      }
    }

    $sql = "SELECT * FROM products WHERE id IN (" . implode(',', $tabId) . ")";
    $query = $pdo -> prepare($sql);
    $query -> execute();
    $products = $query -> fetchAll(PDO::FETCH_ASSOC);

    foreach ($products as $product) {
      $name = $product['name'];
      $price = $product['price'];
      $imageUrl = $product['image_url'];
      $quantity = $basketItems[$product['id']]['quantity'];
      $itemTotal = $price * $quantity;
      $totalPrice += $itemTotal;
      $id = $product['id'];
      ?>
      <div class='product'>
        <div class='product-image'>
          <img src='<?php echo $imageUrl; ?>' alt='<?php echo $name; ?>'>
        </div>
        <div class='product-info'>
          <h3 class='product-name'><?php echo $name; ?></h3>
          <p class='product-price'><?php echo $price; ?> $</p>
          <div class='product-quantity'>
            <div class='quantity-control'>
              <form
                  action="<?php echo ($quantity <= 1) ?
                    '/key_quest/index.php?action=trtRemoveFromBasket&id=' . $id . '&price=' . $price :
                    '/key_quest/index.php?action=trtUpdateBasket&id=' . $id . '&price=' . $price . '&quantity=' . $quantity . '&operation=minus'; ?>"
                  method='POST'>
                <button class='quantity-minus' type='submit' name='action' value='decrease'>
                  <i class='material-icons'>remove</i>
                </button>
              </form>
              <input type='number' value='<?php echo $quantity; ?>' min='1' max='999' class='quantity-input'
                     name='quantity' data-id='<?php echo $id; ?>' data-price='<?php echo $price; ?>'>
              <form
                  action="<?php echo
                    '/key_quest/index.php?action=trtUpdateBasket&id=' . $id . '&price=' . $price . '&quantity=' . $quantity . '&operation=plus'; ?>"
                  method="POST">
                <button class='quantity-plus' type='submit' name='action' value='increase'>
                  <i class='material-icons'>add</i>
                </button>
              </form>
              <input type='hidden' name='id' value='<?php echo $id; ?>'>
              <input type='hidden' name='price' value='<?php echo $price; ?>'>
            </div>
            <form
                class='delete-item'
                action='/key_quest/index.php?action=trtRemoveFromBasket&id=<?php echo $id; ?>&price=<?php echo $price; ?>'
                method='POST'>
              <button type='submit' name='id' value='<?php echo $id; ?>'>
                <i class='material-icons-outlined'>delete</i>Delete
              </button>
            </form>
          </div>
          <p class='product-total-price'>Total price: <?php echo $itemTotal; ?> $</p>
        </div>
      </div>
    <?php } ?>
    <p class='total-price'>Total: <?php echo $totalPrice ?> $</p>
  <?php } ?>
  <div class="buttons">
    <button class='pay-button'><i class='material-icons-outlined'>credit_card</i> Pay Now</button>
    <button class="clear-basket-button"
            onclick="showEmptyBasketConfirmModal()" <?php echo empty($_SESSION['basket']['items']) ? 'disabled' : ''; ?>>
      <i class="material-icons-outlined">remove_shopping_cart</i>
      Clear Basket
    </button>
  </div>
</main>
</body>
</html>
