<?php

class Model{
    // Create a dataset to simulate something found in a DB
    public $dataset = array(
        array("First Name"=>"John",
              "Last Name"=>"Smith",
              "Username"=>"josmith",
              "Address"=>"1234 S First St",
              "City"=>"Tulsa",
              "State"=>"OK",
              "Postal Code"=>"74119"),
        array("First Name"=>"Jane",
              "Last Name"=>"Smith",
              "Username"=>"jasmith",
              "Address"=>"3921 Pearl St",
              "City"=>"Denver",
              "State"=>"CO",
              "Postal Code"=>"80210"),
        array("First Name"=>"William",
              "Last Name"=>"Branson",
              "Username"=>"wibranson",
              "Address"=>"5893 Drake St",
              "City"=>"Fort Collins",
              "State"=>"CO",
              "Postal Code"=>"80525"),
        array("First Name"=>"Andrew",
              "Last Name"=>"Marick",
              "Username"=>"anmarick",
              "Address"=>"8214 Main St",
              "City"=>"Raton",
              "State"=>"NM",
              "Postal Code"=>"87740"),
        array("First Name"=>"Mike",
              "Last Name"=>"Siever",
              "Username"=>"misiever",
              "Address"=>"8823 Crescent Cir",
              "City"=>"Timnath",
              "State"=>"CO",
              "Postal Code"=>"80547"),
    );

    public function getUserById($userId){
        // Get information from the model by userID (or array index in this case)
        if ($userId == NULL) {
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
            "First Name"=>$fname,
            "Last Name"=>$lname,
            "Username"=>$uname,
            "Address"=>$addr,
            "City"=>$city,
            "State"=>$state,
            "Postal Code"=>$pcode
        );
    }

    public function showName($userId){
        if (!$this->checkId($userId)){
            return NULL;
        }
        $userData = $this->dataset[$userId];
        $name = $userData['First Name'] . ' ' . $userData['Last Name'];
        return $name;
    }

    public function dumpData(){
        var_dump($this->dataset);
    }

}
?>