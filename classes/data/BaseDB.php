<?php 

abstract class BaseDB
{
    
    private $table = '';
    
    public function doQuery($stmt){
        try {
            $stmt->execute();
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }
    
    abstract public function newEntry($obj);
    
}