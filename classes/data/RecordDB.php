<?php 
require_once "../../autoload.php";

class RecordDB extends BaseDB
{
    
    private $table = 'tb_record';
    
    private static function getForm($obj)
    {
        $form['date'] = $obj->getProperty('date');
        $form['user_id']  = $obj->getProperty('user_id');
        $form['time_in']  = $obj->getProperty('time_in');
        $form['time_out'] = $obj->getProperty('time_out');
        
        return $form;
    }

    public function newEntry($obj)
    {
        $form = self::getForm($obj);
        $connection = DBUtil::getConnection();
        $stmt = $connection->prepare("INSERT INTO $this->table(date,user_id,time_in) VALUES(?,?,?)");
        $stmt->bindParam(1, $form['date']);
        $stmt->bindParam(2, $form['user_id']);
        $stmt->bindParam(3, $form['time_in']);
        $this->doQuery($stmt);
        $connection = null;
    }
    
    public function selectEntry($obj)
    {   
        $form = self::getForm($obj);
        $connection = DBUtil::getConnection();
        $stmt = $connection->prepare("SELECT record_id FROM $this->table WHERE date = ? and user_id = ?");
        $stmt->bindParam(1, $form['date']);
        $stmt->bindParam(2, $form['user_id']);
        $this->doQuery($stmt);
        $results = $stmt->fetch();
        $connection = null;

        return $results;
    }
    
    public function updateEntry($obj)
    {
        $form = self::getForm($obj);
        $connection = DBUtil::getConnection();
        $stmt = $connection->prepare("UPDATE $this->table SET time_out = ? WHERE user_id = ? AND date = ?");
        $stmt->bindParam(3, $form['date']);
        $stmt->bindParam(2, $form['user_id']);
        $stmt->bindParam(1, $form['time_out']);
        $this->doQuery($stmt);
        $connection = null;
    }
    
}