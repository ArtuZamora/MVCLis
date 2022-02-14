<?php
require_once 'Validation/validate.php';
if (isset($_POST)) {
    extract($_POST);
    $error_log = array();
    if (!isset($usuario['nombre']) || isEmpty($usuario['nombre']))
        $error_log["name_error"] = "Debes ingresar el nombre";
    else if (!isText($usuario['nombre']))
        $error_log["name_error"] = "Debes ingresar solamente letras";

    if (!isset($usuario['apellido']) || isEmpty($usuario['apellido']))
        $error_log["lastName_error"] = "Debes ingresar el apellido";
    else if (!isText($usuario['apellido']))
        $error_log["lastName_error"] = "Debes ingresar solamente letras";

    if (!isset($usuario['email']) || isEmpty($usuario['email']))
        $error_log["email_error"] = "Debes ingresar el correo";
    else if (!isEmail($usuario['email']))
        $error_log["email_error"] = "Debes ingresar un correo electrónico válido";

    if (!isset($usuario['edad']) || isEmpty($usuario['edad']))
        $error_log["age_error"] = "Debes ingresar la edad";
    else if (!isAge($usuario['edad']))
        $error_log["age_error"] = "Debes ingresar una edad valida";

    if (!isset($usuario['telefono']) || isEmpty($usuario['telefono']))
        $error_log["telephone_error"] = "Debes ingresar el telefono";
    else if (!isTelephone($usuario['telefono']))
        $error_log["telephone_error"] = "Debes ingresar un número de teléfono válido";

    if (!isset($usuario['carnet']) || isEmpty($usuario['carnet']))
        $error_log["license_error"] = "Debes ingresar el carnet";
    else if (!isLicense($usuario['carnet']))
        $error_log["license_error"] = "Debes ingresar un carnet válido";
}
