<?php

namespace Source\Helpers;

class FlashMessage {
    public static function set($key, $message) {
        return $_SESSION['flash'][$key] = $message;

    }

    public static function get($key) {
        if (isset($_SESSION['flash'][$key])) {
            $message = $_SESSION['flash'][$key];
            unset($_SESSION['flash'][$key]);
            return $message;
        }
        return null;
    }
}

?>