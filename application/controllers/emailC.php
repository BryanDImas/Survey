<?php

class EmailC extends CI_Controller{
	public function __construct(){
		parent:: __construct();
	}

	public function index(){
		$this->load->view('layouts/head');
		$this->load->view('emailV');
	}

	public function Mail_config()
	{
		$config = array(
			'mailtype' => "html",                                           
			'protocol' => 'smtp',                                
			'smtp_host'=> 'smtp.gmail.com',             
			'smtp_user' => 'leandrocarpio24@gmail.com', 
			'smtp_pass' => '74622633',                                          
			'smtp_crypto' => 'ssl',                                          
			'smtp_port' => 465,                                                              
			'smtp_timeout' =>'60',                                       
			'crlf'		=> '\r\n'                                                                       
		  );

		  return $config;
	}
	public function enviar(){
		$destinatario = $this->input->post('destinatario');
		$asunto = $this->input->post('asunto');
		$mensaje = $this->input->post('mensaje');
		$config = $this->Mail_config();
		$this->email->initialize($config);
		$this->email->from();       
		$this->email->to($destinatario);                                                          
		$this->email->subject($asunto);                                                                      
		$this->email->set_newline("\r\n");                                                                   
		$this->email->message($mensaje);                                                          
		if($this->email->send()){
			$this->email->clear();
		} 
		redirect('emailC');
	}

}


