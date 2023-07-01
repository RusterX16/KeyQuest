<?php

require_once File ::buildPath([
  'controller',
  'Controller.php'
]);

if(isset($_GET['action'])) {
  $action = $_GET['action'];
  Controller ::$action();
} else {
  Controller ::home();
}