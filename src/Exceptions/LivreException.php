<?php

class LivreException extends \Exception {
    
        public function __construct($message = "Erreur liée à un livre", $code = 0, Throwable $previous = null) {
        parent::__construct($message, $code, $previous);
    }

    public function afficherMsgException() {
        return "LivreException: " . $this->getMessage();
    }
}