<?php

require_once 'controlador/controladorusalientes.php';

$controller = new controlador_sistema();



if (!empty($_REQUEST['s'])) {

    $metodo = $_REQUEST['s'];
    if (method_exists($controller, $metodo)) {

        $controller->$metodo();
    } else {
        $controller->index();
    }
} else {
    $controller->index();
}
?>