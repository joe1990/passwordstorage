<?php

/**
 * Model-Class for a password-object for the password-generator. Only use to preselect the password-generator-form.
 * 
 * @author Joel Holzer <joe_ehcb@hotmail.com>
 * @version 1.0
 */
class Password {
    private $length;
    private $hasCharacters = false;
    private $hasDigits = false;
    private $hasSpecialCharacters = false;
    
    /**
     * Constructor. Initialize the length and optional the hasCharacter, hasDigits and hasSpecialCharacters.
     * 
     * @param string $length Length for the password.
     * @param string $hasCharacters Has password characters or no. 
     * @param string $hasDigits Has password digits or no. 
     * @param string $hasSpecialCharacters Has password special characters or no. 
     */
    public function __construct($length, $hasCharacters, $hasDigits, $hasSpecialCharacters) {
    
        $this->length = $length;
        $this->hasCharacters = $hasCharacters;
        $this->hasDigits = $hasDigits;
        $this->hasSpecialCharacters = $hasSpecialCharacters;
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
}
?>
