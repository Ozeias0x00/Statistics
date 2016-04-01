<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

require_once 'Modelogenerico.php';

class Advogadosmodel extends ModeloGenerico {

    public function __construct() {
        $this->nomeTabela = 'advogados';
    }

    public function paginarSearch($order_by, $asc_desc) {

        if($this->input->get('oab') != '') {
            $this->db->like('LOWER(oab)', strtolower($this->input->get('oab')));
        }
        if($this->input->get('nome') != '') {
            $this->db->like('LOWER(nome)', strtolower($this->input->get('nome')));
        }
        if($this->input->get('email') != '') {
            $this->db->like('LOWER(email)', strtolower($this->input->get('email')));
        }
        if($this->input->get('cidade') != '') {
            $this->db->like('LOWER(cidade)', strtolower($this->input->get('cidade')));
        }
        if($this->input->get('codigo') != '') {
            $this->db->like('codigo', $this->input->get('codigo'));
        }
        if($this->input->get('ativo') != '' && $this->input->get('ativo') != 2) {
            $this->db->like('ativo', $this->input->get('ativo'));
        }
        if($this->input->get('criado_emDe') != '') {
            $date = DateTime::createFromFormat('d/m/Y', $this->input->get('criado_emDe'));
            $this->db->where('criado_em >=', $date->format("Y-m-d"));

        }
        if($this->input->get('criado_emAte') != '') {
            $date = DateTime::createFromFormat('d/m/Y', $this->input->get('criado_emAte'));
            $this->db->where('criado_em <=', $date->format("Y-m-d"));
        }

        if($this->input->get('ativo_fimDe') != '') {
            $date = DateTime::createFromFormat('d/m/Y', $this->input->get('ativo_fimDe'));
            $this->db->where('ativo_fim >=', $date->format("Y-m-d"));
        }
        if($this->input->get('ativo_fimAte') != '') {
            $date = DateTime::createFromFormat('d/m/Y', $this->input->get('ativo_fimAte'));
            $this->db->where('ativo_fim <=', $date->format("Y-m-d"));
        }

        if($this->input->get('tipo') != 'null' && $this->input->get('tipo') != null) {
            $this->db->where('tipo', $this->input->get('tipo'));
        }        
        
        $this->db->order_by($order_by, $asc_desc);
        $query = $this->db->get($this->nomeTabela);

        return $query->result();
    }	
}