<?php
// define ('DS', DIRECTORY_SEPARATOR);
// define ('BASE_DIR', dirname(__FILE__) . DS);
//
// require_once 'configs' . DS . 'configs.inc.php';

class Db
{
  private $dbo;

  public function __construct()
  {
    try
    {
      $this->dbo = new PDO(
        sprintf(
          "%s:host=%s; dbname=%s",
          DB_DRIVER,
          DB_HOST,
          DB_NAME
        ),
        DB_USER,
        DB_PASS
      );

    } catch (PDOException $ex) {
      die ("Database error: " . $ex->getMessage());
    }
  }

  public function execute($sql, $params = [])
  {
    try {
      $stmt =  $this->dbo->prepare($sql);
      return $stmt->execute($params);
    } catch (PDOException $ex){
      die("Database Error: " . $ex->getMessage());
    }
  }

  public function row($sql, $params = [])
  {
    try {
      $stmt = $this->dbo->prepare($sql);
      $stmt->execute($params);
      return $stmt->fetch(PDO::FETCH_OBJ);
    } catch (dboException $ex) {
      die("Database Error: " . $ex->getMessage());
    }
  }

  public function rows($sql, $params = [])
  {
    try {
      $stmt = $this->dbo->prepare($sql);
      $stmt->execute($params);
      return $stmt->fetchAll(PDO::FETCH_OBJ);
    } catch (PDOException $ex) {
      die("Database Error: " . $ex->getMessage());
    }
  }

  public function numRows($sql, $params = [])
  {
    try {
      $stmt = $this->dbo->prepare($sql);
      $stmt->execute($params);
      return $stmt->rowCount();
    } catch (PDOException $ex) {
      die("Database Error: " . $ex->getMessage());
    }
  }

  public function insertId()
  {
    return $this->dbo->insert_id;
  }

  public function escString($value)
  {
    return $this->dbo->real_escape_string($value);
  }
}
