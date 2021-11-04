<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Empleado extends CI_Controller {
	
	public function validarempleado()
	{
		$idempleado=$_POST['idempleado'];
		$nombre=$_POST['nombre'];
		$categoria=$_POST['categoria'];
		
		$consulta=$this->empleado_model->validar($nombre,$categoria);

		if($consulta->num_rows()>0)
		{
			foreach ($consulta->result() as $row) 
			{
				$this->session->set_userdata('idempleado',$row->idempleado);
				$this->session->set_userdata('nomnre',$row->nombre);
				$this->session->set_userdata('categoria',$row->categoria);
			}
		}	
	}

	public function verlistaProyectista(){
		$lista=$this->usuario_model->lista();
		$data1['usuario']=$lista;
		$proyectista="proyectista";
		$lista=$this->empleado_model->listaProyectista($proyectista);
		$data['empleado']=$lista;


		$this->load->view('inc_head.php');
		if ($this->session->userdata('rol')=='admin') {
			$this->load->view('inc_menuEmpresa',$data1);
		}
		if ($this->session->userdata('rol')=='proyectista') {
			$this->load->view('inc_menuProyectista',$data1);
		}
		$this->load->view('empleado_listaProyectista',$data);
		$this->load->view('inc_footer.php');
	}
	public function verlistaInstalador(){
		$lista=$this->usuario_model->lista();
		$data1['usuario']=$lista;
		$instalador="instalador";
		$lista=$this->empleado_model->listaInstalador($instalador);
		$data['empleado']=$lista;


		$this->load->view('inc_head.php');
		if ($this->session->userdata('rol')=='admin') {
			$this->load->view('inc_menuEmpresa',$data1);
		}
		if ($this->session->userdata('rol')=='proyectista') {
			$this->load->view('inc_menuProyectista',$data1);
		}
		$this->load->view('empleado_listaInstalador',$data);
		$this->load->view('inc_footer.php');
	}

	public function agregarbd(){


		$data['primerApellido']=$_POST['primerApellido'];
		$data['segundoApellido']=$_POST['segundoApellido'];
		$data['nombre']=$_POST['nombre'];
		$data['numeroTitulo']=$_POST['numeroTitulo'];
		$data['telefono']=$_POST['telefono'];
		$data['categoria']=$_POST['categoria'];
		$categoria=$_POST['categoria'];
		$data['subcategoria']=$_POST['subcategoria'];
		
		$data['creadopor']=$this->session->userdata('idusuario');
		
		$dataLogin['login']=strtolower(str_replace(' ','',($_POST['nombre'])).str_replace('/','',($_POST['numeroTitulo'])));
		$dataLogin['pass']=md5($_POST['numeroTitulo']);
		$dataLogin['rol']=$_POST['categoria'];
		$this->usuario_model->agregarUsuario($dataLogin);

		$data['idusuario']=$this->db->insert_id();//para rescatar el idusuario
		$this->empleado_model->agregarEmpleado($data);

		$lista=$this->usuario_model->lista();
		$data1['usuario']=$lista;
		
		$lista=$this->empleado_model->lista();
		$data['empleado']=$lista;

		if ($categoria=='proyectista')
			$this->verlistaProyectista();
		if ($categoria=='instalador')
			$this->verlistaInstalador();

	}

	public function verPerfilEmpleado()
	{
		$lista=$this->usuario_model->lista();
		$data['usuario']=$lista;

		$idusuario=$_REQUEST['idusuario'];
		$datoempleado['infoEmpleado']=$this->empleado_model->recuperarEmpleado($idusuario);
		
		$this->load->view('inc_head.php');
		if ($this->session->userdata('rol')=='admin') {
			$this->load->view('inc_menuEmpresa',$data);
		}
		if ($this->session->userdata('rol')=='proyectista') {
			$this->load->view('inc_menuProyectista',$data);
		}
		$this->load->view('vistaPerfilEmpleado', $datoempleado);
		$this->load->view('inc_footer.php');
	}


	public function modificarbd(){
		$lista=$this->usuario_model->lista();
		$data1['usuario']=$lista;

		$idusuario=$_POST['idusuario'];
		
		$data['primerApellido']=$_POST['primerApellido'];
		$data['segundoApellido']=$_POST['segundoApellido'];
		$data['nombre']=$_POST['nombre'];
		$data['numeroTitulo']=$_POST['numeroTitulo'];
		$data['telefono']=$_POST['telefono'];
		$data['categoria']=$_POST['categoria'];
		$data['subcategoria']=$_POST['subcategoria'];

		$this->empleado_model->modificarEmpleado($idusuario,$data);
		$datoempleado['infoEmpleado']=$this->empleado_model->recuperarEmpleado($idusuario);
		
		$this->load->view('inc_head.php');
		$this->load->view('inc_menuEmpresa', $data1);
		$this->load->view('vistaPerfilEmpleado',$datoempleado);
		$this->load->view('inc_footer.php');
	}

	public function modificar(){
		$lista=$this->usuario_model->lista();
		$data1['usuario']=$lista;

		$idempleado=$_POST['idempleado'];
		$data['infoempleado']=$this->empleado_model->recuperarEmpleado1($idempleado);

		$this->load->view('inc_head.php');
		$this->load->view('inc_menuEmpresa', $data1);
		$this->load->view('emple_modificar',$data);
		$this->load->view('inc_footer.php');
	}

	public function modificarbdEmpl(){
		$lista=$this->empleado_model->lista();
		$data1['empleado']=$lista;

		$idempleado=$_POST['idempleado'];
		
		$data['primerApellido']=$_POST['primerApellido'];
		$data['segundoApellido']=$_POST['segundoApellido'];
		$data['nombre']=$_POST['nombre'];
		$data['numeroTitulo']=$_POST['numeroTitulo'];
		$data['telefono']=$_POST['telefono'];
		$data['subcategoria']=$_POST['subcategoria'];

		$this->empleado_model->modificarEmpleadobd($idempleado,$data);
			

		$this->verlistaProyectista();

	}


	public function eliminarProyectistabd(){
		$lista=$this->empleado_model->lista();
		$data1['empleado']=$lista;

		$idempleado=$_POST['idempleado'];
		
		$data['estado']=0;

		$this->empleado_model->eliminarEmpleadobd($idempleado,$data);
		
		$this->verlistaProyectista();

	}
	public function eliminarInstaladorbd(){
		$lista=$this->empleado_model->lista();
		$data1['empleado']=$lista;

		$idempleado=$_POST['idempleado'];
		
		$data['estado']=0;

		$this->empleado_model->eliminarEmpleadobd($idempleado,$data);
		
		$this->verlistaInstalador();

	}
}
