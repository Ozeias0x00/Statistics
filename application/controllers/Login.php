<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {
   	
   	public function __construct() {
		parent::__construct();
		$this->load->helper('url');
		$this->load->database();
		$this->load->model('Contato');
		$this->load->model('Admin');
		$this->load->library('session');
	}

	public function index() {

  		$this->load->view('dashboard/login');
	}

	public function loginPost() {

		$dados = $this->input->post();
			
		$usuarioLogado = $this->Admin->validar($dados);

		if(!empty($usuarioLogado)) {

			$this->session->set_userdata('usuarioLogado', $usuarioLogado);
		}

		redirect(base_url() . 'main');
	}
}
