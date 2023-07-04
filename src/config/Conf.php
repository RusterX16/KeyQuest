<?php

/**
 * Class Conf
 * @package config
 * Contains the configuration of the database
 */
class Conf {

  private static string $host = "localhost";
  private static string $dbname = "keyquest";
  private static string $user = "root";
  private static string $password = "";

  public static function get($string): string {
    return match ($string) {
      "host" => self ::$host,
      "dbname" => self ::$dbname,
      "user" => self ::$user,
      "password" => self ::$password,
    };
  }
}
