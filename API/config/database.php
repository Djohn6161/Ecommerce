<?php
class Database {
    //data params
    private $host = 'localhost';
    private $dbname = 'ecommerce';
    private $username = 'root';
    private $password = '';
    private $conn;
    //db conn
    public function connect() {
        $this->conn = null;

        try { 
            $this->conn = new PDO('mysql:host=' . $this->host . ';dbname=' . $this->dbname, $this->username, $this->password);
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
          } catch(PDOException $e) {
            echo 'Connection Error: ' . $e->getMessage();
          }

        return $this->conn;
    }
}