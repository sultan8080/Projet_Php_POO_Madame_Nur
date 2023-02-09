<?php
require_once(__ROOT__ . '/madame_nur/library/config.php');
/**
 * 
 * class Database
 */



class Database
{
  protected $db = array();

  public $host = DB_HOST;
  public $user = DB_USER;
  public $pass = DB_PASS;
  public $dbname = DB_NAME;
  public $charset = DB_CHARSET;

  public $link;
  public $error;

  public function __construct()
  {
    $this->connectDB();
  }





  private function connectDB()
  {
    //mysql connect 

    $this->link = new mysqli($this->host, $this->user, $this->pass, $this->dbname);
    mysqli_set_charset($this->link, 'utf8');
    if (!$this->link) {
      $this->error = "Connection fail" . $this->link->connect_error;
      return false;
    }
  }

  //select or read data
  public function select($query)
  {
    $result = $this->link->query($query) or die($this->link->error . __LINE__);
    if ($result->num_rows > 0) {
      return $result;
    } else {
      return false;
    }
  }

  //insert data
  public function insert($query)
  {
    $insert_row = $this->link->query($query) or die($this->link->error . __LINE__);
    if ($insert_row) {
      return $this->link->insert_id;
    } else {
      return false;
    }
  }
  //Update data
  public function update($query)
  {
    $update_row = $this->link->query($query) or die($this->link->error . __LINE__);
    if ($update_row) {
      return $update_row;
    } else {
      return false;
    }
  }
  //Delete data
  public function delete($query)
  {
    $delete_row = $this->link->query($query) or die($this->link->error . __LINE__);
    if ($delete_row) {
      return $delete_row;
    } else {
      return false;
    }
  }
}