<?php
require_once "../../autoload.php";

class Record extends EntityBase
{

    private $date = '';
    private $user_id  = '';
    private $time_in  = '';
    private $time_out = '';
    public $clock_in = 0;
    
    public function fillEntity($properties)
    {
        date_default_timezone_set('Asia/Singapore');
        $this->user_id  = $properties[0];
        $this->clock_in = $properties[1];
        $this->date = date('d-m-Y');
        
        if ($this->clock_in) {
            $this->time_in = date('H:i');
        } else {
            $this->time_out = date('H:i');
        }
    }
    
    public function getProperty($property)
    {
        switch ($property) {
            case 'time_in':
                return $this->time_in;
            case 'time_out':
                return $this->time_out;
            case 'user_id':
                return $this->user_id;
            case 'date':
                return $this->date;
            case 'clock_in':
                return $this->clock_in;
        }
    }
    
    
}