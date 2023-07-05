<?php

require_once File ::buildPath([
  'controller',
  'Controller.php'
]);

// If the action is set in the URL, we call the corresponding method in the Controller class
// Otherwise, we call the home method
if(isset($_GET['action'])) {
  $action = $_GET['action'];
  Controller ::$action();
} else {
  Controller ::home();
}
