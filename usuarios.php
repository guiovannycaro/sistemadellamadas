<?php

require_once 'controlador/controladorusuarios.php';

$controller = new controlador_sistema();



if (!empty($_REQUEST['m'])) {

    $metodo = $_REQUEST['m'];
    if (method_exists($controller, $metodo)) {

        $controller->$metodo();
    } else {
        $controller->index();
    }
} else {
    $controller->index();
}
?>