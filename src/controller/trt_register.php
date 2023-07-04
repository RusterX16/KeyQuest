<?php

session_start();

require_once File ::buildPath([
  'model',
  'Model.php'
]);

$pdo = Model ::getPdo();

$username = $_POST['username-register'];
$email = $_POST['email-register'];
$password = $_POST['password-register'];
$avatar_url = 'src/resources/images/default-avatar.png';

// Check if an avatar image was uploaded
if (isset($_FILES['avatar-input']) && $_FILES['avatar-input']['error'] === UPLOAD_ERR_OK) {
  $tempFilePath = $_FILES['avatar-input']['tmp_name'];
  $extension = pathinfo($_FILES['avatar-input']['name'], PATHINFO_EXTENSION);
  $avatarFilename = uniqid() . 'view' . $extension;
  $avatarPath = 'src/resources/avatars/' . $avatarFilename;

  // Move the uploaded file to the desired location
  if (move_uploaded_file($tempFilePath, $avatarPath)) {
    $avatar_url = $avatarPath;
  }
}

// First, check if the username is taken
$sql = 'SELECT * FROM users WHERE name = :username';
$query = $pdo -> prepare($sql);
$query -> execute(['username' => $username]);
$result = $query -> fetch(PDO::FETCH_ASSOC);

if ($result) {
  echo "Username is already taken.";
  exit();
}

// Next, check if the email is taken
$sql = 'SELECT * FROM users WHERE email = :email';
$query = $pdo -> prepare($sql);
$query -> execute(['email' => $email]);
$result = $query -> fetch(PDO::FETCH_ASSOC);

if ($result) {
  echo "Email is already taken.";
  exit();
}

$hashed_password = password_hash($password, PASSWORD_DEFAULT);
$sql = 'INSERT INTO users (name, email, password, avatar_url) VALUES (:username, :email, :password, :avatar_url)';

$query = $pdo -> prepare($sql);
$query -> execute([
  'username' => $username,
  'email' => $email,
  'password' => $hashed_password,
  'avatar_url' => $avatar_url
]);
$result = $query -> fetch(PDO ::FETCH_ASSOC);

if ($query -> rowCount() > 0) {
  $_SESSION['user'] = [
    'id' => $pdo -> lastInsertId(),
    'name' => $username,
    'email' => $email,
    'avatar_url' => $avatar_url
  ];

  // Create a basket for the user
  $sql = 'INSERT INTO baskets (user_id) VALUES (:user_id)';
  $query = $pdo -> prepare($sql);
  $query -> execute([
    'user_id' => $_SESSION['user']['id']
  ]);

  header('Location: /key_quest/index.php?action=home');
  echo "Registration successful.";
} else {
  echo "Registration failed.";
}
