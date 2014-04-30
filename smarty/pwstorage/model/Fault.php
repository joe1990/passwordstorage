<?php

class Fault {
    private $field;
    private $message;
    
    public function __construct($message, $field = NULL) {
        $this->message = $message;
        if ($field != NULL) {
            $this->field = $field;
        }
    }
    
    public function toArray() {
        return array('field' => $this->field, 'message' => $this->message);
    }
}
?>
