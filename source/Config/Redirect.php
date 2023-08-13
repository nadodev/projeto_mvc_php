<?php
namespace Source\Config;

class Redirect {
    public static function to($location) {
        header("Location: " . URL_BASE . $location); // Correção aqui
        exit;
    }
}
?>
