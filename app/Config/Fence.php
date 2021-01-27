<?php
namespace App\Config;
  
class Fence {

  public static function isLogedIn() {
    session_start();
    if(isset($_SESSION['username'])) {
      return true;
    } 
    return false;
  }

  public static function throw() {
    echo '<script> alert("Login dulu !")</script>';
    echo '<script> window.location = "/admin/login";</script>';
  }

  public function test() {
    echo "Hello";
  }
}