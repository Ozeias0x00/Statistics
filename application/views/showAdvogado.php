<div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main container">
    <div class="breadcrumbs sombra">Advogados / Visualizar</div>
    <div class="btn-group">
        <a href="<?php echo base_url(); ?>advogados" class="btn btn-default"><span class="glyphicon glyphicon-arrow-left"></span> Voltar</a>
        <a href="<?php echo base_url() .'advogados/editar/' . $advogado->codigo; ?>" class="btn btn-default"><span class="glyphicon glyphicon-edit"></span> Editar</a>
        <a href="<?php echo base_url() .'advogados/excluir/'. $advogado->codigo; ?>" class="btn btn-danger btnExcluir"><span class="glyphicon glyphicon-trash"></span> Excluir</a>    
    </div>
    <br><br>

    <legend>Dados do Advogado</legend>
    <dl class="dl-horizontal">
        <dt>Oab:           </dt><dd> <?php echo $advogado->oab; ?></dd>
        <dt>Nome:          </dt><dd> <?php echo $advogado->nome; ?></dd>
        <dt>Email:         </dt><dd> <?php echo $advogado->email; ?></dd>
        <dt>Senha:         </dt><dd> <?php echo $advogado->passe; ?></dd>        
        <dt>Cidade:        </dt><dd> <?php echo $advogado->cidade; ?></dd>
        <dt>Data cadastro: </dt><dd> <?php echo date('d/m/Y', strtotime($advogado->data_cadastro));  ?></dd>
        <dt>Ativo inicio: </dt><dd> <?php echo date('d/m/Y', strtotime($advogado->ativo_inicio));  ?></dd>
        <dt>Ativo fim: </dt><dd> <?php echo date('d/m/Y', strtotime($advogado->ativo_fim));  ?></dd>
        <dt>Codigo:         </dt><dd> <?php echo $advogado->codigo; ?></dd>
        <dt>Ativo:         </dt><dd> <?php echo $advogado->ativo; ?></dd>
        <dt>Tipo:          </dt><dd> <?php echo $advogado->tipo; ?></dd>
    </dl>

    <legend style="margin-top: 20px;">Processos para este Advogado</legend>
    <?php
    if(empty($processosList)) {

        echo '<div class="alert alert-warning"> Nenhum processo! </div>';

    } else {
        echo 
        '<table class="table table-striped table-bordered"><thead>
        <tr><th>Codigo</th> <th>Datapdf</th> <th>Datasistema</th> <th>Origem</th> <th>Lido</th> <th>Oab </th> <th></th> </tr>
        </thead><tbody>';

        foreach ($processosList as $r) {
            echo '    
                <tr>
                    <td>'. $r->codigo .'</td>
                    <td>'. date('d/m/Y', strtotime($r->datapdf)) .'</td>
                    <td>'. date('d/m/Y', strtotime($r->datasistema))  .'</td>
                    <td>'. $r->origem .'</td><td>';
                    echo $r->lido == 1 ? '<span class="label label-success"> Sim </span>' : '<span class="label label-danger"> Não </span>';
                    echo '</td><td>'. $r->oab .'</td>
                     
                    <td><a href="'. base_url() .'registros/visualizar/'. $r->codigo .'" class="btn btn-default btn-xs"> <span class="glyphicon glyphicon glyphicon-edit"> </span> Visualizar / Opções </td>
                </tr>';
        }
        echo '</tbody></table> ';
    }
    ?>
</div>