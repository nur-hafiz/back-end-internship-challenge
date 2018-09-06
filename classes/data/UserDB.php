<?php 
require_once "../../autoload.php";

class UserDB extends BaseDB
{
    
    private $table = 'tb_user';
    
    private static function getForm($obj)
    {
        $form['user_id']     = $obj->getProperty('date');
        $form['last_name']   = $obj->getProperty('last_name');
        $form['first_name']  = $obj->getProperty('first_name');
        
        return $form;
    }
    
    public function newEntry($obj)
    {
        $form = self::getForm($obj);
        $connection = DBUtil::getConnection();
        $stmt = $connection->prepare("INSERT INTO $this->table(first_name,last_name) VALUES(?,?)");
        $stmt->bindParam(1, $form['first_name']);
        $stmt->bindParam(2, $form['last_name']);
        $this->doQuery($stmt);
        $connection = null;
    }    
    
}