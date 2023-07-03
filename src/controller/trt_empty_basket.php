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

$sql = "SELECT id FROM baskets WHERE user_id = :user_id";
$query = $pdo -> prepare($sql);
$query -> execute([
  'user_id' => $_SESSION['user']['id']
]);
$result = $query -> fetch(PDO::FETCH_ASSOC);

if (!isset($_SESSION['basket'])) {
  $_SESSION['basket'] = [];
}

// Remove item from basket
if (isset($_SESSION['basket']['items'])) {
  unset($_SESSION['basket']['items']);

  $sql = "DELETE FROM items WHERE basket_id = :id";
  $query = $pdo -> prepare($sql);
  $query -> execute([
    'id' => $result['id']
  ]);
}

header('Location: /key_quest/index.php?action=basket');
exit();