 <?php
class EmailC extends CI_Controller{
	public function __construct(){
		parent:: __construct();
		$this->load->library('form_validation'); //libreria que nos ayuda a validar campos para que estos sean requeridos 
	}

	public function index() //funcion que carga la vista principal
	{
		$this->load->view('layouts/head');
		$this->load->view('emailV');
	}

	public function Mail_config() {//funcion que nos ayuda a generar la configuracion para poder enviar correos
		$config = array(
			'mailtype' => "html",
			'protocol' => 'smtp',
			'smtp_host' => 'smtp.gmail.com',
			'smtp_user' => 'leandrocarpio24@gmail.com',
			'smtp_pass' => '74622633',
			'smtp_crypto' => 'ssl',
			'smtp_port' => 465,
			'smtp_timeout' => '60',
			'crlf'		=> '\r\n'
		);

		return $config;
	}
	public function enviar() //funcion que nos ayuda a enviar los correos electronicos y a validar los campos
	{
		$this->form_validation->set_rules('asunto', 'Email', 'required', ['required' => 'El campo %s es requerido']);
		$this->form_validation->set_rules('mensaje', 'Mensaje', 'required', ['required' => 'El campo %s es requerido']);

		if ($this->form_validation->run()) {
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
		if ($this->email->send()) {
			$this->email->clear();
		}
		redirect('emailC');
	}else{
		$this->session->set_flashdata('errors', validation_errors());
		redirect('emailC');
	}
	}
}
