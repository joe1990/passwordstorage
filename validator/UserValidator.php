<?php

/**
 * Include methods for the validation of an user-object or an user-password.
 * 
 * @author Joel Holzer <joe_ehcb@hotmail.com>
 * @version 1.0
 */
class UserValidator {

    /**
     * Validates an user-object for the registration.
     * It validates username, password and passwordagain with following criterias:
     * -empty
     * -max. string length
     * -min. string length
     * -username already exists in the system
     * -password again match with password.
     * 
     * @param User $user User to validate.
     * @return array Array with fault-objects (for every fault one object in the array). null if no validation error.
     */
    public function validateRegister(User $user) {
        $faults = null;
        $username = $user->getUsername();
        $password = $user->getPassword();
        $passwordAgain = $user->getPasswordagain();
        $userRepository = new UserRepository();
        
        if (!$username) {
            $fault = new Fault('Must not be empty', 'Username');
            $faults[] = $fault->toArray();
        } elseif (strlen($username) < 5) {
            $fault = new Fault('Must have at least 5 characters', 'Username');
            $faults[] = $fault->toArray();
        } elseif (strlen($username) > 50) {
            $fault = new Fault('May be a maximum of 50 characters', 'Username');
            $faults[] = $fault->toArray();
        } elseif ($userRepository->isUsernameExists($username)) {
            $fault = new Fault('Already exists in the system', 'Username');
            $faults[] = $fault->toArray();
        }
        
        $this->validatePassword($password, $passwordAgain, $faults);
        
        return $faults;
    }
    
    /**
     * Validate the password and the password again for the profile (change password).
     * It validates password and passwordagain with following criterias:
     * -empty
     * -max. string length
     * -min. string length
     * -password again match with password.
     * 
     * @param string $password password to validate.
     * @param string $passwordAgain password again to validate.
     * @return Array with fault-objects (for every fault one object in the array). null if no validation error.
     */
    public function validateProfile($password, $passwordAgain) {
        $faults = null;
        
        $this->validatePassword($password, $passwordAgain, $faults);
        
        return $faults;
    }
    
    /**
     * Validate the password and the password again.
     * It validates password and passwordagain with following criterias:
     * -empty
     * -max. string length
     * -min. string length
     * -password again match with password.
     * 
     * @param string $password password to validate.
     * @param string $passwordAgain password to validate.
     * @param array $faults Array with fault-objects. Pass by reference.
     */
    private function validatePassword($password, $passwordAgain, &$faults) {
        if (!$password) {
            $fault = new Fault('Must not be empty', 'Password');
            $faults[] = $fault->toArray();
        } elseif (strlen($password) < 5) {
            $fault = new Fault('Must have at least 5 characters', 'Password');
            $faults[] = $fault->toArray();
        } elseif (strlen($password) > 40) {
            $fault = new Fault('May be a maximum of 40 characters', 'Password');
            $faults[] = $fault->toArray();
        }
        
        if (!$passwordAgain) {
            $fault = new Fault('Must not be empty', 'Re-enter Password ');
            $faults[] = $fault->toArray();
        } elseif ($passwordAgain != $password) {
            $fault = new Fault('Must match with the password', 'Re-enter Password ');
            $faults[] = $fault->toArray();
        }
    }
}
?>
