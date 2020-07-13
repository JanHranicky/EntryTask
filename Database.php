<?php 
  class Database {
    // DB Params
    private $host = 'localhost';
    private $db_name = 'Products';
    private $conn;

    // DB Connect
    public function connect($username,$password) {
      $conn = null;

      try { 
        $conn = new PDO('mysql:host=' . $host . ';dbname=' . $db_name, $username, $password);
        $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
      } catch(PDOException $e) {
        echo 'Connection Error: ' . $e->getMessage();
      }
    }
  }
?>