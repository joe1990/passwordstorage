<?php

class RegisterValidator {

    public function validate(User $user) {
        $faults = null;
        $username = $user->getUsername();
        $password = $user->getPassword();
        $passwordAgain = $user->getPasswordagain();
        $persistenceManager = new PersistenceManager();
        
        if (!$username) {
            $fault = new Fault('Must not be empty.', 'Username');
            $faults[] = $fault->toArray();
        } elseif (strlen($username) < 5) {
            $fault = new Fault('Must have at least 5 characters.', 'Username');
            $faults[] = $fault->toArray();
        } elseif (strlen($username) > 50) {
            $fault = new Fault('May be a maximum of 50 characters.', 'Username');
            $faults[] = $fault->toArray();
        } elseif ($persistenceManager->isUsernameExists($username)) {
            $fault = new Fault('Already exists in the system.', 'Username');
            $faults[] = $fault->toArray();
        }
        
        if (!$password) {
            $fault = new Fault('Must not be empty.', 'Password');
            $faults[] = $fault->toArray();
        } elseif (strlen($password) < 5) {
            $fault = new Fault('Must have at least 5 characters.', 'Password');
            $faults[] = $fault->toArray();
        } elseif (strlen($password) > 40) {
            $fault = new Fault('May be a maximum of 40 characters.', 'Username');
            $faults[] = $fault->toArray();
        }
        
        if (!$passwordAgain) {
            $fault = new Fault('Must not be empty.', 'Re-enter Password ');
            $faults[] = $fault->toArray();
        } elseif ($passwordAgain != $password) {
            $fault = new Fault('Muss match with the password.', 'Re-enter Password ');
            $faults[] = $fault->toArray();
        }
        return $faults;
    }
}
?>
