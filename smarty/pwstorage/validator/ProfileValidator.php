<?php

class ProfileValidator {

    public function validate($password, $passwordAgain) {
        $faults = null;
        
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
