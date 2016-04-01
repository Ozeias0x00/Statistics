<div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main container">
    <div class="breadcrumbs sombra">Vista > Visualizar escritório</div>
    <div class="btn-group">
        <a href="<?php echo base_url(); ?>advogados" class="btn btn-default"><span class="glyphicon glyphicon-arrow-left"></span> Voltar</a>
        <a href="<?php //echo base_url() .'advogados/editar/' . $escritorio->codigo; ?>" class="btn btn-default"><span class="glyphicon glyphicon-edit"></span> Editar</a>
        <a href="<?php //echo base_url() .'advogados/excluir/'. $escritorio->codigo; ?>" class="btn btn-danger btnExcluir"><span class="glyphicon glyphicon-trash"></span> Excluir</a>    
    </div>
    <br><br>

    <legend>Dados do escritório na vista</legend>

    <dl class="dl-horizontal">
        <dt>CodEscritorio: </dt><dd> <?php echo $escritorio->codEscritorio; ?></dd>
        <dt>Area: </dt><dd> <?php echo $escritorio->area; ?></dd>
        <dt>Nome: </dt><dd> <?php echo $escritorio->nome; ?></dd>
        <dt>Senha: </dt><dd> <?php echo $escritorio->senha; ?></dd>
        <dt>Endereco: </dt><dd> <?php echo $escritorio->endereco == ' ' ? '<span class="label label-success"> Ok </span>' : '<span class="label label-danger"> Irregular </span>'; ?></dd>
        <dt>Cidade: </dt><dd> <?php echo $escritorio->cidade; ?></dd>
        <dt>Estado: </dt><dd> <?php echo $escritorio->estado; ?></dd>
        <dt>Cep: </dt><dd> <?php echo $escritorio->cep == ' ' ? '<span class="label label-success"> Ok </span>' : '<span class="label label-danger"> Irregular </span>'; ?></dd>
        <dt>Telefone: </dt><dd> <?php echo $escritorio->telefone == ' ' ? '<span class="label label-success"> Ok </span>' : '<span class="label label-danger"> Irregular </span>'; ?></dd>
        <dt>DataCadastro: </dt><dd> <?php echo $escritorio->dataCadastro; ?></dd>
        <dt>Bloqueado: </dt><dd> <?php echo $escritorio->bloqueado == false ? '<span class="label label-success">Não</span>' : '<span class="label label-danger">BLOQUEADO</span>'; ?></dd>
    </dl>

    <legend style="margin-top: 20px;">Processos para este Advogado</legend>
    <?php
        // if(empty($processosList)) {

        //     echo '<div class="alert alert-warning"> Nenhum processo! </div>';

        // } else {
        //     echo 
        //     '<table class="table table-striped table-bordered"><thead>
        //     <tr><th>Codigo</th> <th>Datapdf</th> <th>Datasistema</th> <th>Origem</th> <th>Lido</th> <th>Oab </th> <th></th> </tr>
        //     </thead><tbody>';

        //     foreach ($processosList as $r) {
        //         echo '    
        //             <tr>
        //                 <td>'. $r->codigo .'</td>
        //                 <td>'. date('d/m/Y', strtotime($r->datapdf)) .'</td>
        //                 <td>'. date('d/m/Y', strtotime($r->datasistema))  .'</td>
        //                 <td>'. $r->origem .'</td><td>';
        //                 echo $r->lido == 1 ? '<span class="label label-success"> Sim </span>' : '<span class="label label-danger"> Não </span>';
        //                 echo '</td><td>'. $r->oab .'</td>
                         
        //                 <td><a href="'. base_url() .'registros/visualizar/'. $r->codigo .'" class="btn btn-default btn-xs"> <span class="glyphicon glyphicon glyphicon-edit"> </span> Visualizar / Opções </td>
        //             </tr>';
        //     }
        //     echo '</tbody></table> ';
        // }
    ?>
</div>