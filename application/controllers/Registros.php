<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Registros extends CI_Controller {
   	
   	public function __construct() {
		parent::__construct();
		$this->load->helper('url');
		$this->load->library('session');
		$this->load->database();
		$this->load->library('pagination');
		$this->load->model('Registrosmodel');
	}

	public function index($pagina = 1, $order_by = null, $asc_desc = null) {

		$totalResult = 0;
		$listaPaginada = array();

		if(!empty($this->input->get())) {
			$order_by = empty($order_by) ? 'codigo' : $order_by;
			$asc_desc = empty($asc_desc) ? 'asc'  : $asc_desc;
			$listaResult = $this->Registrosmodel->paginarSearch($order_by, $asc_desc);

			$totalResult = sizeof($listaResult);
	        $offset = ($pagina -1) * PERPAGE;
			$listaPaginada = array_slice($listaResult, $offset, PERPAGE);
		}
		
		$dadosHeader = array(
			'aba' => 'registros'
		);

		$paginacaoLinks = $this->load->view(
			'paginacao', 
			array(
				'total' => $totalResult,
				'perPage' => PERPAGE,
				'controller' => 'registros'
			), 
			true
		);

		$dados = array(
			 'listaPaginada' => $listaPaginada,
			 'paginacao' => $paginacaoLinks,
			 'total' => $totalResult	 
		);

		$this->load->view('header', $dadosHeader);
  		$this->load->view('registros', $dados);
  		$this->load->view('footer');
	}

	public function criar() {

		$dadosHeader = array(
			'aba' => 'registros'
			);
					
		$this->load->view('header', $dadosHeader);
		$this->load->view('formRegistros');
		$this->load->view('footer');
	}

	public function salvar() {

		$registro = $this->input->post();
		$date = DateTime::createFromFormat('d/m/Y', $registro['datapdf']);
		$registro['datapdf'] = $date->format("Y-m-d");

		$date = DateTime::createFromFormat('d/m/Y', $registro['datasistema']);
		$registro['datasistema'] = $date->format("Y-m-d");

		$this->Registrosmodel->save($registro);
		$this->session->set_flashdata('mensagem', '<div class="alert alert-success"> O registro foi salvo com sucesso! </div>');
		redirect(base_url() .'registros');
	}

	public function editar($id = null) {

		$registro = $this->Registrosmodel->getById($id);

		$dados = array('registro' => $registro);
		$dadosHeader = array(
			'aba' => 'registros'
			);
					
		$this->load->view('header', $dadosHeader);
		$this->load->view('formRegistros', $dados);
		$this->load->view('footer');
	}

	public function atualizar() {
		
		$registro = $this->input->post();

		$date = DateTime::createFromFormat('d/m/Y', $registro['datapdf']);
		$registro['datapdf'] = $date->format("Y-m-d");

		$date = DateTime::createFromFormat('d/m/Y', $registro['datasistema']);
		$registro['datasistema'] = $date->format("Y-m-d");

		$this->Registrosmodel->update($registro);

		$this->session->set_flashdata('mensagem', '<div class="alert alert-success"> Os dados do registro foram atualizados com sucesso! </div>');
		redirect(base_url() .'registros');
	}

	public function excluir($id = null) {

		$registro = $this->Registrosmodel->delete($id);
		$this->session->set_flashdata('mensagem', '<div class="alert alert-success"> O item foi excluído. </div>');
		redirect(base_url() .'registros');
	}

	public function visualizar($id = null) {

		$dadosHeader = array(
			'aba' => 'registros'
		);

		$registro =  $this->Registrosmodel->getById($id);

		$dados = array(
			 'registro' => $registro
		);
		
		$this->load->view('header', $dadosHeader);
  		$this->load->view('showRegistro', $dados);
  		$this->load->view('footer');
	}
}
