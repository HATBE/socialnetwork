<?php
    namespace app;

    class Template {
        public static function load(string $name, array $data = array()) {
            if(file_exists(__DIR__ . '/../templates/' . $name . '.php')) {
                extract($data, EXTR_SKIP); // extract vars from input array, skip if double
                $a = require(__DIR__ . '/../templates/' . $name . '.php'); // load template drom templates folder
            } else {
                // throw error if template don't exist
                echo "<b>Error!</b> Template <b>\"{$name}\"</b> not found!";
            }
        }
    }