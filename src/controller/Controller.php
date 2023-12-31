<?php

/**
 * Class Controller
 * @package controller
 * Contains the controller of the website
 *
 */
class Controller {

  public static function home(): void {
    require_once File ::buildPath([
      'view',
      'home.php'
    ]);
  }

  public static function basket(): void {
    require_once File ::buildPath([
      'view',
      'basket.php'
    ]);
  }

  public static function wishlist(): void {
    require_once File ::buildPath([
      'view',
      'wishlist.php'
    ]);
  }

  public static function login(): void {
    require_once File ::buildPath([
      'view',
      'login.php'
    ]);
  }

  public static function report() {
    require_once File ::buildPath([
      'view',
      'report.php'
    ]);
  }

  public static function trtLogin(): void {
    require_once File ::buildPath([
      'controller',
      'trt_login.php'
    ]);
  }

  public static function trtLogout(): void {
    require_once File ::buildPath([
      'controller',
      'trt_logout.php'
    ]);
  }

  public static function trtRegister(): void {
    require_once File ::buildPath([
      'controller',
      'trt_register.php'
    ]);
  }

  public static function trtAddToBasket(): void {
    require_once File ::buildPath([
      'controller',
      'trt_add_to_basket.php'
    ]);
  }

  public static function trtUpdateBasket(): void {
    require_once File ::buildPath([
      'controller',
      'trt_update_basket.php'
    ]);
  }

  public static function trtRemoveFromBasket(): void {
    require_once File ::buildPath([
      'controller',
      'trt_remove_from_basket.php'
    ]);
  }

  public static function trtEmptyBasket(): void {
    require_once File ::buildPath([
      'controller',
      'trt_empty_basket.php'
    ]);
  }

  public static function trtToggleWishlist(): void {
    require_once File ::buildPath([
      'controller',
      'trt_toggle_wishlist.php'
    ]);
  }
}
