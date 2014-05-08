<?php

/**
 * Model-Class for an user-object.
 * 
 * @author Joel Holzer <joe_ehcb@hotmail.com>
 * @version 1.0
 */
class User {
    private $id;
    private $username;
    private $password;
    private $passwordagain;
    
    /**
     * Constructor. Initalize the username and password and optional the passwordagain of the user.
     * 
     * @param string $username Username for the user.
     * @param string $password Password for the user.
     * @param string $passwordagain Password-Again for the user. Could be null.
     */
    public function __construct($username, $password, $passwordagain = null) {
        $this->username = $username;
        $this->password = $password;
        if ($passwordagain != null) {
            $this->passwordagain = $passwordagain;
        }
    }
    
    /**
     * Returns the id of the user.
     * @return int Id of the user.
     */
    public function getId() {
        return $this->id;
    }
    
    /**
     * Sets the id of the user.
     * @param int $id Id to set.
     */
    public function setId($id) {
        $this->id = $id;
    }
    
    /**
     * Returns the username of the user.
     * @return int Username of the user.
     */
    public function getUsername() {
        return $this->username;
    }
    
    /**
     * Returns the password of the user.
     * @return string Password of the user.
     */
    public function getPassword() {
        return $this->password;
    }
    
    /**
     * Sets the password of the user.
     * @param string $password Password to set.
     */
    public function setPassword($password) {
        $this->password = $password;
    }
    
    /**
     * Returns the password-again of the user.
     * @return string Password-Again of the user.
     */
    public function getPasswordagain() {
        return $this->passwordagain;
    }
}
?>
