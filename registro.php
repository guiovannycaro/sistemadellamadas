<?php

require_once 'controlador/controladorregistro.php';

$controller = new controlador_registro();



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