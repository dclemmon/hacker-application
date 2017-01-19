<?php

class Model{
    // Create a dataset to simulate something like a DB interface
    public $dataset = array(
        array("first_name"=>"John",
              "last_name"=>"Smith",
              "username"=>"josmith",
              "address"=>"1234 S First St",
              "city"=>"",
              "state"=>"",
              "postalCode"=>""),
        array("first_name"=>"Jane",
              "last_name"=>"Smith",
              "username"=>"jasmith",
              "address"=>"",
              "city"=>"",
              "state"=>"",
              "postalCode"=>""),
        array("first_name"=>"William",
              "last_name"=>"",
              "address"=>"",
              "username"=>"",
              "city"=>"",
              "state"=>"",
              "postalCode"=>""),
        array("first_name"=>"Andrew",
              "last_name"=>"",
              "username"=>"",
              "address"=>"",
              "city"=>"",
              "state"=>"",
              "postalCode"=>""),
        array("first_name"=>"Mike",
              "last_name"=>"",
              "username"=>"",
              "address"=>"",
              "city"=>"",
              "state"=>"",
              "postalCode"=>""),
    );

    public function getUserById($userId){
        return $this->dataset[$userId];
    }

    public function dumpData(){
        var_dump($this->dataset);
    }

}

$model = new Model;

$model->dumpData();

var_dump($model->getUserById(4));

?>