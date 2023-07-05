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

// Get the basket id of the related user
$sql = "SELECT id FROM baskets WHERE user_id = :user_id";
$query = $pdo -> prepare($sql);
$query -> execute([
  'user_id' => $_SESSION['user']['id']
]);
$result = $query -> fetch(PDO::FETCH_ASSOC);

// Check if the basket is already stored in the session
if (!isset($_SESSION['basket'])) {
  $_SESSION['basket'] = [];
}

// Remove item from basket
if (isset($_SESSION['basket'][$productId])) {
  unset($_SESSION['basket'][$productId]);

  // Delete the item from the database
  $sql = "DELETE FROM items WHERE product_id = :id";
  $query = $pdo -> prepare($sql);
  $query -> execute([
    'id' => $productId
  ]);
}

// Redirect to the basket page
header('Location: /key_quest/index.php?action=basket');
exit();
