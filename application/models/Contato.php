<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

require_once 'Modelogenerico.php';

class Contato extends ModeloGenerico {

    public function __construct() {
        $this->nomeTabela = 'contato';
    }

	public function getOrigem($id) {

		$this->db->select('origem');
		$this->db->from('contato');
		$this->db->where(array('id' => $id));
		$query = $this->db->get();
		
		$obj = $query->row();

		return $obj->origem;
	}

	public function getByIdAdvogado($id) {

		$this->db->select('
			contato.*, 
			advogados.email AS emailAdvogado, 
			advogados.nome AS nomeAdvogado,
			advogados.cidade AS cidadeAdvogado,
			advogados.uf AS ufAdvogado,
			advogados.telefone AS telefoneAdvogado,
			advogados.ativo AS ativoAdvogado,
			advogados.escolheu_abrangencia AS escolheu_abrangenciaAdvogado,
			advogados.data_cadastro AS dataCadastro

		');

		$this->db->from('contato');
		$this->db->where(array('contato.id' => $id));
		$this->db->join('advogados', 'advogados.cod_escritorio = contato.cod_escritorio');
		$query = $this->db->get();
		return $query->row();
	}

	public function getById($id = null) {

		$this->db->select('*');
		$this->db->from('contato');
		$this->db->where(array('id' => $id));
		$query = $this->db->get();
		return $query->row();
	}

	public function update($dados = null) { 

		$this->db->where('id', $dados['id']);
		unset($dados['id']);
		
		$this->db->update($this->nomeTabela, $dados);
	}


	public function delete($codigo = null) {
		$this->db->where('id', $codigo);
		$this->db->delete('`'. $this->nomeTabela .'`'); 
	}	

	public function getFilhos($id) {
		return $this->db->get_where(
			$this->nomeTabela, array(
				'contato_pai' => $id
			)
		)->result();		
	}

	public function getPais($dados = null) {

		$this->db->select('contato.*, advogados.nome as nomeAdvogado, advogados.id_assinatura');
		$this->db->from('contato');
		$where = array(
			'contato_pai' => null,
			'status != ' => 'INATIVO'
		);

		$this->db->join('advogados', 'contato.cod_escritorio = advogados.cod_escritorio', 'left');
		if ($dados != null){
			if ($dados['status'] != null){
				$where['status'] = $dados['status'];
			}
		}
		$this->db->where($where);
		$this->db->or_where(array('status' => null));
		$query = $this->db->get();

		$result = $query->result();
		return $result;
	}
}