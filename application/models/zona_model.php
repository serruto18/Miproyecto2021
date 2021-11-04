<?php
defined('BASEPATH') OR exit('No direct script access allowed');
//include("application/config/database.php");

class Zona_model extends CI_Model{

	public function lista(){
		$this->db->select('*');
		$this->db->from('zona');
		$this->db->where('estado',1);
		return $this->db->get();
	}
	
	public function agregarZona($data){
		$this->db->insert('zona',$data);
	}
	public function recuperarZona($idzonatrabaja)
	{
		$this->db->select('*');
		$this->db->from('zona');
		$this->db->where('idzona',$idzonatrabaja);
		return $this->db->get();

	}
	public function modificarZona($idzonatrabaja,$data)
	{	
		$this->db->where('idzona',$idzonatrabaja);
		$this->db->update('zona',$data);
	}
	public function eliminaZonabd($idzonaTrabaja,$data)
	{	
		$this->db->where('idzona',$idzonaTrabaja);
		$this->db->update('zona',$data);
	}
}