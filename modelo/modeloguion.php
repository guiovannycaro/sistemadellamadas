<?php

require_once("db/coneccion.php");

require_once 'controlador/controladorguion.php';
require_once 'Guion.php';

class consultasGuion {

    private $pdo;

    public function __CONSTRUCT() {
        try {
            $this->pdo = controldb::StartUp();
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    public function Listar() {
        try {
            $result = array();

            $stm = $this->pdo->prepare("SELECT * FROM guion");
            $stm->execute();

            return $stm->fetchAll(PDO::FETCH_OBJ);
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    public function Obtener($id) {
        try {
            $stm = $this->pdo
                    ->prepare("SELECT * FROM guion WHERE id = ?");


            $stm->execute(array($id));
            return $stm->fetch(PDO::FETCH_OBJ);
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    public function Eliminar($id) {
        try {
            $stm = $this->pdo
                    ->prepare("DELETE FROM guion WHERE id = ?");

            $stm->execute(array($id));
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    public function Registrar(Guion $data) {
        try {

            $sql = "INSERT INTO guion(nombre,descripcion,observacion)
			VALUES (?, ?, ?)";

            $this->pdo->prepare($sql)
                    ->execute(
                            array(
                                $data->nombre,
                                $data->descripcion,
                                $data->observacion
                            )
            );
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    public function Actualizar($data) {
        try {
            $sql = "UPDATE guion SET 
						nombre     = ?,
						descripcion   = ?, 
						observacion     = ?
				    WHERE id = ?";

            $this->pdo->prepare($sql)
                    ->execute(
                            array(
                                $data->nombre,
                                $data->descripcion,
                                $data->observacion,
                                $data->id
                            )
            );
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

}

?>