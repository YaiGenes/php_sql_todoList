<?php
require_once CONTROLLERS . 'helpers/dbConnection.php';

class User
{
  private $db;

  public function __construct()
  {
    $this->db = new Database;
  }

  //Check user in the database
  public function checkUser($password, $name)
  {
    $this->db->query("SELECT id, username, pwd, email FROM user WHERE username=:username AND pwd=:pwd");
    $this->db->singleData([
      'username' => $name,
      'pwd' => $password
    ]);

    //Check row
    if ($this->db->rowCount() > 0) {
      return true;
    } else {
      return false;
    }
  }

  public function register($fullName, $email, $password)
  {
    $this->db->query("INSERT INTO user(username, email, pwd) VALUES (:username, :email, :pwd)");
    if ($this->db->execution([
      'username' => $fullName,
      'email' => $email,
      'pwd' => $password
    ])) {
      return true;
    } else {
      return false;
    }
  }

  public function login($fullName, $password)
  {

    if ($this->checkUser($fullName, $password)) {
      return true;
    }
  }

  public function getUserId($fullName, $password)
  {
    if ($this->checkUser($fullName, $password)) {
      $this->db->query("SELECT id, username, pwd, email FROM user WHERE username=:username AND pwd=:pwd");
      $row = $this->db->singleData([
        'username' => $fullName,
        'pwd' => $password
      ]);
      $userId = $row['id'];
      return $userId;
    }
  }
}