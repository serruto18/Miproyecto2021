<?php
defined('BASEPATH') OR exit('No direct script access allowed');
//include("application/config/database.php");

class Inspector_model extends CI_Model{

	public function lista(){
		$this->db->select('*');
		$this->db->from('inspector');
		$this->db->where('estado',1);
		return $this->db->get();
	}
	
	public function agregarInspector($data){
		$this->db->insert('inspector',$data);
	}
	public function recuperarInspector($idinspector)
	{
		$this->db->select('*');
		$this->db->from('inspector');
		$this->db->where('idinspector',$idinspector);
		return $this->db->get();

	}
	public function modificarInspector($idinspector,$data)
	{	
		$this->db->where('idinspector',$idinspector);
		$this->db->update('inspector',$data);
	}

	public function eliminarInspectorbd($idinspector,$data)
	{	
		$this->db->where('idinspector',$idinspector);
		$this->db->update('inspector',$data);
	}
}