<?php

session_start();

require_once File ::buildPath([
  'model',
  'Model.php'
]);

if ($_SERVER["REQUEST_METHOD"] != "POST") {
  echo "Invalid request method.";
  exit();
}

if (!isset($_POST['login-input'], $_POST['password-input'])) {
  echo "Please fill all fields.";
  exit();
}

$pdo = Model ::getPdo();

$sql = "SELECT * FROM users WHERE name = :login_input OR email = :login_input";
$query = $pdo -> prepare($sql);
$query -> execute(['login_input' => $_POST['login-input']]);
$result = $query -> fetch(PDO::FETCH_ASSOC);

if (!$result) {
  echo "Invalid login credentials.";
  exit();
}

// Now verify the password
if (!password_verify($_POST['password-input'], $result['password'])) {
  echo "Invalid login credentials.";
  exit();
}

unset($result['password']);
$_SESSION['user'] = $result;
print_r($_SESSION);

header('Location: /key_quest/index.php?action=home');
exit();
