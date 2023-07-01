<?php

session_start();
unset($_SESSION['user']);
session_destroy();

header('Location: /key_quest/index.php?action=home');
exit();