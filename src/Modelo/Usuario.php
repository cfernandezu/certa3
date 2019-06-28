<?php
namespace Modelo;

class Usuario {

	protected $database;

	public function __construct($container)
	{	
		$this->database = $container->database;
	}

	public function datos(){
		$arr = $this->database->select('usuario', ['id','nombre','apellido', 'username','password']);
		return $arr;
	}

	public function unusuario($id) {
		$data = $this->database->select( "usuario",["nombre","apellido","username","password"],["id"=>$id]);
		return $data;
	}
	
	public function agregaru($id, $nombre, $apellido, $username, $password) {
		$this->database->insert("usuario",["id"=>$id,"nombre"=>$nombre,"apellido"=>$apellido,"username"=>"$username","password"=>"$password"]);
	}

	public function	modificaru($id, $nombre, $apellido, $username, $password) {
		$data = $this->database->update("usuario",["nombre"=>$nombre, "apellido"=>$apellido,"username"=>"$username","password"=>"$password"],["id"=>$id]);
		return $data;
	}

	public function eliminar($id) {
		$this->database->delete("usuario", ["AND" => ["id" => $id]]);
	}

}