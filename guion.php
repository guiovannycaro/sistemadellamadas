<?php

require_once 'controlador/controladorguion.php';

$controller = new controlador_guion();



if (!empty($_REQUEST['g'])) {

    $metodo = $_REQUEST['g'];
    if (method_exists($controller, $metodo)) {

        $controller->$metodo();
    } else {
        $controller->index();
    }
} else {
    $controller->index();
}
?>