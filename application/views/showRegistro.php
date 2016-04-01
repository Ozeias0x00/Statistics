<div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main container">
    <div class="breadcrumbs sombra">Registro > Visualizar</div>
    <legend>Dados do registro</legend>
    <dl class="dl-horizontal">

        <dt>Codigo:</dt>
        <dd><?php echo $registro->codigo; ?></dd>

        <dt>Processo:</dt>
        <dd>
            <p style="width: 50%; text-align: justify;">
                <?php echo $registro->processo; ?>
            </p>
        </dd>

        <dt>Datapdf:</dt>
        <dd><?php echo  date('d/m/Y', strtotime($registro->datapdf));  ?></dd>

        <dt>Datasistema:</dt>
        <dd><?php echo  date('d/m/Y', strtotime($registro->datasistema));  ?></dd>

        <dt>Origem:  </dt>
        <dd><?php echo $registro->origem; ?></dd>

        <dt>Lido:</dt>
        <dd><?php echo $registro->lido == 1 ? 'Sim' : 'Não'; ?></dd>

        <dt>Oab:</dt>
        <dd><?php echo $registro->oab; ?></dd>
    </dl>
    <div class="btn-group col-md-offset-1">
        <a href="<?php echo base_url(); ?>registros" class="btn btn-default"><span class="glyphicon glyphicon-arrow-left"></span> Voltar</a>
        <a href="<?php echo base_url() .'registros/editar/' . $registro->codigo; ?>" class="btn btn-default"><span class="glyphicon glyphicon-edit"></span> Editar</a>
        <a href="<?php echo base_url() .'registros/excluir/'. $registro->codigo; ?>" class="btn btn-danger btnExcluir"><span class="glyphicon glyphicon-trash"></span> Excluir</a>    
    </div>
</div>

