<?php

class Model{
    // Create a dataset to simulate something found in a DB
    public $dataset = array(
        array("first_name"=>"John",
              "last_name"=>"Smith",
              "username"=>"josmith",
              "address"=>"1234 S First St",
              "city"=>"Tulsa",
              "state"=>"OK",
              "postalCode"=>"74119"),
        array("first_name"=>"Jane",
              "last_name"=>"Smith",
              "username"=>"jasmith",
              "address"=>"3921 Pearl St",
              "city"=>"Denver",
              "state"=>"CO",
              "postalCode"=>"80210"),
        array("first_name"=>"William",
              "last_name"=>"Branson",
              "username"=>"wibranson",
              "address"=>"5893 Drake St",
              "city"=>"Fort Collins",
              "state"=>"CO",
              "postalCode"=>"80525"),
        array("first_name"=>"Andrew",
              "last_name"=>"Marick",
              "username"=>"anmarick",
              "address"=>"8214 Main St",
              "city"=>"Raton",
              "state"=>"NM",
              "postalCode"=>"87740"),
        array("first_name"=>"Mike",
              "last_name"=>"Siever",
              "username"=>"misiever",
              "address"=>"8823 Crescent Cir",
              "city"=>"Timnath",
              "state"=>"CO",
              "postalCode"=>"80547"),
    );

    public function getUserById($userId){
        // Get information from the model by userID (or array index in this case)
        if (!$userId) {
            return $this->dataset;
        }
        if (!$this->checkId($userId)){
            throw new Exception('Requested non-existent user ID');
        }
        return $this->dataset[$userId];
    }

    private function checkId($userId){
        $max_id = count($this->dataset);
        if ($userId < $max_id){
            return True;
        } else {
            return False;
        }

    }

    public function addUser($fname, $lname, $uname, $addr, $city, $state, $pcode){
        // Add a user to the dataset (non persistent in this example, but if db backed
        // this would allow access.  This is also where I would put data validation
        // and escaping to handle any attempted injections
        $this->dataset[] = array(
            "first_name"=>$fname,
            "last_name"=>$lname,
            "username"=>$uname,
            "address"=>$addr,
            "city"=>$city,
            "state"=>$state,
            "postalCode"=>$pcode
        );
    }

    public function showName($userId){
        if (!$this->checkId($userId)){
            return NULL;
        }
        $userData = $this->dataset[$userId];
        $name = $userData['first_name'] . ' ' . $userData['last_name'];
        return $name;
    }

    public function dumpData(){
        var_dump($this->dataset);
    }

}
?>