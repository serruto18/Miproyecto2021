<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Usuario extends CI_Controller {

	public function index()
	{
		$data['msg']=$this->uri->segment(3);
		if($this->session->userdata('login'))
		{
			redirect('usuario/panel','refresh');
		}
		else
		{
			$this->load->view('vistaLogin.php',$data);

		}	
	}

	public function validarusuario()
	{
		$login=$_POST['login'];
		$pass=md5($_POST['pass']);
		$consulta=$this->usuario_model->validar($login,$pass);

		if($consulta->num_rows()>0)
		{
			foreach ($consulta->result() as $row) 
			{
				$this->session->set_userdata('idusuario',$row->idusuario);
				$this->session->set_userdata('login',$row->login);
				$this->session->set_userdata('rol',$row->rol);
				redirect('usuario/panel','refresh');
			}
		}
		else
		{
			redirect('usuario/index/1','refresh');//el 1 significa que hay un error 
		}
		
	}

	public function panel()//acceso para usuarios que han accedido correctamente
	{
		$lista=$this->usuario_model->lista();
		$data['usuario']=$lista;

		if($this->session->userdata('login') && $this->session->userdata('idusuario') )
		{
			$this->load->view('inc_head.php');
			
			if(($this->session->userdata('rol'))=='admin')
			{
				
				$this->load->view('inc_menuEmpresa.php', $data);
				$this->load->view('vistaEmpresa.php', $data);
				
			}
			if($this->session->userdata('rol')=='proyectista')
			{
				$this->load->view('inc_menuProyectista.php', $data);
				$this->load->view('vistaProyectista.php', $data);
				
			}
			if($this->session->userdata('rol')=='instalador')
			{
				$this->load->view('inc_menuInstalador.php', $data);
				$this->load->view('vistaInstalador.php');
				
			}
			$this->load->view('inc_footer.php');	
		}	
		{
			//redirect('usuario/index/2','refresh');
		}
	}

	public function logout()
	{
		$this->session->sess_destroy();//destruye las variables de secion
		redirect('usuario/index/3','refresh');
	}

	public function verlista(){
		$lista=$this->usuario_model->lista();
		$data1['usuario']=$lista;
		$lista=$this->usuario_model->lista();
		$data['usuario']=$lista;

		$this->load->view('inc_head.php');
		$this->load->view('inc_menuEmpresa',$data1);
		$this->load->view('usuario_lista',$data);
		$this->load->view('inc_footer.php');
	}

	

	public function elimiarbd(){
		$lista=$this->usuario_model->lista();
		$data1['usuario']=$lista;

		$idusuario=$_POST['idusuario'];
		
		$data['estado']=0;

		$this->usuario_model->eliminarUsuariobd($idusuario,$data);
		
		$this->verlista();

	}


}


