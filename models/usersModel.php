<?php
require_once CONTROLLERS . 'helpers/dbConnection.php';

class User
{
  private $db;

  public function __construct()
  {
    $this->db = new Database;
  }
  //!Fusionate checkUser and Login to reduce code repetition
  //Check user in the database
  public function checkUser($password, $name)
  {
    try {
      $this->db->query("SELECT COUNT(*) FROM user WHERE username=:username AND pwd=:pwd");
      $this->db->bind(':username', $name);
      $this->db->bind(':pwd', $password);
      // $user = $this->db->singleData([
      //   'username' => $name,
      //   'pwd' => $password
      // ]);
      $user = $this->db->singleData();
      return $user;
    } catch (PDOException $errorMsg) {
      $this->db->error = $errorMsg->getMessage();
      require_once(VIEWS . '/error/error.php');
    }
  }

  public function register($fullName, $email, $password)
  {
    $this->db->query("INSERT INTO user(username, email, pwd) VALUES (:username, :email, :pwd)");
    $this->db->bind(':username', $fullName);
    $this->db->bind(':email', $email);
    $this->db->bind(':pwd', $password);
    if ($this->db->singleData()) {
      return true;
    } else {
      return false;
    }
  }

  public function login($fullName, $password)
  {
    $this->db->query("SELECT COUNT(*) FROM user WHERE username=:username AND pwd=:pwd");
    $this->db->bind(':username', $fullName);
    $this->db->bind(':pwd', $password);
    $user = $this->db->singleData();
    // if ($this->checkUser($fullName, $password)) {
    //   return true;
    // }
    return $user;
  }

  public function getUserId($fullName, $password)
  {
    $this->db->query("SELECT id, username, pwd, email FROM user WHERE username=:username AND pwd=:pwd");
    $row = $this->db->singleData([
      'username' => $fullName,
      'pwd' => $password
    ]);
    $userId = $row['id'];
    return $userId;
  }
}