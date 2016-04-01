<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class ModeloGenerico extends CI_Model {

	public $nomeTabela;

    public function getTotal() {

        return $this->db->count_all($this->nomeTabela);
    }

	public function listAll($reverse = null) {
		$this->db->select('`'. $this->nomeTabela .'`.*', FALSE);
		$this->db->from($this->nomeTabela);

		if(!empty($reverse) && $reverse == 'r') {
			$this->db->order_by('codigo', 'desc');
		}

		return $this->db->get()->result();
	}

	public function getById($codigo = null) {

		if($codigo != null ) {
			return $this->db->get_where($this->nomeTabela, array('codigo' => $codigo))->row();
		} else {
			return false;
		}
	}

	public function save($dados = null) {

		if($dados != null) {
			$this->db->insert('`'. $this->nomeTabela .'`', $dados);
			return $this->db->insert_id();
		}
	}

	public function update($dados = null) { 

		$this->db->where('id', $dados['id']);
		unset($dados['id']);
		
		$this->db->update($this->nomeTabela, $dados);
		
	}

	public function delete($codigo = null) {
		$this->db->where('codigo', $codigo);
		$this->db->delete('`'. $this->nomeTabela .'`'); 
	}
}