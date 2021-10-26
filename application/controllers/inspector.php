<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Inspector extends CI_Controller {
	

	public function verlista(){
		$lista=$this->usuario_model->lista();
		$data1['usuario']=$lista;
		$lista=$this->inspector_model->lista();
		$data['inspector']=$lista;


		$this->load->view('inc_head.php');
		$this->load->view('inc_menuEmpresa',$data1);
		$this->load->view('lista_inspector',$data);
		$this->load->view('inc_footer.php');
	}


	public function agregarbd(){

		$data['primerApellido']=$_POST['primerApellido'];
		$data['segundoApellido']=$_POST['segundoApellido'];
		$data['nombre']=$_POST['nombre'];
		$data['descripcion']=$_POST['descripcion'];
		$data['creadopor']=$this->session->userdata('idusuario');
		
		$this->inspector_model->agregarInspector($data);
		
		$this->verlista();
	}

	
	public function modificar(){
		$lista=$this->usuario_model->lista();
		$data1['usuario']=$lista;

		$idinspector=$_POST['idinspector'];
		$data['infocliente']=$this->inspector_model->recuperarInspector($idinspector);

		$this->load->view('inc_head.php');
		$this->load->view('inc_menuEmpresa', $data1);
		$this->load->view('inspector_modificar',$data);
		$this->load->view('inc_footer.php');
	}

	public function modificarbd(){

		$idinspector=$_POST['idinspector'];
		
		$data['primerApellido']=$_POST['primerApellido'];
		$data['segundoApellido']=$_POST['segundoApellido'];
		$data['nombre']=$_POST['nombre'];
		$data['descripcion']=$_POST['descripcion'];

		$this->inspector_model->modificarInspector($idinspector,$data);
		$this->verlista();
		
	}

	public function eliminarbd(){

		$idinspector=$_POST['idinspector'];
		
		$data['estado']=0;

		$this->inspector_model->eliminarInspectorbd($idinspector,$data);
		
		$this->verlista();

	}
}
