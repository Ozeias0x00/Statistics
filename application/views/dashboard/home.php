<div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main container">
    <div class="breadcrumbs sombra"> <a href="<?php echo base_url(); ?>">  Suporte </a> / <b> Início </b></div>
    <?php echo $this->session->flashdata('mensagem'); ?>
	<form id="formFiltro" method="post" action="<?php echo base_url(); ?>main/index" class="Filto" 
		style="background-color: white; width:40%; padding: 5px 15px 15px 15px; margin-bottom: 10px; border: solid 1px #ccc; border-radius: 3px;">

        <div class="form-group" style="width: 100%">
            <h3>Filtrar</h3>

            	<?php
            		if ($dadosForm == null) $dadosForm = array('status' => 'TODOS');
            	?>
                <select id="status" name="status" class="form-control" required="">
                <option <?php echo $dadosForm['status'] == 'NOVO' ? 'selected' : ''; ?> value="NOVO">Novo</option>
                <option <?php echo $dadosForm['status'] == 'RESPONDIDO' ? 'selected' : ''; ?> value="RESPONDIDO">Respondido</option>
                <option <?php echo $dadosForm['status'] == 'LIDO' ? 'selected' : ''; ?> value="LIDO">Lido</option> 
                <option <?php echo $dadosForm['status'] == 'PENDENTE' ? 'selected' : ''; ?> value="PENDENTE">Pendente</option> 
                <option <?php echo $dadosForm['status'] == 'TODOS' ? 'selected' : ''; ?> value="">Todos</option> 
            </select>    
        </div>
        <button type="submit" class="btn btn-default btn-lg" style="background-color: #337ab7; border-color: #2e6da4; color: white; padding:6px 12px; font-size: 15px">Filtrar</button>
	</form>

	<div class="table-responsive">      
	    <table class="table table-striped table-bordered">
	        <thead>
	            <tr>
	            	<th>Data</th>
					<th>Usuário</th>
					<th>Tipo</th>
					<th>Status</th>
					<th>Origem</th>
					<th>Inativar</th>
	            </tr>
	        </thead>
	        <tbody>
	        <?php

	        	$statusArray = array(
					'NOVO' => '<div class="label label-default"> Novo </div>',
					'RESPONDIDO' => '<div class="label label-success"> Respondido </div>',
					'LIDO' => '<div class="label label-primary"> Lido </div>',
					'PENDENTE' => '<div class="label label-warning"> Pendente </div>'
        		);


			    if(!empty($contatos)) {
		            foreach ($contatos as $c) {
	            		$nome = $c->nomeAdvogado == null ? $c->nome : $c->nomeAdvogado;
	            		$pagador = empty($c->id_assinatura) ? '' : '<span style="padding: 5px;" class="label label-success"><span class="glyphicon glyphicon-usd"></span></span>';


		                echo '
		                <tr class="tableCustomRow">
							<td><a href="'. base_url() .'main/visualizarContato/'. $c->id .'"> '. date('d/m/Y H:i', strtotime($c->data))   .' </a></td>
							<td style="text-align: left;">'. $pagador .'<a href="'. base_url() .'main/visualizarContato/'. $c->id .'"> '. $nome .' </a></td>
							<td><a href="'. base_url() .'main/visualizarContato/'. $c->id .'"> '. $c->tipo_chamado  .' </a></td>
							<td><a href="'. base_url() .'main/visualizarContato/'. $c->id .'"> '. $statusArray[$c->status]  .' </a></td>
							<td><a href="'. base_url() .'main/visualizarContato/'. $c->id .'"> '. $c->origem  .' </a></td>
							<td><a class="glyphicon glyphicon-trash" href="'. base_url() .'main/deletarContatoPai/'. $c->id .'"></span> </a></td>
		                </tr>';
		            }

			    } else {
			        echo '<tr> <td colspan="6"> <div class="alert alert-info"><span class="glyphicon glyphicon-info-sign"> </span> Nenhum chamado encontrado. </div></td> </tr>';
			    }

	        ?>
	        </tbody>
	    </table>
    </div>

</div>