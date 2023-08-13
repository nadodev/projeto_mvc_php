<?php

namespace Source\Helpers;
class ErrorHandler {
    public static function throwError($message) {
        echo $message; 
        exit(); 
    }
}

?>