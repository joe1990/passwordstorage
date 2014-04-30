<?php

class Account {
    private $id;
    private $title;
    private $website;
    private $username;
    private $password;
    private $userId;
    
    public function getId() {
        return $this->id;
    }
    
    public function getTitle() {
        return $this->title;
    }
    
    public function setTitle($title) {
        $this->title = $title;
    }
    
    public function getWebsite() {
        return $this->website;
    }
    
    public function setWebsite($website) {
        $this->website = $website;
    }
    
    public function getUsername() {
        return $this->username;
    }
    
    public function setUsername($username) {
        $this->username = $username;
    }
    
    public function getPassword() {
        return $this->password;
    }
    
    public function setPassword($password) {
        $this->password = $password;
    }
    
    public function getUserId() {
        return $this->userId;
    }
}
?>
