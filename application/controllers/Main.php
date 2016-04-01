<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Main extends CI_Controller {
   	
   	public function __construct() {
		parent::__construct();

		$this->load->library('session');
		$this->load->helper('url');
		$logado = $this->session->userdata('usuarioLogado');

		if(!empty($logado) && !empty($logado->id)) {

			$this->load->database();
			$this->load->model('Contato');
			$this->load->model('Advogados');
		} else {
			redirect(base_url() . 'login/');
		}
	}

	public function index() {

		$dadosForm = $this->input->post();

		$contatos = $this->Contato->getPais($dadosForm);
		rsort($contatos);

  		$this->load->view('header', array('aba' => 'index'));
  		$this->load->view('dashboard/home', array('contatos' => $contatos, 'dadosForm' => $dadosForm ));
  		$this->load->view('footer');
	}

	public function visualizarContato($id) {
		
		$listaFilhos = $this->Contato->getFilhos($id);
		$origem = $this->Contato->getOrigem($id);
		$contato = null;

		if($origem == 'SITE') {
			
			$contato = $this->Contato->getById($id);

		} else if($origem == 'ANDROID' || $origem == 'IOS' || $origem == 'CENTRAL') {
			
			$contato = $this->Contato->getByIdAdvogado($id);
		}

		if($contato->status == 'NOVO') {
			$this->Contato->update(array('id' => $id, 'status' => 'LIDO'));
			$contato->status = 'LIDO';
		}

		$dadosBody = array(
			'contato' =>$contato,
			'listaFilhos' => $listaFilhos
		);

  		$this->load->view('header', array('aba' => 'index'));
  		$this->load->view('dashboard/visualizarContato', $dadosBody);
  		$this->load->view('footer');
	}

	public function salvarStatus(){

		$dados = $this->input->post();
		$this->Contato->update($dados);

		redirect(base_url() . 'main/visualizarContato/'. $dados['id']);
	}

	public function deletarContatoFilho($id) {

		$contato = $this->Contato->getById($id);
		$pai = $this->Contato->getById($contato->id);
		$dados = array('id' => $id,'status'=> 'INATIVO'  );
		$this->Contato->update($dados);

		redirect(base_url() . 'main/visualizarContato/'. $pai->contato_pai);
	}
	
	public function deletarContatoPai($id) {

		$dados = array('id' => $id,'status'=> 'INATIVO');
		$this->Contato->update($dados);
		redirect(base_url() . 'main/');

	}

	public function sair() {
		$this->session->sess_destroy();
		redirect(base_url());
	}
}