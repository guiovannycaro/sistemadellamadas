<?php

require_once 'controlador/controladorroles.php';

$controller = new controlador_roles();



if (!empty($_REQUEST['r'])) {

    $metodo = $_REQUEST['r'];
    if (method_exists($controller, $metodo)) {

        $controller->$metodo();
    } else {
        $controller->index();
    }
} else {
    $controller->index();
}
?>