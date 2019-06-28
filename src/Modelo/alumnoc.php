<?php
namespace Modelo;

class alumnoc extends Usuario{

	protected $database;



	public function listado(){
		$data = $this->database->query("SELECT a.usuario_id, a.rut, u.id, u.nombre, u.apellido, a.carrera, u.username, u.password
										FROM alumno a JOIN usuario u
										ON a.usuario_id=u.id
										ORDER BY a.usuario_id ASC")->fetchAll();

		return $data;
	}

public function agregar($id, $rut, $nombre, $apellido,$carrera, $username, $password) {
	    parent::agregaru($id, $nombre, $apellido, $username, $password);
	    $usuario_id = $this->database->id(); 
		$this->database->insert("alumno",["usuario_id"=>$usuario_id,"rut"=>$rut,"carrera"=>$carrera]);
	}

	public function modificar($id, $rut, $nombre, $apellido, $carrera,$username, $password){
   		parent::modificaru($id, $nombre, $apellido, $username, $password);
		$this->database->update("alumno",["rut"=>$rut,"carrera"=>$carrera],["usuario_id"=>$id]);

   }


	public function eliminar($id){
		$this->database->delete("alumno", [ "AND" => [ "usuario_id" => $id ] ]);
		parent::eliminar($id);
	}

   





	
}