<?php

require_once("db/coneccion.php");

require_once 'controlador/controladorusalientes.php';
require_once 'Usalientes.php';

class consultas {

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

            $stm = $this->pdo->prepare("SELECT * FROM usalientes");
            $stm->execute();

            return $stm->fetchAll(PDO::FETCH_OBJ);
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    public function Listarroles() {
        try {
            $result = array();

            $stm = $this->pdo->prepare("SELECT * FROM roles");
            $stm->execute();

            return $stm->fetchAll(PDO::FETCH_OBJ);
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    public function Obtener($id) {
        try {
            $stm = $this->pdo
                    ->prepare("SELECT * FROM usalientes WHERE id = ?");


            $stm->execute(array($id));
            return $stm->fetch(PDO::FETCH_OBJ);
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    public function Eliminar($id) {
        try {
            $stm = $this->pdo
                    ->prepare("DELETE FROM usalientes WHERE id = ?");

            $stm->execute(array($id));
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    public function Registrar(Usuarios $data) {
        try {

            $sql = "INSERT INTO usalientes(nombres,apellidos,idrol,correo)
			VALUES (?, ?, ?, ?)";

            $this->pdo->prepare($sql)
                    ->execute(
                            array(
                                $data->nombres,
                                $data->apellidos,
                                $data->idrol,
                                $data->correo
                            )
            );
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    public function Actualizar($data) {
        try {
            $sql = "UPDATE usalientes SET 
						nombres     = ?,
						apellidos   = ?, 
                        idrol         = ?,
						correo      = ?
				    WHERE id = ?";

            $this->pdo->prepare($sql)
                    ->execute(
                            array(
                                $data->nombres,
                                $data->apellidos,
                                $data->idrol,
                                $data->correo,
                                $data->id
                            )
            );
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

}

?>