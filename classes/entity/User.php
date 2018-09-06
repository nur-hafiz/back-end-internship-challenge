<?php
require_once "../../autoload.php";

class User extends EntityBase
{
    
    private $user_id = 0;
    private $last_name  = '';
    private $first_name = '';
    
    public function fillEntity($properties)
    {
     
        $this->last_name  = $properties[0];
        $this->first_name = $properties[1];
        
    }
    
    public function getProperty($property)
    {
        switch ($property) {
            case 'user_id':
                return $this->user_id;
            case 'last_name':
                return $this->last_name;
            case 'first_name':
                return $this->first_name;
        }
    }
    
    
}


