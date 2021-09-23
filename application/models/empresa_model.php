<?php
defined('BASEPATH') OR exit('No direct script access allowed');
//include("application/config/database.php");

class Empresa_model extends CI_Model{


	public function agregarEmpresa($data){
		$this->db->insert('empresa',$data);
		
		//mysql_query($db, "INSERT INTO empresa (razonsocial, registroanh, primerApellidoRep, segundoApellidoRep, nombreRep, direccion, telefono, usuario, login)VALUES ('$data')");
	}	

	public function lista(){
		$this->db->select('*');
		$this->db->from('empresa');
		return $this->db->get();
	}

	public function recuperarEmpresa($idusuario)
	{
		$this->db->select('*');
		$this->db->from('empresa');
		$this->db->where('idusuario',$idusuario);
		return $this->db->get();

	}

	public function modificarEmpresa($idusuario,$data)
	{	
		$this->db->where('idusuario',$idusuario);
		$this->db->update('empresa',$data);
	}

}