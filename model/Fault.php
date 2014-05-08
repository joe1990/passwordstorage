<?php

/**
 * Model-Class for a fault. Faults will be displayed in the views if validation errors occured.
 * 
 * @author Joel Holzer <joe_ehcb@hotmail.com>
 * @version 1.0
 */
class Fault {
    private $field;
    private $message;
    
    /**
     * Constructor. Initialize the message and optional the field, which the fault belongs to, of the fault.
     * 
     * @param string $message Message for the fault.
     * @param string $field Field which the fault belongs to. Could be null.
     */
    public function __construct($message, $field = null) {
        $this->message = $message;
        if ($field != null) {
            $this->field = $field;
        }
    }
    
    /**
     * Transform a fault-object to an array in format array('field' => $this->field, 'message' => $this->message) and return this array.
     * @return array Array of the transformed fault-object.
     */
    public function toArray() {
        return array('field' => $this->field, 'message' => $this->message);
    }
}
?>
