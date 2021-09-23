<?php
defined('BASEPATH') OR exit('No direct script access allowed');
//include("application/config/database.php");

class Empleado_model extends CI_Model{


	public function agregarEmpleado($data){
		$this->db->insert('empleado',$data);
		
		//mysql_query($db, "INSERT INTO empresa (razonsocial, registroanh, primerApellidoRep, segundoApellidoRep, nombreRep, direccion, telefono, usuario, login)VALUES ('$data')");
	}	

	public function lista(){
		$this->db->select('*');
		$this->db->from('empleado');
		return $this->db->get();
	}

	public function listaProyectista($proyectista){
		$this->db->select('*');
		$this->db->from('empleado');
		$this->db->where('categoria',$proyectista);
		return $this->db->get();
	}
	
	public function listaInstalador($instalador){
		$this->db->select('*');
		$this->db->from('empleado');
		$this->db->where('categoria',$instalador);
		return $this->db->get();
	}

	public function recuperarEmpleado($idusuario)
	{
		$this->db->select('*');
		$this->db->from('empleado');
		$this->db->where('idusuario',$idusuario);
		return $this->db->get();

	}
	

	public function modificarEmpleado($idusuario,$data)
	{	
		$this->db->where('idusuario',$idusuario);
		$this->db->update('empleado',$data);
	}

	public function buscarRepetido($nombre){
		$this->db->select('*');
		$this->db->from('empleado');
		$this->db->where('nombre',$nombre);
		return $this->db->get();
	}

	public function validar($nombre,$categoria)
	{
		$this->db->select('*');
		$this->db->from('empleado');
		$this->db->where('nombre',$nombre);
		$this->db->where('categoria',$categoria);
		return $this->db->get();	
	}	
	public function recuperarEmpleado1($idempleado)
	{
		$this->db->select('*');
		$this->db->from('empleado');
		$this->db->where('idempleado',$idempleado);
		return $this->db->get();

	}

	public function modificarEmpleadobd($idempleado,$data)
	{	
		$this->db->where('idempleado',$idempleado);
		$this->db->update('empleado',$data);
	}
}