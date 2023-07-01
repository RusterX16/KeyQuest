<?php

class Controller {

  public static function home(): void {
    require_once File ::buildPath([
      'view',
      'home.php'
    ]);
  }

  public static function login(): void {
    require_once File ::buildPath([
      'view',
      'login.php'
    ]);
  }

  public static function trtLogin(): void {
    require_once File ::buildPath([
      'view',
      'trt_login.php'
    ]);
  }

  public static function trtLogout(): void {
    require_once File ::buildPath([
      'view',
      'trt_logout.php'
    ]);
  }

  public static function trtRegister(): void {
    require_once File ::buildPath([
      'view',
      'trt_register.php'
    ]);
  }

  public static function displaySwitches(): void {
    require_once File ::buildPath([
      'view',
      'switches.php'
    ]);
  }
}