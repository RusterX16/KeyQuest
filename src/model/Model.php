<?php

require_once File::buildPath([
  'config',
  'Conf.php'
]);

#[AllowDynamicProperties] class Model {

  private static ?PDO $pdo = null;

  private static function connect(): void {
    $host = Conf ::get('host');
    $dbname = Conf ::get('dbname');
    $user = Conf ::get('user');
    $password = Conf ::get('password');

    try {
      self ::$pdo = new PDO("mysql:host=$host;dbname=$dbname", $user, $password);
    } catch(PDOException $e) {
      die($e -> getMessage());
    }
  }

  public static function getPDO(): PDO {
    if(is_null(self ::$pdo)) {
      self ::connect();
    }
    return self ::$pdo;
  }
}