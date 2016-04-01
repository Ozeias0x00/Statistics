<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

require_once 'Modelogenerico.php';

class Admin extends ModeloGenerico {

    public function __construct() {
        $this->nomeTabela = 'admin';
    }

    public function validar($dados) {
    	
	 	$encontrado = $this->db->get_where(
	 		$this->nomeTabela, 
	 		array(
	 			'email' => $dados['email'],
	 			'senha' => $dados['senha']
 			)
 		)->row();

    	return $encontrado;
    }
}