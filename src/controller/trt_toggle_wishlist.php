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

$user_id = $_SESSION['user']['id'];
$productId = $_GET['id'];

$sql = "SELECT * FROM favorites WHERE user_id = :user_id AND product_id = :product_id";
$query = $pdo -> prepare($sql);
$query -> execute([
  'user_id' => $user_id,
  'product_id' => $productId
]);
$result = $query -> fetch(PDO::FETCH_ASSOC);

if ($result) {
  $sql = "DELETE FROM favorites WHERE user_id = :user_id AND product_id = :product_id";
  unset($_SESSION['fav'][$productId]);
} else {
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