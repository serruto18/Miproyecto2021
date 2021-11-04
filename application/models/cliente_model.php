<?php
defined('BASEPATH') OR exit('No direct script access allowed');
//include("application/config/database.php");

class Cliente_model extends CI_Model{

	public function lista(){
		$this->db->select('*');
		$this->db->from('cliente');
		$this->db->where('estado',1);
		return $this->db->get();
	}

	public function listaClienteZona($idzona){
		$this->db->select('*');
		$this->db->from('cliente');
		$this->db->where('estado',1);
		$this->db->where('idzona',$idzona);
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
	public function agregarCliente($data){
		$this->db->insert('cliente',$data);
	}
	public function recuperarCliente($idcliente)
	{
		$this->db->select('*');
		$this->db->from('cliente');
		$this->db->where('idcliente',$idcliente);
		return $this->db->get();

	}
	public function modificarCliente($idcliente,$data)
	{	
		$this->db->where('idcliente',$idcliente);
		$this->db->update('cliente',$data);
	}

	public function eliminarClientebd($idcliente,$data)
	{	
		$this->db->where('idcliente',$idcliente);
		$this->db->update('cliente',$data);
	}
}