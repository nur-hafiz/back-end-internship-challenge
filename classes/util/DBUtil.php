<?php
require_once "../../autoload.php";

class DBUtil
{
    public static function getConnection(){
        $config = ConfigUtil::getConfig();
        $conn = new PDO('mysql:host='.$config->mysqlServer.';dbname='.$config->mysqlDB, $config->mysqlUser, $config->mysqlPassword, array(PDO::ATTR_ERRMODE=>PDO::ERRMODE_EXCEPTION));
        return $conn;
    }
}