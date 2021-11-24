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
  //Execute the prepared statement
  public function execution($assocArr)
  {
    return $this->stmt->execute($assocArr);
  }

  //Return a set of data
  public function dataSet($assocArr)
  {
    $this->stmt->execute($assocArr);
    return $this->stmt->fetchAll(PDO::FETCH_OBJ);
  }

  //Single data
  public function singleData($assocArr)
  {
    $this->stmt->execute($assocArr);
    return $this->stmt->fetch(PDO::FETCH_OBJ);
  }

  //Get row count
  public function rowCount()
  {
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