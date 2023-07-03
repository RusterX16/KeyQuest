<?php

session_start();

require_once File::buildPath([
  'model',
  'Model.php'
]);

$pdo = Model::getPdo();

if (!isset($_SESSION['user'])) {
  header('Location: /key_quest/index.php?action=login');
  exit();
}

$productId = $_GET['id'];
$price = $_GET['price'];

$sql = "SELECT id FROM baskets WHERE user_id = :user_id";
$query = $pdo->prepare($sql);
$query->execute([
  'user_id' => $_SESSION['user']['id']
]);
$result = $query->fetch(PDO::FETCH_ASSOC);
$basketId = $result['id'];

if (!isset($_SESSION['basket'])) {
  $_SESSION['basket'] = [];
}

if (!isset($_SESSION['basket']['items'][$productId])) {
  $_SESSION['basket']['items'][$productId] = [
    'quantity' => 1,
    'price' => $price
  ];
} else {
  $sql = "SELECT * FROM items WHERE product_id = :id";
  $query = $pdo->prepare($sql);
  $query->execute([
    'id' => $productId
  ]);
  $result = $query->fetch(PDO::FETCH_ASSOC);

  echo '<pre>';
  var_dump($_SESSION);
  echo '</pre>';

  if ($result) {
    $sql = "UPDATE items SET quantity = :quantity WHERE product_id = :id";
    $query = $pdo->prepare($sql);
    $query->execute([
      'quantity' => $_SESSION['basket']['items'][$productId]['quantity'] + 1,
      'id' => $productId
    ]);
  } else {
    $sql = "INSERT INTO items (quantity, product_id, basket_id) VALUES (:quantity, :product_id, :basket_id)";
    $query = $pdo->prepare($sql);
    $query->execute([
      'quantity' => $_SESSION['basket']['items'][$productId]['quantity'] + 1,
      'product_id' => $productId,
      'basket_id' => $basketId
    ]);
  }

  $_SESSION['basket']['items'][$productId]['quantity']++;
}

header('Location: /key_quest/index.php?action=home');
exit();