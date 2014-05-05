<?php

/**
 * Model-Class for an account-object.
 * 
 * @author Joel Holzer <joe_ehcb@hotmail.com>
 * @version 1.0
 */
class Account {
    private $id;
    private $title;
    private $website;
    private $username;
    private $password;
    private $userid;
    
    /**
     * Constructor. Initialize the title, website, username and password and the id of the account. All params are optional (Must be so for the PDO Object mapping).
     * 
     * @param string $title Title for the account. Could be null.
     * @param string $website Website for the account. Could be null.
     * @param string $username Username for the account. Could be null.
     * @param string $password Password for the account. Could be null.
     * @param int $id Id for the account. Could be null. Could be null.
     */
    public function __construct($title = null, $website = null, $username = null, $password = null, $id = null) {
        if ($title != null) {
            $this->title = $title;
        }
        if ($website != null) {
            $this->website = $website;
        }
        if ($username != null) {
            $this->username = $username;
        }
        if ($password != null) {
            $this->password = $password;
        }
        if ($id != null) {
            $this->id = $id;
        }
    }
    
    /**
     * Returns the id of the account.
     * @return int ID of the account.
     */
    public function getId() {
        return $this->id;
    }
    
    /**
     * Returns the title of the account.
     * @return string Title of the account
     */
    public function getTitle() {
        return $this->title;
    }
    
    /**
     * Returns the website-url of the account.
     * @return string Website-url of the account.
     */
    public function getWebsite() {
        return $this->website;
    }
    
    /**
     * Returns the username of the account.
     * @return string Username of the account.
     */
    public function getUsername() {
        return $this->username;
    }
    
    /**
     * Returns the password of the account.
     * @return string Password of the account.
     */
    public function getPassword() {
        return $this->password;
    }
    
    /**
     * Sets the password of the account.
     * @param string $password Password for the account.
     */
    public function setPassword($password) {
        $this->password = $password;
    }
    
    /**
     * Returns the id of the user who belongs to the account.
     * @return int ID of the user who belongs to the account.
     */
    public function getUserId() {
        return $this->userid;
    }
    
    /**
     * Sets the id of the user who belongs to the account.
     * @param int $userId ID of the user, who belongs to the account.
     */
    public function setUserId($userId) {
        $this->userid = $userId;
    }
}
?>
