<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
	-- MÉTODOS INTEGRAÇÃO --
	ResultadoOperacao cadastrar(string $nomeRelacional, string $token, NomePesquisa $nome)
	ResultadoOperacao setNomePesquisa(string $nomeRelacional, string $token, NomePesquisa $nome)
	ResultadoOperacao remover(string $nomeRelacional, string $token, int $codNome)
	ResultadoOperacaoRetornoNomePesquisa getNomePesquisa(string $nomeRelacional, string $token, int $codNome)
	ResultadoOperacaoRetornoArrayOfNomePesquisa getNomesPesquisa(string $nomeRelacional, string $token, int $codEscritorio)
*/

class VistaNomes extends CI_Controller {
   	
   	public function __construct() {
		parent::__construct();
		$this->load->helper('url');
		$this->load->library('session');

		$logado = $this->session->userdata('usuarioLogado');
		if(!empty($logado) && !empty($logado->id)) {

			$this->load->database();
		} else {

			redirect(base_url() . 'login/');
		}
	}

	public function index() {

	  	$this->getResultadoPesquisa();
		$dadosHeader = array(
			'aba' => 'vistaNomes'
		);

		$this->load->view('header', $dadosHeader);
  		$this->load->view('vista/listarNomes.php');
  		$this->load->view('footer');	  	
	}

	public function getResultadoPesquisa() {

		if(!empty($this->input->get())) {	
			$nome = $this->input->get('nome');

			// Tente desabilitar o cache da WSDL
			ini_set('soap.wsdl_cache_enabled',0); 
			ini_set('soap.wsdl_cache_ttl',0);

			$client = new SoapClient('http://acessows.sytes.net:9191/recorte/webservice/20150600/NomeService.wsdl');
			try {
				echo var_dump($client->__getFunctions());
				exit();
			} catch (SoapFault $excp) {
				// Tratar exceção
			}
	  	}
	}

	public function criar() {

		$dadosHeader = array(
			'aba' => 'advogados'
			);
					
		$this->load->view('header', $dadosHeader);
		$this->load->view('formAdvogado');
		$this->load->view('footer');
	}
}