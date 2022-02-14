<?php
    function isEmpty($field){
        return empty(trim($field));
    }

    function isText($field){
        return preg_match('/^[a-zA-Z ]+$/', $field);
    }

    function isEmail($email){
        return filter_var($email, FILTER_VALIDATE_EMAIL);
    }

    function isLicense($field){
        return preg_match('/^[A-Z]{2}[0-9]{6}+$/', $field);
    }

    function isTelephone($field){
        return preg_match('/^[267][0-9]{3}-?[0-9]{4}$/', $field);
    }

    function isAge($field){
        return is_numeric($field) && (int)$field > 0;
    }
?>