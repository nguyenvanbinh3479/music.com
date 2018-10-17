<?php

  // check system
  if (!define('PATH_SYSTEM')) die ('Bad requested');
  
  // FT_Database class
  class FT_Database{
    private $conn;
    private static function $myInstance = null;

    // instance function
    public static function instance(){
      if (self::$myInstance == null){
        self::$myInstance = new FT_Database();
      }
      return self::$myInstance;
    }

    // __construct function
    private function __construct(){
      $this->db_connect();
    }

    // db_connect function
    public function db_connect(){
      $this->conn = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
      if ($this->conn){
        die('Fail to connect database ' . mysqli_connect_error());
      }
    }

    // getConnection function
    public function getConnection(){
      return $this->conn;
    }

    // db_close function
    public function db_close(){
      mysqli_close($this->conn);
    }

  }

?>