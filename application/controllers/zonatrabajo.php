<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Zonatrabajo extends CI_Controller {
	


	public function verlista(){
		$lista=$this->usuario_model->lista();
		$data1['usuario']=$lista;
		$lista=$this->zona_model->lista();
		$data['zona']=$lista;
		$listainspector=$this->inspector_model->lista();
		$data['inspector']=$listainspector;


		$this->load->view('inc_head.php');
		$this->load->view('inc_menuEmpresa',$data1);
		$this->load->view('lista_zona',$data);
		$this->load->view('inc_footer.php');
	}
	

	public function agregarbd(){

		$data['departamento']=$_POST['departamento'];
		$data['provincia']=$_POST['provincia'];
		$data['distrito']=$_POST['distrito'];
		$data['otb']=$_POST['otb'];
		$data['creadopor']=$this->session->userdata('idusuario');
		$this->zona_model->agregarZona($data);
		
		$lista=$this->usuario_model->lista();
		$data1['usuario']=$lista;
		
		$lista=$this->material_model->lista();
		$data['material']=$lista;

		$this->verlista();
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

		$idzonaTrabaja=$_POST['idzona'];
		$data['infozona']=$this->zona_model->recuperarZona($idzonaTrabaja);

		$this->load->view('inc_head.php');
		$this->load->view('inc_menuEmpresa', $data1);
		$this->load->view('zona_modificar',$data);
		$this->load->view('inc_footer.php');
	}

	public function modificarbd(){
		$lista=$this->material_model->lista();
		$data1['material']=$lista;

		$idzonaTrabaja=$_POST['idzona'];
		
		$data['departamento']=$_POST['departamento'];
		$data['provincia']=$_POST['provincia'];
		$data['distrito']=$_POST['distrito'];
		$data['otb']=$_POST['otb'];

		$this->zona_model->modificarZona($idzonaTrabaja,$data);
		$this->verlista();
			
		
	}

	public function eliminarbd(){
		$lista=$this->zona_model->lista();
		$data1['zona']=$lista;

		$idzonaTrabaja=$_POST['idzona'];
		
		$data['estado']=0;

		$this->zona_model->eliminaZonabd($idzonaTrabaja,$data);
		
		$this->verlista();

	}
}
