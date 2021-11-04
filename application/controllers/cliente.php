<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Cliente extends CI_Controller {
	

	public function verlista(){
		$lista=$this->usuario_model->lista();
		$data1['usuario']=$lista;
		$lista=$this->cliente_model->lista();
		$data['cliente']=$lista;


		$this->load->view('inc_head.php');
		if ($this->session->userdata('rol')=='admin') {
			$this->load->view('inc_menuEmpresa',$data1);
		}
		if ($this->session->userdata('rol')=='proyectista') {
			$this->load->view('inc_menuProyectista',$data1);
		}
		$this->load->view('lista_clienteUnica',$data);
		$this->load->view('inc_footer.php');
	}

	public function verlistaZona(){
		$lista=$this->usuario_model->lista();
		$data1['usuario']=$lista;
		$idzona=$_POST['idzona'];
		$lista=$this->cliente_model->listaClienteZona($idzona);
		$data['cliente']=$lista;


		$this->load->view('inc_head.php');
		if ($this->session->userdata('rol')=='admin') {
			$this->load->view('inc_menuEmpresa',$data1);
		}
		if ($this->session->userdata('rol')=='proyectista') {
			$this->load->view('inc_menuProyectista',$data1);
		}
		$this->load->view('lista_cliente',$data);
		$this->load->view('inc_footer.php');
	}
	

	public function agregarbd(){

		$data['codigo']=$_POST['codigo'];
		$data['primerApellido']=strtoupper($_POST['primerApellido']);
		$data['segundoApellido']=strtoupper($_POST['segundoApellido']);
		$data['nombre']=strtoupper($_POST['nombre']);
		$data['carnet']=strtoupper($_POST['carnet']);
		$data['ciudad']=strtoupper($_POST['ciudad']);
		$data['direccion']=strtoupper($_POST['direccion']);
		$data['telefono']=$_POST['telefono'];
		$data['idzona']=$_POST['idzona'];
		
		$this->cliente_model->agregarCliente($data);

		$costo['costotrescuartos']=0;
		$costo['costounapulgada']=0;
		$costo['costoenterrado']=0;
		$costo['costoempotrado']=0;

		$costo['creadopor']=$this->session->userdata('idusuario');
		$costo['idcliente']=$this->db->insert_id();

		$this->excedente_model->agregarExcedente($costo);

		
		$lista=$this->usuario_model->lista();
		$data1['usuario']=$lista;
		$idzona=$_POST['idzona'];
		$lista=$this->cliente_model->listaClienteZona($idzona);
		$data['cliente']=$lista;

		$this->load->view('inc_head.php');
		$this->load->view('inc_menuEmpresa',$data1);
		$this->load->view('lista_cliente',$data);
		$this->load->view('inc_footer.php');
	}

	
	public function modificar(){
		$lista=$this->usuario_model->lista();
		$data1['usuario']=$lista;

		$idcliente=$_POST['idcliente'];
		$data['infocliente']=$this->cliente_model->recuperarCliente($idcliente);

		$this->load->view('inc_head.php');
		$this->load->view('inc_menuEmpresa', $data1);
		$this->load->view('cliente_modificar',$data);
		$this->load->view('inc_footer.php');
	}

	public function modificarbd(){
		$lista=$this->cliente_model->lista();
		$data1['cliente']=$lista;

		$idcliente=$_POST['idcliente'];
		
		$data['primerApellido']=$_POST['primerApellido'];
		$data['segundoApellido']=$_POST['segundoApellido'];
		$data['nombre']=$_POST['nombre'];
		$data['carnet']=$_POST['carnet'];
		$data['ciudad']=$_POST['ciudad'];
		$data['direccion']=$_POST['direccion'];
		$data['telefono']=$_POST['telefono'];
		$this->cliente_model->modificarCliente($idcliente,$data);
		$this->verlista();
		
	}

	public function eliminarbd(){
		$lista=$this->cliente_model->lista();
		$data1['cliente']=$lista;

		$idcliente=$_POST['idcliente'];
		
		$data['estado']=0;

		$this->cliente_model->eliminarClientebd($idcliente,$data);
		
		$this->verlista();

	}
}
