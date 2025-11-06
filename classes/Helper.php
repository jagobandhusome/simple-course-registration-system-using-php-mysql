<?php
 
class Helper{
    public static function string2hash($string = null) {
        if(!empty($string)) {
            return hash('sha512', $string);
        }
    }
 
    public static function redirect($url = null) {
        if(!empty($url)) {
            header("Location: ". SITE_URL.$url);
        }
    }
}