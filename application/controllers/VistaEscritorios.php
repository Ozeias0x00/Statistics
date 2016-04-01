<?php
defined('BASEPATH') OR exit('No direct script access allowed');


/**

	ResultadoOperacao cadastrar(string $nomeRelacional, string $token, Escritorio $escritorio)
	ResultadoOperacao setEscritorio(string $nomeRelacional, string $token, Escritorio $escritorio)
	ResultadoOperacao remover(string $nomeRelacional, string $token, int $codEscritorio)
	ResultadoOperacaoRetornoEscritorio getEscritorio(string $nomeRelacional, string $token, int $codEscritorio)
	ResultadoOperacaoRetornoArrayOfEscritorio getEscritorios(string $nomeRelacional, string $token)
*/

class VistaEscritorios extends CI_Controller {

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

		$dadosHeader = array(
			'aba' => 'vista'
		);

		$this->load->view('header', $dadosHeader);
  		$this->load->view('vista/escritorios.php');
  		$this->load->view('footer');	  	
	}

	public function todosEscritorios() {
		$escritoriosList = null;
		try {
			ini_set('soap.wsdl_cache_enabled',0); 
			ini_set('soap.wsdl_cache_ttl',0);
			$client = new SoapClient('http://acessows.sytes.net:9191/recorte/webservice/20150600/EscritorioService.wsdl');
			$retorno = $client->getEscritorios(NOME, TOKEN);
			$escritoriosList = $retorno->retorno;

		} catch (SoapFault $excp) {
			echo var_dump($excp);
			exit();
		}

		$dadosHeader = array('aba' => 'vista');
		$dadosBody = array('escritoriosList' => $escritoriosList);

		$this->load->view('header', $dadosHeader);
		$this->load->view('vista/todosEscritorios', $dadosBody);
		$this->load->view('footer');
	}

	public function visualizarEscritorio() {
		$codEscritorio = $this->input->get('codEscritorio');
		$escritorio = null;

		try {
			ini_set('soap.wsdl_cache_enabled', 0); 
			ini_set('soap.wsdl_cache_ttl', 0);
			$client = new SoapClient('http://acessows.sytes.net:9191/recorte/webservice/20150600/EscritorioService.wsdl');
			$retorno = $client->getEscritorio(NOME, TOKEN, $codEscritorio);
			$escritorio = $retorno->retorno;

		} catch (SoapFault $excp) {
			echo var_dump($excp);
			exit();
		}

		$dadosHeader = array('aba' => 'vista');
		$dadosBody = array('escritorio' => $escritorio);

		$this->load->view('header', $dadosHeader);
		$this->load->view('vista/visualizarEscritorio', $dadosBody);
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
}
