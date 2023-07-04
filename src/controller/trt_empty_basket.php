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

// Get the basket id for the user
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

// Remove all items from the basket
if (isset($_SESSION['basket']['items'])) {
  unset($_SESSION['basket']['items']);

  // Delete all items from the items table associated with the basket
  $sql = "DELETE FROM items WHERE basket_id = :id";
  $query = $pdo -> prepare($sql);
  $query -> execute([
    'id' => $result['id']
  ]);
}

header('Location: /key_quest/index.php?action=basket');
exit();