<?php

session_start();

require_once File ::buildPath([
  'model',
  'Model.php'
]);

// Check if the request method is POST
if ($_SERVER["REQUEST_METHOD"] != "POST") {
  echo "Invalid request method.";
  exit();
}

// Check if all fields are filled
if (!isset($_POST['login-input'], $_POST['password-input'])) {
  echo "Please fill all fields.";
  exit();
}

$pdo = Model ::getPdo();

// Check if the user exists
$sql = "SELECT * FROM users WHERE name = :login_input OR email = :login_input";
$query = $pdo -> prepare($sql);
$query -> execute(['login_input' => $_POST['login-input']]);
$user = $query -> fetch(PDO::FETCH_ASSOC);

if (!$user) {
  echo "Invalid login credentials.";
  exit();
}

// Now verify the password
if (!password_verify($_POST['password-input'], $user['password'])) {
  echo "Invalid login credentials.";
  exit();
}

// Unset password from user and save user to session
unset($user['password']);
$_SESSION['user'] = $user;

// Fetch user basket
$sql = "SELECT * FROM baskets WHERE user_id = :user_id";
$query = $pdo -> prepare($sql);
$query -> execute([
  'user_id' => $_SESSION['user']['id']
]);
$basket = $query -> fetch(PDO::FETCH_ASSOC);

// ! TO REMOVE IF UNPASSABLE
if (!$basket) {
  $sql = "INSERT INTO baskets (user_id) VALUES (:user_id)";
  $query = $pdo -> prepare($sql);
  $query -> execute(['user_id' => $_SESSION['user']['id']]);
  echo 'created';
}

// Fetch items in the basket
$sql = "SELECT * FROM items WHERE basket_id = :basket_id";
$query = $pdo -> prepare($sql);
$query -> execute([
  'basket_id' => $basket['id']
]);
$items = $query -> fetchAll(PDO::FETCH_ASSOC);

// Save user basket to session
$_SESSION['basket'] = $basket;
$_SESSION['basket']['items'] = $items;  // save the items to basket

header('Location: /key_quest/index.php?action=home');
exit();
