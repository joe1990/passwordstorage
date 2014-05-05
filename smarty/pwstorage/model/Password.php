<?php

/**
 * Model-Class for a password-object for the password-generator
 * 
 * @author Joel Holzer <joe_ehcb@hotmail.com>
 * @version 1.0
 */
class Password {
    private $length;
    private $hasCharacters = false;
    private $hasDigits = false;
    private $hasSpecialCharacters = false;
    private $password;
    
    /**
     * Constructor. Initialize the length and optional the hasCharacter, hasDigits, hasSpecialCharacters and password.
     * 
     * @param string $length Length for the password.
     * @param string $hasCharacters Has password characters or no. 
     * @param string $hasDigits Has password digits or no. 
     * @param string $hasSpecialCharacters Has password special characters or no. 
     * @param $password $password Password.
     */
    public function __construct($length, $hasCharacters, $hasDigits, $hasSpecialCharacters, $password = null) {
    
        $this->length = $length;
        $this->hasCharacters = $hasCharacters;
        $this->hasDigits = $hasDigits;
        $this->hasSpecialCharacters = $hasSpecialCharacters;
        
        if ($password != null) {
            $this->password = $password;
        }
    }

    /**
     * Returns the length of the password.
     * 
     * @return int Length of the password.
     */
    public function getLength() {
        return $this->length;
    }
    
    /**
     * Returns true if the password has characters and false if has no characters.
     * 
     * @return bool True if the password has characters and false if has no.
     */
    public function hasCharacters() {
        return $this->hasCharacters;
    }
    
    /**
     * Returns true if the password has digits and false if has no digits.
     * 
     * @return bool True if the password has digits and false if has no.
     */
    public function hasDigits() {
        return $this->hasDigits;
    }
    
    /**
     * Returns true if the password has special characters and false if has no special characters.
     * 
     * @return bool True if the password has special characters and false if has no.
     */
    public function hasSpecialCharacters() {
        return $this->hasSpecialCharacters;
    }
    
    /**
     * Returns the password of the password-object.
     * @return string password of the password-object.
     */
    public function getPassword() {
        return $this->password;
    }
    
    /**
     * Sets the generated-password of the password-object.
     * @param string $password Password for the password-object.
     */
    public function setPassword($password) {
        $this->password = $password;
    }
}
?>
