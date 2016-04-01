<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

require_once 'Modelogenerico.php';

class Advogados extends Modelogenerico {

	public function __construct() {
		$this->nomeTabela = 'advogados';
	}

	public function search() {
		$this->db->select('*');
		$this->db->from($this->nomeTabela);
		$this->db->order_by('id', 'desc'); 
		$this->db->limit(100);
		$query = $this->db->get();
		return $query->result();
	}

	public function updateNome($cod_escritorio, $nome) {

		$this->db->where('cod_escritorio', $cod_escritorio);
		$this->db->update(
			$this->nomeTabela, 
			array(
				'nome' => $nome,
				'atualizado' => 'ATU'
			)
		);

		//$affected_rows = $this->db->affected_rows();
		//return $affected_rows != 0 ? true : false;
		return true;
	}

	public function updateOAB_complemento($cod_escritorio, $oab, $complemento) {

		$this->db->where('cod_escritorio', $cod_escritorio);
		$this->db->update(
			$this->nomeTabela,
			array(
				'oab' => $oab,
				'tipo' => $complemento,
				'atualizado' => 'ATU'
			)
		);

		//$affected_rows = $this->db->affected_rows();
		//return $affected_rows != 0 ? true : false;
		return true;
	}

	public function getByOab_UF($oab, $uf) {
		$this->db->select('oab, uf, tipo, cod_escritorio, nome');
		$this->db->from($this->nomeTabela);
		$this->db->where(
			array(
				'oab' => $oab,
				'uf' => $uf
			)
		);

		$query = $this->db->get();
		return $query->row();
	}

	public function getByEmail($email) {
		$this->db->select('passe,oab,uf,tipo'); 
		$this->db->from($this->nomeTabela);
		$this->db->where(
			array(
				'email' => $email
			)
		);

		$query = $this->db->get();
		return $query->row();
	}	

	public function getByEscritorio($cod_escritorio) {
		return $this->db->get_where($this->nomeTabela, array('cod_escritorio' => $cod_escritorio))->row();
	}

	public function getByEscritorioSenha($cod_escritorio, $senha) {
		
		return $this->db->get_where(
			$this->nomeTabela, 
			array(
				'cod_escritorio' => $cod_escritorio 
				
			))->row();	
	}

	/*public function getByEscritorioSenha($cod_escritorio, $senha) {
		
		return $this->db->get_where(
			$this->nomeTabela, 
			array(
				'cod_escritorio' => $cod_escritorio, 
				'passe' => $senha
			))->row();	
	}*/

	public function setarAtualizacao($escritorio = null) {

		$this->db->where('cod_escritorio', $escritorio);
		$this->db->update(
			$this->nomeTabela,
			array(
				'atualizado' => 'ATU',
				'escolheu_abrangencia' => 1
			)
		);

		$affected_rows = $this->db->affected_rows();
		return $affected_rows != 0 ? true : false;
	}

	public function validarAdvogado($email, $passe) {

	 	$encontrado = $this->db->get_where(
	 		$this->nomeTabela, 
	 		array(
	 			'email' => $email,
	 			'passe' => $passe
 			)
 		)->row();

	 	if (empty($encontrado)) {
	 		
	 		return array(
	 			'status' => EMAIL_OU_SENHA_INCORRETOS,
	 			'mensagem' => MSG_EMAIL_OU_SENHA_INCORRETOS,
	 			'advogado' => null
 			);

	 	} else if($encontrado->ativo == 0) {
 			
	 		return array(
	 			'status' => CADASTRO_INATIVO,
	 			'mensagem' => MSG_CADASTRO_INATIVO,
	 			'advogado' => $encontrado
 			);
 			
	 	} else if($encontrado->escolheu_abrangencia == 0) {
			
			return array(
				'status' => ESCOLHER_ABRANGENCIA,
				'mensagem' => MSG_ESCOLHER_ABRANGENCIA,
				'advogado' => $encontrado
			);
		} else {

	 		return array(
	 			'status' => OK,
	 			'mensagem' => MSG_LOGIN_OK,
	 			'advogado' => $encontrado
 			);
	 	}
	}

	public function getUserdataById($id) {
	
		$this->db->select('id, nome, cod_escritorio');
		$this->db->from($this->nomeTabela);
		$this->db->where(
			array(
				'id' => $id
			)
		);

		$query = $this->db->get();
		return $query->row();
	}

	public function cadastrar($dados)	{
		if($dados != null) {

			$this->db->insert('`'. $this->nomeTabela .'`', $dados);
			$insertId = $this->db->insert_id();

			$dadosUpdate['id'] = $insertId;
			$dadosUpdate['cod_escritorio'] = $insertId;;
			$this->update($dadosUpdate);

			$novoAdv = $this->getUserdataById($insertId);
			return $novoAdv;
		}		
	}

	public function getDiasRestantes($id) {
		
		$this->db->select('data_cadastro, id_assinatura, ativo_fim');
		$this->db->from($this->nomeTabela);
		$this->db->where(
			array(
				'id' => $id
			)
		);

		$query = $this->db->get();
	 	$dataContagem = $query->row();
	 	
	 	$startTimeStamp = null;
	 	if($dataContagem->id_assinatura == null) {
			$startTimeStamp = strtotime($dataContagem->data_cadastro);
	 	} else {
	 		$startTimeStamp = strtotime($dataContagem->ativo_fim);
	 	}
	 	
		$endTimeStamp = strtotime(date("Y-m-d H:i:s"));

		$timeDiff = abs($endTimeStamp - $startTimeStamp);
		$numberDays = $timeDiff/86400;

		$numberDays = intval($numberDays);

		return 30 - $numberDays;
	}

	public function getExistenteByEmail($email) {
		$this->db->where('email', $email);
		$this->db->from($this->nomeTabela);
		return $this->db->count_all_results() > 0 ? true : false;
	}
}