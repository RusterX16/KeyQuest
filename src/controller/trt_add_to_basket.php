<?php
session_start();

require_once File ::buildPath([
  'model',
  'Model.php'
]);

$pdo = Model ::getPdo();

// Check if the user is logged in
if (!isset($_SESSION['user'])) {
  header('Location: /key_quest/index.php?action=login');
  exit();
}

$productId = $_GET['id'];
$price = $_GET['price'];

// Get the basket id for the user
$sql = "SELECT id FROM baskets WHERE user_id = :user_id";
$query = $pdo -> prepare($sql);
$query -> execute([
  'user_id' => $_SESSION['user']['id']
]);
$result = $query -> fetch(PDO::FETCH_ASSOC);

$basketId = $result['id'];

// Check if the basket is already stored in the session
if (!isset($_SESSION['basket'])) {
  $_SESSION['basket'] = [];
}

// Check if the product is already in the basket
if (!isset($_SESSION['basket']['items'][$productId])) {
  // If the product is not in the basket, add it with initial quantity and price
  $_SESSION['basket']['items'][$productId] = [
    'quantity' => 1,
    'price' => $price
  ];
} else {
  // If the product is already in the basket, update the quantity
  $sql = "SELECT * FROM items WHERE product_id = :id AND basket_id = :basket_id";
  $query = $pdo -> prepare($sql);
  $query -> execute([
    'id' => $productId,
    'basket_id' => $basketId
  ]);
  $result = $query -> fetch(PDO::FETCH_ASSOC);

  if ($result) {
    // If the product is already in the items table, update the quantity
    $sql = "UPDATE items SET quantity = :quantity WHERE product_id = :id AND basket_id = :basket_id";
    $query = $pdo -> prepare($sql);
    $query -> execute([
      'quantity' => $_SESSION['basket']['items'][$productId]['quantity'] += 1,
      'id' => $productId,
      'basket_id' => $basketId
    ]);
  } else {
    // If the product is not in the items table, insert it with initial quantity
    $sql = "INSERT INTO items (quantity, product_id, basket_id) VALUES (1, :product_id, :basket_id)";
    $query = $pdo -> prepare($sql);
    $query -> execute([
      'product_id' => $productId,
      'basket_id' => $basketId
    ]);
  }

  // Redirect back to the previous page
  header("Location: {$_SERVER['HTTP_REFERER']}");
  exit();
}
