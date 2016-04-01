<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Advogados extends CI_Controller {
   	
   	public function __construct() {
		parent::__construct();
		$this->load->helper('url');
		$this->load->library('session');

		$logado = $this->session->userdata('usuarioLogado');
		if(!empty($logado) && !empty($logado->id)) {

			$this->load->database();
			$this->load->model('Advogadosmodel');
			$this->load->model('Registrosmodel');
		} else {

			redirect(base_url() . 'login/');
		}
	}

	public function index($pagina = 1, $order_by = null, $asc_desc = null) {

		$totalResult = 0;
		$listaPaginada = array();

		if(!empty($this->input->get())) {

			$order_by = empty($order_by) ? 'nome' : $order_by;
			$asc_desc = empty($asc_desc) ? 'asc'  : $asc_desc;

			$listaResult = $this->Advogadosmodel->paginarSearch($order_by, $asc_desc);
			$totalResult = sizeof($listaResult);
	        $offset = ($pagina -1) * PERPAGE;
			$listaPaginada = array_slice($listaResult, $offset, PERPAGE);
	  	}

		$dadosHeader = array(
			'aba' => 'advogados'
		);
		$paginacaoLinks = $this->load->view(
			'paginacao', 
			array(
				'total' => $totalResult,
				'perPage' => PERPAGE,
				'controller' => 'advogados'
			), 
			true
		);

		$dados = array(
			 'listaPaginada' => $listaPaginada,
			 'paginacao' => $paginacaoLinks,
			 'total' => $totalResult
		);	  	

		$this->load->view('header', $dadosHeader);
  		$this->load->view('advogados', $dados);
  		$this->load->view('footer');	  	
	}

	public function criar() {

		$dadosHeader = array(
			'aba' => 'advogados'
			);
					
		$this->load->view('header', $dadosHeader);
		$this->load->view('formAdvogado');
		$this->load->view('footer');
	}

	public function salvar() {

		$advogado = $this->input->post();
		//$ativo= $this->input->post();

		//$date = DateTime::createFromFormat('d/m/Y', $advogado['criado_em']);
		//$advogado['criado_em'] = $date->format("Y-m-d");

		//$date = DateTime::createFromFormat('d/m/Y', $advogado['ativo_fim']);
		//$advogado['ativo_fim'] = $date->format("Y-m-d");

		$this->Advogadosmodel->save($advogado);
		//$this->Advogadosmodel->save($ativo);
		$this->session->set_flashdata('mensagem', '<div class="alert alert-success"> O advogado "'. $this->input->post('nome') .'" foi registrado com sucesso! </div>');
		redirect(base_url() .'advogados');
	}

	public function editar($id = null) {

		$advogado = $this->Advogadosmodel->getById($id);

		$dados = array('advogado' => $advogado);
		$dadosHeader = array(
			'aba' => 'advogados'
			);
					
		$this->load->view('header', $dadosHeader);
		$this->load->view('formAdvogado', $dados);
		$this->load->view('footer');
	}

	public function atualizar() {

		$advogado = $this->input->post();
		//$ativo = $this->input->post();

		//$date = DateTime::createFromFormat('d/m/Y', $advogado['ativo_fim']);
		//$advogado['ativo_fim'] = $date->format("Y-m-d");
		
		$this->Advogadosmodel->update($advogado);
		//$this->Advogadosmodel->update($ativo);
		$this->session->set_flashdata('mensagem', '<div class="alert alert-success"> Os dados do advogado "'. $this->input->post('nome') .'" foram atualizados com sucesso! </div>');
		redirect(base_url() .'advogados');
	}

	public function excluir($id = null) {

		$advogado = $this->Advogadosmodel->delete($id);
		$this->session->set_flashdata('mensagem', '<div class="alert alert-success"> O item foi excluído. </div>');
		redirect(base_url() .'advogados');
	}

	public function visualizar($id = null) {
		$dadosHeader = array(
			'aba' => 'advogados'
		);

		$advogado =  $this->Advogadosmodel->getById($id);
		$processosList = $this->Registrosmodel->listByOab($advogado->oab);
		$dados = array(
			 'advogado' => $advogado
		);
		
		$this->load->view('header', $dadosHeader);
  		$this->load->view('showAdvogado', $dados);
  		$this->load->view('footer');
	}
}
