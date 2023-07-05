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

$user_id = $_SESSION['user']['id'];
$productId = $_GET['id'];

// Check if the product is already in the user's favorites
$sql = "SELECT DISTINCT * FROM favorites WHERE user_id = :user_id AND product_id = :product_id";
$query = $pdo -> prepare($sql);
$query -> execute([
  'user_id' => $user_id,
  'product_id' => $productId
]);
$result = $query -> fetch(PDO::FETCH_ASSOC);

if ($result) {
  // If the product is already in favorites, remove it
  $sql = "DELETE FROM favorites WHERE user_id = :user_id AND product_id = :product_id";
  unset($_SESSION['fav'][$productId]);
} else {
  // If the product is not in favorites, add it
  $sql = "INSERT INTO favorites (user_id, product_id) VALUES (:user_id, :product_id)";
  $_SESSION['fav'][$productId] = true;
}

$query = $pdo -> prepare($sql);
$query -> execute([
  'user_id' => $user_id,
  'product_id' => $productId
]);

// Redirect back to the previous page
header("Location: {$_SERVER['HTTP_REFERER']}");
exit();
