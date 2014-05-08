<?php

/**
 * Include methods for the validation of an password-object.
 * 
 * @author Joel Holzer <joe_ehcb@hotmail.com>
 * @version 1.0
 */
class PasswordValidator {

    /**
     * Validate the password-object.
     * It validates the length of the password-object with following criterias:
     * -empty / 0
     * - > 30
     * It also validates if one of hasCharacters, hasDigits and hasSpecialCharacters is select.
     * 
     * @param Password $password Password-object to validate.
     * @return array Array with fault-objects (for every fault one object in the array). null if no validation error.
     */
    public function validate(Password $password) {
        
        $faults = null;
        //Length
        if (!$password->getLength()) {
            $fault = new Fault('Must greater than 0', 'Length');
            $faults[] = $fault->toArray();
        } elseif ($password->getLength() > 30) {
            $fault = new Fault('Must not be greater than 30', 'Length');
            $faults[] = $fault->toArray();
        }
        
        //One of the attributes hasCharacters, hasDigits and hasSpecialCharacters must be true.
        if (!$password->hasCharacters() && !$password->hasDigits() && !$password->hasSpecialCharacters()) {
            $fault = new Fault('One of them must select', 'Character/Digits/Special Characters');
            $faults[] = $fault->toArray();
        }
        
        return $faults;
    }
}
?>
