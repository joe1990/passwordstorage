<?php

class AddAccountValidator {

    public function validate(Account $account) {
        $faults = null;
        $title = $account->getTitle();
        $website = $account->getWebsite();
        $username = $account->getUsername();
        $password = $account->getPassword();
        
        if (!$title) {
            $fault = new Fault('Must not be empty.', 'Title');
            $faults[] = $fault->toArray();
        } elseif (strlen($title) > 50) {
            $fault = new Fault('May be a maximum of 50 characters.', 'Title');
            $faults[] = $fault->toArray();
        }
        
        $patternUrl = "/\b(?:(?:https?|ftp):\/\/|www\.)[-a-z0-9+&@#\/%?=~_|!:,.;]*[-a-z0-9+&@#\/%=~_|]/i";

        if (!$website) {
            $fault = new Fault('Must not be empty.', 'Website');
            $faults[] = $fault->toArray();
        } elseif (strlen($website) > 100) {
            $fault = new Fault('May be a maximum of 100 characters.', 'Website');
            $faults[] = $fault->toArray();
        } elseif (!preg_match($patternUrl, $website)) {
            $fault = new Fault('Must be a valid URL', 'Website');
            $faults[] = $fault->toArray();
        }
        
        if (!$username) {
            $fault = new Fault('Must not be empty.', 'Username');
            $faults[] = $fault->toArray();
        } elseif (strlen($username) > 50) {
            $fault = new Fault('May be a maximum of 50 characters.', 'Username');
            $faults[] = $fault->toArray();
        }
        
        if (!$password) {
            $fault = new Fault('Must not be empty.', 'Password');
            $faults[] = $fault->toArray();
        } elseif (strlen($password) > 40) {
            $fault = new Fault('May be a maximum of 40 characters.', 'Password');
            $faults[] = $fault->toArray();
        }
        
        return $faults;
    }
}
?>
