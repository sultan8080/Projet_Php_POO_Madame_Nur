<?php

/**
 * 
 *  Sesson  class
 */



class Session
{
  //Session :: init();
  public function __construct(){
    $this->init();
  }
  public static function init()
  {
    if(session_status() == PHP_SESSION_NONE){
      session_start();
    }
  }
  public static function set($key, $val)
  {
    $_SESSION[$key] = $val;
  }
  public static function get($key)
  {
    if (isset($_SESSION[$key])) {
      return $_SESSION[$key];
    } else {
      return false;
    }
  }
  public static function sessionCheck()
  {
    self::init();
    if (self::get("alogin") == false) {
      self::destroy();
      header("Location:login.php");
    }
  }
  public static function visitSessionCheck()
  {
    self::init();
    if (self::get("alogin") || false) {
      self::destroy();
      header("Location:index.php");
    }
  }
  public static function destroy()
  {
    session_destroy();
    header("Location:login.php");
  }
}