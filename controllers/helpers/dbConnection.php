<?php
require_once("config/DB.php");

class Database extends DB
{
  //PDO properties
  private $dbh;
  private $stmt;
  private $error;

  //Database connection
  public function __construct()
  {
    try {
      $connection = 'mysql:host=' . DB::HOST . ';'
        . 'dbname=' . DB::DB . ';'
        . 'charset=' . DB::CHARSET . ';';

      $options = [
        PDO::ATTR_ERRMODE           => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_EMULATE_PREPARES => FALSE,
      ];

      $this->dbh = new PDO($connection, DB::USER, DB::PASSWORD, $options);
    } catch (PDOException $errorMsg) {
      $this->error = $errorMsg->getMessage();
      require_once(VIEWS . '/error/error.php');
    }
  }

  //Prepare statement with query
  public function query($sql)
  {
    $this->stmt = $this->dbh->prepare($sql);
  }
  //Bind params
  public function bind($param, $value, $type = null)
  {
    if (is_null($type)) {
      switch (true) {
        case is_int($value):
          $type = PDO::PARAM_INT;
          break;
        case is_bool($value):
          $type = PDO::PARAM_BOOL;
          break;
        case is_null($value):
          $type = PDO::PARAM_NULL;
          break;
        default:
          $type = PDO::PARAM_STR;
          break;
      }
    }
    $this->stmt->bindValue($param, $value, $type);
  }
  //Execute the prepared statement
  public function execute()
  {
    return $this->stmt->execute();
  }

  //Return a set of data
  public function dataSet()
  {
    $this->stmt->execute();
    return $this->stmt->fetchAll(PDO::FETCH_OBJ);
  }

  //Single data
  public function singleData()
  {
    $this->stmt->execute();
    return $this->stmt->fetch(PDO::FETCH_OBJ);
  }
}

// function db()
// {
//   try {
//     $connection = 'mysql:host=' . HOST . ';'
//       . 'dbname=' . DB . ';'
//       . 'charset=' . CHARSET . ';';

//     $options = [
//       PDO::ATTR_ERRMODE           => PDO::ERRMODE_EXCEPTION,
//       PDO::ATTR_EMULATE_PREPARES => FALSE,
//     ];

//     $pdo = new PDO($connection, USER, PASSWORD, $options);
//     return $pdo;
//   } catch (PDOException $errorMsg) {
//     $errorMsg->getMessage();
//     require_once(VIEWS . '/error/error.php');
//   }
// }