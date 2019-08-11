<?php

class BaseSchema {
  private function __construct() {}

  protected static $dbo;

  protected static function init() {
    self::$dbo = new Db();
  }
}
