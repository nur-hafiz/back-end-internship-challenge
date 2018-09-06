<?php

class ConfigUtil
{
    public static $config;
    public $mysqlServer;
    public $mysqlUser;
    public $mysqlPassword;
    public $mysqlDB;
    
    public static function getApplicationRoot(){
    	$path = $_SERVER['DOCUMENT_ROOT'] . "/Cudy/";
    	return $path;
    }
    
    public static function getConfig($reload = false){
        if(isset($config)==false || $reload==true){
          $ini = parse_ini_file(self::getApplicationRoot()."config/mysqlconfig.ini");
          $config=new ConfigUtil();
          $config->mysqlDB=$ini['mysqldb'];
          $config->mysqlUser=$ini['mysqluser'];
          $config->mysqlServer=$ini['mysqlserver'];
          $config->mysqlPassword=$ini['mysqlpassword'];

          return $config;
        }
        
        return $config;
    }

}