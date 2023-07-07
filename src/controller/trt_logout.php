<?php

session_start();

// Unset the user session variable
unset($_SESSION['user']);

// Destroy the session
session_destroy();

// Redirect to the home page
header('Location: /KeyQuest/index.php?action=home');
exit();
