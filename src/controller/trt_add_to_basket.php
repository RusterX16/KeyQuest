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

// Check if the basket is already stored in the session
if (!isset($_SESSION['basket'])) {
  $_SESSION['basket'] = [];
}

// Check if the product is already in the basket
if (!isset($_SESSION['basket'][$productId])) {
  // If the product is not in the basket, add it with initial quantity and price
  $_SESSION['basket'][$productId] = [
    'quantity' => 1,
    'price' => $price
  ];
} else {
  // If the product is already in the basket, update the quantity
  $_SESSION['basket'][$productId]['quantity'] += 1;
}

echo '<pre>';
var_dump($_SESSION['basket']);
echo '</pre>';

// Redirect back to the previous page
header("Location: {$_SERVER['HTTP_REFERER']}");
exit();
