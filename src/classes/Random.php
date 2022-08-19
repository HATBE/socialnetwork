<?php
    namespace app\Random;

    class Random {
        public static function generateId($prefix) {
            return str_replace('.', '', uniqid($prefix, true));
        }
    }