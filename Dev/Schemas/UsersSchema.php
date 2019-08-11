<?php

class UsersSchema extends BaseSchema {

  private function __construct() {}

  public static function Up() {
    parent::init();
    $sql = <<<SQL
CREATE TABLE IF NOT EXISTS `users` (
	`id`			INT(10) UNSIGNED NOT NULL AUTO_INCREMENT,
	`username`		VARCHAR(255) NOT NULL,
	`created_date`	DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP,
	`modified_at`	DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP,
	PRIMARY KEY 	(`id`)
);
SQL;
    if (parent::$dbo->execute($sql)) {
			return "Users table created successfully.";
		} else {
			return "Error: Something went wrong.";
		}
  }

  public static function Down() {
    parent::init();
    $sql = <<<SQL
DROP TABLE IF EXISTS `users`;
SQL;
if(parent::$dbo->execute($sql)) {
  return "Users table deleted successfully.";
} else {
  return "Error: Something went wrong";
}
  }
}
