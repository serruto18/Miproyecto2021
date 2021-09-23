<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Material extends CI_Controller {
	


	public function verlista(){
		$lista=$this->usuario_model->lista();
		$data1['usuario']=$lista;
		$lista=$this->material_model->lista();
		$data['material']=$lista;


		$this->load->view('inc_head.php');
		$this->load->view('inc_menuEmpresa',$data1);
		$this->load->view('lista_material',$data);
		$this->load->view('inc_footer.php');
	}
	

	public function agregarbd(){

		$data['nombreMaterial']=$_POST['nombreMaterial'];
		$data['stock']=$_POST['stock'];
		$data['precioCompra']=$_POST['precioCompra'];
		
		$this->material_model->agregarMaterial($data);
		
		$lista=$this->usuario_model->lista();
		$data1['usuario']=$lista;
		
		$lista=$this->material_model->lista();
		$data['material']=$lista;

		$this->load->view('inc_head.php');
		$this->load->view('inc_menuEmpresa',$data1);
		$this->load->view('lista_material',$data);
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

		$idmaterial=$_POST['idmaterial'];
		$data['infomaterial']=$this->material_model->recuperarMaterial($idmaterial);

		$this->load->view('inc_head.php');
		$this->load->view('inc_menuEmpresa', $data1);
		$this->load->view('material_modificar',$data);
		$this->load->view('inc_footer.php');
	}

	public function modificarbd(){
		$lista=$this->material_model->lista();
		$data1['material']=$lista;

		$idmaterial=$_POST['idmaterial'];
		
		$data['nombreMaterial']=$_POST['nombreMaterial'];
		$data['stock']=$_POST['stock'];
		$data['precioCompra']=$_POST['precioCompra'];

		$this->material_model->modificarMaterial($idmaterial,$data);
		$this->verlista();
			
		/*$this->load->view('inc_head.php');
		$this->load->view('inc_menuEmpresa', $data1);
		$this->load->view('lista_material',$data1);
		$this->load->view('inc_footer.php');*/
	}
}
