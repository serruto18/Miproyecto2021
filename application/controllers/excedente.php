<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Excedente extends CI_Controller {
	

	public function verExcedente(){
		$lista1=$this->usuario_model->lista();
		$data1['usuario']=$lista1;
		$idcliente=$_POST['idcliente'];
		$lista=$this->excedente_model->lista($idcliente);
		$data['costo']=$lista;


		$this->load->view('inc_head.php');
		$this->load->view('inc_menuEmpresa',$data1);
		$this->load->view('excedente_vista',$data);
		$this->load->view('inc_footer.php');
	}

	public function verlistaZona(){
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
	

	public function agregarbd(){

		$data['codigo']=$_POST['codigo'];
		$data['primerApellido']=$_POST['primerApellido'];
		$data['segundoApellido']=$_POST['segundoApellido'];
		$data['nombre']=$_POST['nombre'];
		$data['carnet']=$_POST['carnet'];
		$data['ciudad']=$_POST['ciudad'];
		$data['direccion']=$_POST['direccion'];
		$data['telefono']=$_POST['telefono'];
		$data['idzona']=$_POST['idzona'];
		
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


	public function modificarbd(){
		

		$idexcedente=$_POST['idexcedente'];
		
		$data['distanciatrescuartos']=$_POST['distanciatrescuartos'];
		if ($data['distanciatrescuartos']<22) {
			$costotrescuartos=0;
		}
		else{
			$costotrescuartos=($_POST['distanciatrescuartos']-22)*105;
		}
		$data['costotrescuartos']=$costotrescuartos;
		$data['distanciaunapulgada']=$_POST['distanciaunapulgada'];
		$costounapulgada=$_POST['distanciaunapulgada']*55;
		$data['costounapulgada']=$costounapulgada;
		$data['distanciaenterrado']=$_POST['distanciaenterrado'];
		if ($data['distanciaenterrado']<4) {
			$costoenterrado=0;
		}
		else{
			$costoenterrado=($_POST['distanciaenterrado']-4)*50;
		}
		$data['costoenterrado']=$costoenterrado;
		$data['distanciaempotrado']=$_POST['distanciaempotrado'];
		if ($data['distanciaempotrado']<4) {
			$costoempotrado=0;
		}
		else{
			$costoempotrado=($_POST['distanciaempotrado']-4)*75;
		}
		$data['costoempotrado']=$costoempotrado;
		$data['precioTotal']=($costotrescuartos)+($costounapulgada)+($costoenterrado)+($costoempotrado);
		
		$this->excedente_model->modificarExcedente($idexcedente,$data);


		
		$lista1=$this->usuario_model->lista();
		$data1['usuario']=$lista1;
		$idcliente=$_POST['idcliente'];
		$lista=$this->excedente_model->lista($idcliente);
		$data['costo']=$lista;


		$this->load->view('inc_head.php');
		$this->load->view('inc_menuEmpresa',$data1);
		$this->load->view('excedente_vista',$data);
		$this->load->view('inc_footer.php');
		
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
