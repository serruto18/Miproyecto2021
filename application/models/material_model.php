<?php
defined('BASEPATH') OR exit('No direct script access allowed');
//include("application/config/database.php");

class Material_model extends CI_Model{

	public function lista(){
		$this->db->select('*');
		$this->db->from('material');
		return $this->db->get();
	}
	
	public function agregarMaterial($data){
		$this->db->insert('material',$data);
	}
	public function recuperarMaterial($idmaterial)
	{
		$this->db->select('*');
		$this->db->from('material');
		$this->db->where('idmaterial',$idmaterial);
		return $this->db->get();

	}
	public function modificarMaterial($idmaterial,$data)
	{	
		$this->db->where('idmaterial',$idmaterial);
		$this->db->update('material',$data);
	}
}