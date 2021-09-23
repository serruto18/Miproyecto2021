<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Cliente extends CI_Controller {
	

	public function verlista(){
		$lista=$this->usuario_model->lista();
		$data1['usuario']=$lista;
		$lista=$this->cliente_model->lista();
		$data['cliente']=$lista;


		$this->load->view('inc_head.php');
		$this->load->view('inc_menuEmpresa',$data1);
		$this->load->view('lista_cliente',$data);
		$this->load->view('inc_footer.php');
	}
	

	public function agregarbd(){

		$data['codigo']=$_POST['codigo'];
		$data['primerApellido']=$_POST['primerApellido'];
		$data['segundoApellido']=$_POST['segundoApellido'];
		$data['nombre']=$_POST['nombre'];
		$data['numci']=$_POST['numci'];
		$data['ciudad']=$_POST['ciudad'];
		$data['direccion']=$_POST['direccion'];
		$data['tel']=$_POST['tel'];
		
		
		$this->cliente_model->agregarCliente($data);
		
		$lista=$this->usuario_model->lista();
		$data1['usuario']=$lista;
		
		$lista=$this->cliente_model->lista();
		$data['cliente']=$lista;

		$this->load->view('inc_head.php');
		$this->load->view('inc_menuEmpresa',$data1);
		$this->load->view('lista_cliente',$data);
		$this->load->view('inc_footer.php');
	}

	public function verPerfilEmpleado()
	{
		$lista=$this->usuario_model->lista();
		$data['usuario']=$lista;

		$idusuario=$_REQUEST['idusuario'];
		$datoempleado['infoEmpleado']=$this->empleado_model->recuperarEmpleado($idusuario);
		
		$this->load->view('inc_head.php');
		$this->load->view('inc_menuEmpresa',$data);
		$this->load->view('vistaPerfilEmpleado', $datoempleado);
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
		$data['numci']=$_POST['numci'];
		$data['ciudad']=$_POST['ciudad'];
		$data['direccion']=$_POST['direccion'];
		$data['tel']=$_POST['tel'];
		$this->cliente_model->modificarCliente($idcliente,$data);
		$this->verlista();
		
		/*$this->load->view('inc_head.php');
		$this->load->view('inc_menuEmpresa', $data1);
		$this->load->view('lista_cliente',$data1);
		$this->load->view('inc_footer.php');*/
	}
}
