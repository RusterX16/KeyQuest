<?php

class File {

  public static function buildPath($pathArray): string {
    $ds = DIRECTORY_SEPARATOR;
    $rootFolder = __DIR__ . $ds . "..";
    return $rootFolder . "/" . implode("/", $pathArray);
  }
}
