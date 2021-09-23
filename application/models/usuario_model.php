<?php
defined('BASEPATH') OR exit('No direct script access allowed');
//include("application/config/database.php");

class Usuario_model extends CI_Model{

	public function agregarUsuario($dataLogin)
	{
		$this->db->insert('usuario', $dataLogin);
	}

	public function lista(){
		$this->db->select('*');
		$this->db->from('usuario');
		return $this->db->get();
	}

	public function validar($login,$pass)
	{
		$this->db->select('*');
		$this->db->from('usuario');
		$this->db->where('login',$login);
		$this->db->where('pass',$pass);
		return $this->db->get();	
	}	
}