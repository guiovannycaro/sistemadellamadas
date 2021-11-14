<?php

require_once("db/coneccion.php");

require_once 'controlador/controladorregistro.php';

require_once 'Registro.php';

class consultasRegistro {

    private $pdo;

    public function __CONSTRUCT() {
        try {
            $this->pdo = controldb::StartUp();
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    public function Listarusuarios() {
        try {
            $result = array();

            $stm = $this->pdo->prepare("SELECT * FROM uentrantes");
            $stm->execute();

            return $stm->fetchAll(PDO::FETCH_OBJ);
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    public function Listarsalientes() {
        try {
            $result = array();

            $stm = $this->pdo->prepare("SELECT * FROM usalientes");
            $stm->execute();

            return $stm->fetchAll(PDO::FETCH_OBJ);
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    public function Listarguion() {
        try {
            $result = array();

            $stm = $this->pdo->prepare("SELECT * FROM guion");
            $stm->execute();

            return $stm->fetchAll(PDO::FETCH_OBJ);
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    public function Listar() {
        try {
            $result = array();

            $stm = $this->pdo->prepare("SELECT uentrantes.id,uentrantes.nombres,uentrantes.apellidos,guion.nombre as guion,
		usalientes.nombres as nombrecliente,usalientes.apellidos as apellidocliente,llamadasxusuarioxguion.fechahora,llamadasxusuarioxguion.duracion
		FROM llamadasxusuarioxguion
	   join uentrantes on  llamadasxusuarioxguion.iduentrante = uentrantes.id
	   join usalientes on  llamadasxusuarioxguion.idusaliente = usalientes.id
	   join guion on  llamadasxusuarioxguion.idguion =  guion.id");
            $stm->execute();

            return $stm->fetchAll(PDO::FETCH_OBJ);
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    public function Obtener($id) {
        try {
            $stm = $this->pdo
                    ->prepare("SELECT * FROM llamadasxusuarioxguion WHERE id = ?");


            $stm->execute(array($id));
            return $stm->fetch(PDO::FETCH_OBJ);
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    public function Eliminar($id) {
        try {
            $stm = $this->pdo
                    ->prepare("DELETE FROM llamadasxusuarioxguion WHERE id = ?");

            $stm->execute(array($id));
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    public function Registrar(Registro $data) {
        try {

            $sql = "INSERT INTO llamadasxusuarioxguion(iduentrante,idusaliente,idguion,fechahora,duracion)
			VALUES (?,?,?,?,?)";

            $this->pdo->prepare($sql)
                    ->execute(
                            array(
                                $data->iduentrante,
                                $data->idusaliente,
                                $data->idguion,
                                $data->fechahora,
                                $data->duracion
                            )
            );
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    public function Actualizar($data) {
        try {
            $sql = "UPDATE llamadasxusuarioxguion SET 
						iduentrante  = ?,
						idusaliente   = ?, 
						idguion   = ?,
						fechahora      = ?, 
						duracion   = ?
				    WHERE id = ?";

            $this->pdo->prepare($sql)
                    ->execute(
                            array(
                                $data->iduentrante,
                                $data->idusaliente,
                                $data->idguion,
                                $data->fechahora,
                                $data->duracion,
                                $data->id
                            )
            );
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

}

?>