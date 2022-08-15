<?php
    namespace app\Random;

    class Random {
        public static function generateUid($prefix) {
            return str_replace('.', '', uniqid($prefix, true));
        }
    }