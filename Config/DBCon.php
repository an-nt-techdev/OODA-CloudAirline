<?php
  class DBConnection {
    // Mysqli Object
    private $db;
    // Default Constructor function
    public function __construct() {
      
      $host = 'localhost';
      $port = '3306';
      $username = 'root';
      $password = '';
      $dbname = 'cloudairline_db';
      $this->db = new mysqli($host, $username, $password, $dbname, $port);
      $this->db->set_charset("utf8");
      if ($this->db->connect_error) {
        die("Cannot connect to Database!". $this->db->connect_error);
      }
    }
    protected function runQuery(string $sql) {
		  return	$result = $this->db->query($sql);
    }
  }
?>