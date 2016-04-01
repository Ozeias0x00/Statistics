<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

require_once 'Modelogenerico.php';

class Contmodel extends ModeloGenerico {

    public function __construct() {
        $this->nomeTabela = 'advogados';                         //chama a tabela advogados do db.
    }
    public function ContCadastro($id){
        
       //$conecta_bd = mysql_connect("localhost", "localhost", "");
       //$select_bd = mysql_select_db("novo", $conecta_bd);
      


       $date = $this->input->get_where('data_cadastro');
       $data = DateTime::createFromFormat('d/m/Y H:i', $date);
       $data->format('Y-m-d H:i:s');

       $sql= mysql_query("SELECT data_cadastro FROM advogados");
       $contador=null;
       $a = 0;

       while($data == mysql_fetch_array($sql)){
            //$d = $dados ['data_cadastro'];
            $contador=count($a);
       }
    return $contador;
    }
}
       ?>




       $dataString = '19/03/2013 11:22';
$date = DateTime::createFromFormat('d/m/Y H:i', $dataString);