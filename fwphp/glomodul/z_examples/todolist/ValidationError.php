<?php
/*
 * 
 */

namespace TodoList\Validation;

/**
 * Validation error.
 */
final class ValidationError {

    private $source;
    private $message;


    /**
     * Create new validation error.
     * @param mixed $source source of the error
     * @param string $message error message
     */
    function __construct($source, $message) {
        $this->source = $source;
        $this->message = $message;
    }

    /**
     * Get source of the error.
     * @return mixed source of the error
     */
    public function getSource() {
        return $this->source;
    }

    /**
     * Get error message.
     * @return string error message
     */
    public function getMessage() {
        return $this->message;
    }

}
