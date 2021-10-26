<?php
defined('BASEPATH') OR exit('No direct script access allowed');
//include("application/config/database.php");

class Excedente_model extends CI_Model{

	public function lista($idcliente){
		$this->db->select('*');
		$this->db->from('excedente');
		$this->db->where('estado',1);
		$this->db->where('idcliente',$idcliente);
		return $this->db->get();
	}

	
	public function agregarExcedente($costo){
		$this->db->insert('excedente',$costo);
	}

	public function modificarExcedente($idexcedente,$data)
	{	
		$this->db->where('idexcedente',$idexcedente);
		$this->db->update('excedente',$data);
	}

	public function eliminarClientebd($idcliente,$data)
	{	
		$this->db->where('idcliente',$idcliente);
		$this->db->update('cliente',$data);
	}
}