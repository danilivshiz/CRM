<?php

    class Validat { 


        public static function NotNull($value) {
            if($value == '')
            {
                return false;
            }
            return true;
        }

        public static function isNumber($value) {
            if(!ctype_digit($value))
            {
                return false;
            }
            return true;
        }

        public static function optionSelected($option) {
            if($option == '0')
            {
                return false;
            }
            return true;
        }
    }

