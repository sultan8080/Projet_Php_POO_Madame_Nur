<?php

/**
 * 
 *  Sesson  class
 */



class Session
{
  //Session :: init();

  public function init()
  {
    session_start();
  }
  public function set($key, $val)
  {
    $_SESSION[$key] = $val;
  }
  public function get($key)
  {
    if (isset($_SESSION[$key])) {
      return $_SESSION[$key];
    } else {
      return false;
    }
  }
  public function sessionCheck()
  {
    $this->init();
    if ($this->get("login") == false) {
      $this->destroy();
      header("Location:login.php");
    }
  }
  public function visitSessionCheck()
  {
    $this->init();
    if ($this->get("login") || false) {
      $this->destroy();
      header("Location:index.php");
    }
  }
  public function destroy()
  {
    session_destroy();
    header("Location:login.php");
  }
}