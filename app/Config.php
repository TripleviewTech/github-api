<?php 

namespace app;

class Config {

  static $envFile = './.env';

  public static function load(){
    if(file_exists(self::$envFile)){
    $objfile = fopen(self::$envFile, 'r');
      while(!feof($objfile)){
        $row = explode("=", fgetcsv($objfile)[0]);
        if(isset($row[0]) && isset($row[1])){
          defined($row[0]) || define($row[0], $row[1]);
        }
      }
    }
  }
}