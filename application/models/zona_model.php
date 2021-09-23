<?php
defined('BASEPATH') OR exit('No direct script access allowed');
//include("application/config/database.php");

class Zona_model extends CI_Model{

	public function lista(){
		$this->db->select('*');
		$this->db->from('zonatrabaja');
		return $this->db->get();
	}
	
	public function agregarZona($data){
		$this->db->insert('zonatrabaja',$data);
	}
	public function recuperarZona($idzonatrabaja)
	{
		$this->db->select('*');
		$this->db->from('zonatrabaja');
		$this->db->where('idzonatrabaja',$idzonatrabaja);
		return $this->db->get();

	}
	public function modificarZona($idzonatrabaja,$data)
	{	
		$this->db->where('idzonatrabaja',$idzonatrabaja);
		$this->db->update('zonatrabaja',$data);
	}
}