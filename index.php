<?php
if (!isset($_REQUEST['controller']) || !isset($_REQUEST['action'])) {
    $controller = 'Usuario';
    require_once 'Controller/' . $controller . 'Controller.php';
    $controller = $controller . 'Controller';
    $controller = new $controller;
    $controller->Index();
} else {
    $controller = $_REQUEST['controller'];
    require_once 'Controller/' . $_REQUEST['controller'] . 'Controller.php';
    $controller = $controller . 'Controller';
    $controller = new $controller;
    call_user_func(array($controller, $_REQUEST['action']), isset($_REQUEST['id']) ? $_REQUEST['id'] : null);
}
