<?php

session_start();

require_once File ::buildPath([
  'model',
  'Model.php'
]);

$pdo = Model ::getPdo();

// Check if the user is logged in
if (!isset($_SESSION['user'])) {
  // Redirect to the login page if not logged in
  header('Location: /KeyQuest/index.php?action=login');
  exit();
}

$productId = $_GET['id'];
$price = $_GET['price'];

// Check if the basket is already stored in the session
if (!isset($_SESSION['basket'])) {
  // Initialize an empty basket if it doesn't exist
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

// Store the basket data in the database
$userId = $_SESSION['user']['id'];

// Prepare the SQL statement to insert or update the basket data in the database
$sql = "INSERT INTO items (product_id, basket_id, quantity) VALUES (:product_id, :basket_id, :quantity)";
$query = $pdo -> prepare($sql);
$query -> execute([
  'product_id' => $productId,
  'basket_id' => $userId,
  'quantity' => $_SESSION['basket'][$productId]['quantity']
]);

// Redirect back to the previous page
header("Location: {$_SERVER['HTTP_REFERER']}");
exit();
