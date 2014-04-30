<?php

class User {
    private $id;
    private $username;
    private $password;
    private $passwordagain;
    
    public function __construct($username, $password, $passwordagain = null) {
        $this->username = $username;
        $this->password = $password;
        if ($passwordagain != null) {
            $this->passwordagain = $passwordagain;
        }
    }
    
    public function getId() {
        return $this->id;
    }
    
    public function setId($id) {
        $this->id = $id;
    }
    
    public function getUsername() {
        return $this->username;
    }
    
    public function getPassword() {
        return $this->password;
    }
    
    public function setPassword($password) {
        $this->password = $password;
    }
    
    public function getPasswordagain() {
        return $this->passwordagain;
    }
}
?>
