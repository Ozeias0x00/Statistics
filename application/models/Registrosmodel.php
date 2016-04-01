<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

require_once 'Modelogenerico.php';

class RegistrosModel extends ModeloGenerico {

    public function __construct() {
        $this->nomeTabela = 'registros_br';
    }

    public function getTotalLidos() {
        $query = $this->db->query('SELECT COUNT( * ) AS lidos FROM registros_br WHERE lido = 1');
        return intval($query->result()[0]->lidos);
    }

    public function getTotal() {
        $query = $this->db->query('SELECT COUNT( * ) AS total FROM registros_br');
        return intval($query->result()[0]->total);
    }

    public function paginarSearch($order_by, $asc_desc) {

        if($this->input->get('codigo') != '') {
            $this->db->like('codigo', $this->input->get('codigo'));
        }
        if($this->input->get('processo') != '') {
            $this->db->like('LOWER(processo)', strtolower($this->input->get('processo')));
        }
        if($this->input->get('oab') != '') {
            $this->db->like('LOWER(oab)', strtolower($this->input->get('oab')));
        }

        if($this->input->get('origem') != '') {
            $this->db->like('LOWER(origem)', strtolower($this->input->get('origem')));
        }        

        if($this->input->get('data_pdfDe') != '') {
            $date = DateTime::createFromFormat('d/m/Y', $this->input->get('data_pdfDe'));
            $this->db->where('datapdf >=', $date->format("Y-m-d"));
        }
        if($this->input->get('data_pdfAte') != '') {
            $date = DateTime::createFromFormat('d/m/Y', $this->input->get('data_pdfAte'));
            $this->db->where('datapdf <=', $date->format("Y-m-d"));
        }

        if($this->input->get('data_sitemaDe') != '') {
            $date = DateTime::createFromFormat('d/m/Y', $this->input->get('data_sitemaDe'));
            $this->db->where('datasistema >=', $date->format("Y-m-d"));
        }
        if($this->input->get('data_sitemaAte') != '') {
            $date = DateTime::createFromFormat('d/m/Y', $this->input->get('data_sitemaAte'));
            $this->db->where('datasistema <=', $date->format("Y-m-d"));
        }

        if($this->input->get('lido') != 2 && $this->input->get('lido') != null) {
            $this->db->where('lido', $this->input->get('lido'));
        }
        
        $this->db->order_by($order_by, $asc_desc);
        $query = $this->db->get($this->nomeTabela);

        return $query->result();
    }

    public function listByOab($oab) {
        $this->db->select('`'. $this->nomeTabela .'`.*', FALSE);
        $this->db->from($this->nomeTabela);
        $this->db->where('oab', $oab);
        $this->db->order_by('codigo', 'desc');

        return $this->db->get()->result();
    }    
}