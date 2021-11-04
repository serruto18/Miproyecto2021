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

	public function excedentepdf(){
		$listaEmpresa=$this->empresa_model->lista();
		$listaEmpresa=$listaEmpresa->result();
		$idcliente=$_REQUEST['idcliente'];
		$listaCliente=$this->cliente_model->recuperarCliente($idcliente);
		$listaCliente=$listaCliente->result();
		$listacosto=$this->excedente_model->lista($idcliente);
		$listacosto=$listacosto->result();
		$this->pdf=new Pdf();
		$this->pdf->AddPage();
		$this->pdf->AliasNbPages();
		$this->pdf->SetTitle("Excedente del cliente");
		$this->pdf->SetLeftMargin(15);
		$this->pdf->SetRightMargin(15);
		$this->pdf->SetFillColor(210,210,210);
		$this->pdf->SetFont('Arial','B',11);
		$this->pdf->Cell(30);
		//$this->pdf->Cell(120,10,'Excedente del Cliente',0,0,'C',1);
		$this->pdf->Ln(10);

		$this->pdf->SetFont('Arial','B',11);
		$this->pdf->Cell(120,8,'DATOS DEL CLIENTE:',0,0,'L',0);
		$this->pdf->Ln(10);

		foreach ($listaCliente as $row) {
			$primerApellido=$row->primerApellido;
			$segundoApellido=$row->segundoApellido;
			$nombre=$row->nombre;
			$carnet=$row->carnet;
			$ciudad=$row->ciudad;
			$direccion=$row->direccion;
			$telefono=$row->telefono;
			$this->pdf->Cell(50,8,'Nombre:','TL',0,'L',0);
			$this->pdf->SetFont('Arial','',10);
			$this->pdf->Cell(120,8,$primerApellido.' '.$segundoApellido. ' '.$nombre,'TR',0,'L',0);
			$this->pdf->Ln(8);
			$this->pdf->SetFont('Arial','B',11);
			$this->pdf->Cell(50,8,'Numero de Carnet:','L',0,'L',0);
			$this->pdf->SetFont('Arial','',10);
			$this->pdf->Cell(120,8,$carnet.' '.$ciudad,'R',0,'L',0);
			$this->pdf->Ln(8);
			$this->pdf->SetFont('Arial','B',11);
			$this->pdf->Cell(50,8,utf8_decode('Dirección:  '),'L',0,'L',0);
			$this->pdf->SetFont('Arial','',10);
			$this->pdf->Cell(120,8,$direccion,'R',0,'L',0);
			$this->pdf->Ln(8);
			$this->pdf->SetFont('Arial','B',11);
			$this->pdf->Cell(50,8,'Telefono:  ','LB',0,'L',0);
			$this->pdf->SetFont('Arial','',10);
			$this->pdf->Cell(120,8,$telefono,'BR',0,'L',0);
			$this->pdf->Ln(30);
			
		}
		$this->pdf->SetFont('Arial','B',11);
		$this->pdf->Cell(120,8,'DETALLE DE LA INSTALACION A CANCELAR:',0,0,'L',0);
		$this->pdf->Ln(10);
		$this->pdf->setFillColor(230,230,230); 
		$this->pdf->Cell(7,8,'N','TL',0,'C',1);
		$this->pdf->Cell(40,8,'Descripcion','TL',0,'L',1);
		$this->pdf->Cell(35,8,'Distancia total (m)','TL',0,'L',1);
		$this->pdf->Cell(46,8,'Distancia excedente (m)','TL',0,'L',1);
		$this->pdf->Cell(33,8,'Precio por metro','TL',0,'L',1);
		$this->pdf->Cell(18,8,'Total Bs.','TLR',0,'L',1);
		
		$this->pdf->Ln(8);
		foreach ($listacosto as $row) {
			$distanciatrescuartos=$row->distanciatrescuartos;
			$costotrescuartos=$row->costotrescuartos;

			$distanciaunapulgada=$row->distanciaunapulgada;
			$costounapulgada=$row->costounapulgada;

			$distanciaenterrado=$row->distanciaenterrado;	
			$costoenterrado=$row->costoenterrado;

			$distanciaempotrado=$row->distanciaempotrado;
			$costoempotrado=$row->costoempotrado;
			$precioTotal=$row->precioTotal;
			$this->pdf->SetFont('Arial','',10);
			$this->pdf->Cell(7,8,'1','TL',0,'C',0);
			$this->pdf->Cell(40,8,'Tuberia de 3/4":','TL',0,'L',0);
			$this->pdf->Cell(35,8,$distanciatrescuartos,'TL',0,'C',0);
			if ($distanciatrescuartos<22) {
				$distanciatrescuartos=0;
			}else{
				$distanciatrescuartos=$distanciatrescuartos-22;
			}
			$this->pdf->Cell(46,8,$distanciatrescuartos,'TL',0,'C',0);
			$this->pdf->Cell(33,8,105,'TL',0,'C',0);
			$this->pdf->Cell(18,8,$costotrescuartos,'TLR',0,'C',1);
			$this->pdf->Ln(8);
			$this->pdf->Cell(7,8,'2','TL',0,'C',0);
			$this->pdf->Cell(40,8,'Tuberia de 1":','TL',0,'L',0);
			$this->pdf->Cell(35,8,$distanciaunapulgada,'TL',0,'C',0);
			$this->pdf->Cell(46,8,$distanciaunapulgada,'TL',0,'C',0);
			$this->pdf->Cell(33,8,55,'TL',0,'C',0);
			$this->pdf->Cell(18,8,$costounapulgada,'TLR',0,'C',1);
			$this->pdf->Ln(8);
			$this->pdf->Cell(7,8,'3','TL',0,'C',0);
			$this->pdf->Cell(40,8,'Tuberia enterrada:','TL',0,'L',0);
			$this->pdf->Cell(35,8,$distanciaenterrado,'TL',0,'C',0);
			if ($distanciaenterrado<4) {
				$distanciaenterrado=0;
			}else{
				$distanciaenterrado=$distanciaenterrado-4;
			}

			$this->pdf->Cell(46,8,$distanciaenterrado,'TL',0,'C',0);
			$this->pdf->Cell(33,8,50,'TL',0,'C',0);
			$this->pdf->Cell(18,8,$costoenterrado,'TLR',0,'C',1);
			$this->pdf->Ln(8);
			$this->pdf->Cell(7,8,'4','TLB',0,'C',0);
			$this->pdf->Cell(40,8,'Tuberia empotrada:','TLB',0,'L',0);
			$this->pdf->Cell(35,8,$distanciaempotrado,'TLB',0,'C',0);
			if ($distanciaempotrado<4) {
				$distanciaempotrado=0;
			}else{
				$distanciaempotrado=$distanciaempotrado-4;
			}
			$this->pdf->Cell(46,8,$distanciaempotrado,'TLB',0,'C',0);
			$this->pdf->Cell(33,8,75,'TLB',0,'C',0);
			$this->pdf->Cell(18,8,$costoempotrado,'TLRB',0,'C',1);
			$this->pdf->Ln(8);
			$this->pdf->Cell(128,8,' ',0,0,'C',0);
			$this->pdf->SetFont('Arial','B',11);
			$this->pdf->Cell(33,8,'TOTAL','TLRB',0,'C',1);
			$this->pdf->Cell(18,8,$precioTotal,'TLRB',0,'C',1);
			$this->pdf->Ln(10);
		}
		//$formatter = new NumeroALetras();
		//echo $formatter->toWords($number, $decimals);
		$this->literal->convertir($precioTotal);
		$this->pdf->Cell(100,8,'Son: '.'00/100 Bs.','TLRB',0,'L',1);
		$this->pdf->Ln(30);
		$this->pdf->Cell(28,8,' ',0,0,'C',0);
		$this->pdf->Cell(50,8,' ','T',0,'C',0);
		$this->pdf->Cell(30,8,' ',0,0,'C',0);
		$this->pdf->Cell(50,8,' ','T',0,'C',0);
		$this->pdf->Ln(1);
		foreach ($listaEmpresa as $row) {
			$razonsocial=$row->razonsocial;
			$primerApellidoRep=$row->primerApellidoRep;
			$segundoApellidoRep=$row->segundoApellidoRep;
			$nombreRep=$row->nombreRep;

			$this->pdf->Cell(35,8,' ',0,0,'C',0);
			$this->pdf->SetFillColor(255,255,255);
			$this->pdf->MultiCell(40,5,strtoupper($razonsocial).' '.$nombreRep.' '.$primerApellidoRep.' '.$segundoApellidoRep,0,'C',0);	
		}
		$this->pdf->Ln(0);
		$this->pdf->Cell(80,1,' ','T',0,'C',0);
		foreach ($listaCliente as $row) {
			
			$primerApellido=$row->primerApellido;
			$segundoApellido=$row->segundoApellido;
			$nombre=$row->nombre;

			$this->pdf->Cell(35,8,' ',0,0,'C',0);
			$this->pdf->MultiCell(40,5,$nombre.' '.$primerApellido.' '.$segundoApellido,0,'C',0);	
		}
		





		$this->pdf->Output('ExcedenteCliente.pdf','I');


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

	/*public function eliminarbd(){
		$lista=$this->cliente_model->lista();
		$data1['cliente']=$lista;

		$idcliente=$_POST['idcliente'];
		
		$data['estado']=0;

		$this->cliente_model->eliminarClientebd($idcliente,$data);
		
		$this->verlista();

	}*/
}
