<?php
defined('BASEPATH') OR exit('No direct script access allowed');
//include("application/config/database.php");

class Zona_model extends CI_Model{

	public function lista(){
		$this->db->select('*');
		$this->db->from('zonatrabaja');
		$this->db->where('estado',1);
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
	public function eliminaZonabd($idzonaTrabaja,$data)
	{	
		$this->db->where('idzonaTrabaja',$idzonaTrabaja);
		$this->db->update('zonatrabaja',$data);
	}
}