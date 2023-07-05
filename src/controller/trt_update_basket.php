<?php

session_start();

require_once File ::buildPath([
  'model',
  'Model.php'
]);

$pdo = Model ::getPdo();

if (!isset($_SESSION['user'])) {
  header('Location: /key_quest/index.php?action=login');
  exit();
}

$productId = $_GET['id'];
$price = $_GET['price'];
$quantity = $_GET['quantity'];
$operation = $_GET['operation'];

// Get the basket id of the related user
$sql = "SELECT id FROM baskets WHERE user_id = :user_id";
$query = $pdo -> prepare($sql);
$query -> execute([
  'user_id' => $_SESSION['user']['id']
]);
$result = $query -> fetch(PDO::FETCH_ASSOC);
$basketId = $result['id'];

if (!isset($_SESSION['basket'])) {
  $_SESSION['basket'] = [];
}

if (!isset($_SESSION['basket'][$productId])) {
  // If the item is not in the basket, add it with the given quantity and price
  $_SESSION['basket'][$productId] = [
    'quantity' => $quantity,
    'price' => $price
  ];
} else {
  if (!isset($operation)) {
    // If the item is already in the basket, update the quantity with the given quantity
    $_SESSION['basket'][$productId]['quantity'] = $quantity;
  } else {
    // If the item is already in the basket, update the quantity based on the operation
    $_SESSION['basket'][$productId]['quantity'] += $operation == 'minus' ? -1 : 1;
  }

  $sql = "SELECT * FROM items WHERE product_id = :id";
  $query = $pdo -> prepare($sql);
  $query -> execute([
    'id' => $productId
  ]);
  $result = $query -> fetch(PDO::FETCH_ASSOC);

  if ($result) {
    // Update the quantity of the item in the database
    $sql = "UPDATE items SET quantity = :quantity WHERE product_id = :id";
    $query = $pdo -> prepare($sql);
    $query -> execute([
      'quantity' => $quantity,
      'id' => $productId
    ]);
  }
}

header('Location: /key_quest/index.php?action=basket');
exit();
