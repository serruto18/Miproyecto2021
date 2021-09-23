<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Empresa extends CI_Controller {
	public function index()
	{
		$this->load->view('inc_head.php');
		$this->load->view('vistaLogin');
		$this->load->view('inc_footer.php');
	}
	public function pruebabd ()
	{
		$query = $this -> db -> get('empresa');
		$execonsulta = $query -> result();
		print_r($execonsulta);
	}
	public function agregarbd(){
		$data['razonsocial']=$_POST['razonsocial'];
		$data['registroanh']=$_POST['registroanh'];
		$data['primerApellidoRep']=$_POST['primerApellidoRep'];
		$data['segundoApellidoRep']=$_POST['primerMaternoRep'];
		$data['nombreRep']=$_POST['nombreRep'];
		$data['direccion']=$_POST['direccion'];
		$data['telefono']=$_POST['telefono'];
		$data['rol']=$_POST['rol'];


		$this->empresa_model->agregarEmpresa($data);
		

		$dataLogin['login']=$_POST['razonsocial'];
		$dataLogin['pass']=md5($_POST['registroanh']);
		$dataLogin['rol']=$_POST['rol'];
		$this->usuario_model->agregarUsuario($dataLogin);
		redirect('usuario/index','refresh');
	}

	public function verPerfilEmpresa()
	{
		$lista=$this->usuario_model->lista();
		$data['usuario']=$lista;

		$idusuario=$_REQUEST['idusuario'];
		$datoempresa['infoEmpresa']=$this->empresa_model->recuperarEmpresa($idusuario);
		
		$this->load->view('inc_head.php');
		$this->load->view('inc_menuEmpresa',$data);
		$this->load->view('vistaPerfilEmpresa',$datoempresa);
		$this->load->view('inc_footer.php');
	}


	public function modificarbd(){
		$lista=$this->usuario_model->lista();
		$data1['usuario']=$lista;

		$idusuario=$_POST['idusuario'];
		
		$data['razonsocial']=$_POST['razonsocial'];
		$data['registroanh']=$_POST['registroanh'];
		$data['primerApellidoRep']=$_POST['primerApellidoRep'];
		$data['segundoApellidoRep']=$_POST['primerMaternoRep'];
		$data['nombreRep']=$_POST['nombreRep'];
		$data['direccion']=$_POST['direccion'];
		$data['telefono']=$_POST['telefono'];

		$this->empresa_model->modificarEmpresa($idusuario,$data);
		$datoempresa['infoEmpresa']=$this->empresa_model->recuperarEmpresa($idusuario);
		
		$this->load->view('inc_head.php');
		$this->load->view('inc_menuEmpresa',$data1);
		$this->load->view('vistaPerfilEmpresa',$datoempresa);
		$this->load->view('inc_footer.php');
	}
}
