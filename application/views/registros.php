<div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main container">
    <div class="breadcrumbs sombra">Registros</div>
        
    <a style="margin-bottom: 20px;" href="<?php echo base_url(); ?>registros/criar" class="btn btn-primary"> <span class="glyphicon glyphicon-plus" aria-hidden="true"></span> Criar Registro</a>

    <legend>Filtros de busca <a href="#" class="btn-xs btnFiltros"><span class="glyphicon glyphicon-minus" aria-hidden="true"></span> <span class="texto">Ocultar</span> </a></legend>
    <form class="form-horizontal filtros" action="<?php echo base_url(); ?>registros" method="get">
        <div class="row">
            <span class="col-sm-5">
                <div class="form-group">
                    <label class="col-sm-2 control-label">Codigo:</label>
                    <div class="col-sm-10">
                        <input value="<?php echo $this->input->get('codigo'); ?>" type="text" class="form-control" name="codigo" />
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-sm-2 control-label">Lido:</label>

                    <div class="col-sm-10">
                        <div class="radio">
                            <label>
                                <input type="radio" name="lido" value="2" <?php echo ($this->input->get('lido') == 2 || $this->input->get('lido') == null) ? 'checked' : ''; ?>>
                                Ambos
                            </label>
                        </div>
                        <div class="radio">
                            <label>
                                <input type="radio" name="lido" value="1" <?php echo ($this->input->get('lido') == 1 && $this->input->get('lido') != null) ? 'checked' : ''; ?>>
                                Sim
                            </label>
                        </div>
                        <div class="radio">
                            <label>
                                <input type="radio" name="lido" value="0" <?php echo ($this->input->get('lido') == 0 && $this->input->get('lido') != null) ? 'checked' : ''; ?>>
                                Não
                            </label>
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-sm-2 control-label">Processo:</label>
                    <div class="col-sm-10">
                        <input value="<?php echo $this->input->get('processo'); ?>" type="text" class="form-control" name="processo" />
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-2 control-label">Oab:</label>
                    <div class="col-sm-10">
                        <input value="<?php echo $this->input->get('oab'); ?>" type="text" class="form-control" name="oab" />
                    </div>
                </div>           
            </span>
            <span class="col-sm-5">
                <div class="form-group">
                    <label class="col-sm-2 control-label">Origem:</label>
                    <div class="col-sm-10">
                        <input value="<?php echo $this->input->get('origem'); ?>" type="text" class="form-control" name="origem" />
                    </div>
                </div>                 
                <div class="form-group">
                    <label class="col-sm-2 control-label">Data pdf:</label>
                    <div class="col-sm-10">
                        <input style="display: inline-block; width: 49%;" value="<?php echo $this->input->get('data_pdfDe'); ?>"  type="text" class="form-control datepicker" name="data_pdfDe" placeholder="De" />
                        <input style="display: inline-block; width: 49%;" value="<?php echo $this->input->get('data_pdfAte'); ?>" type="text" class="form-control datepicker" name="data_pdfAte" placeholder="Até"/>
                    </div>
                </div>                  
                <div class="form-group">
                    <label class="col-sm-2 control-label">Data sitema:</label>
                    <div class="col-sm-10">
                        <input style="display: inline-block; width: 49%;" value="<?php echo $this->input->get('data_sitemaDe'); ?>" type="text" class="form-control datepicker" name="data_sitemaDe" placeholder="De" />
                        <input style="display: inline-block; width: 49%;" value="<?php echo $this->input->get('data_sitemaAte'); ?>" type="text" class="form-control datepicker" name="data_sitemaAte" placeholder="Até" />
                    </div>
                </div>
            </span>
        </div>
        <div class="row">
            <button type="submit" class="btn btn-default" style="margin-left: 7.8%;"> <span class="glyphicon glyphicon-search"></span> Pesquisar</button>
        </div>
    </form>

    <?php

        echo '
            <br>
            <div> <span class="glyphicon glyphicon-filter"> </span><span class="text text-info"> '. $total .' registros encontrados</span></div>
            <br>'. $this->session->flashdata('mensagem');
        echo $paginacao;
    ?>
    <table class="table table-striped table-bordered">
        <thead>
            <tr>
				<th>Codigo</th>
                <th>Datapdf</th>
                <th>Datasistema</th>
                <th>Origem</th>
                <th>Lido</th>
                <th>Oab </th>
				<th></th>
            </tr>
        </thead>
        <tbody>
            <?php 
                if($listaPaginada) {

                    foreach ($listaPaginada as $r) {
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
                }
            ?>
        </tbody>
    </table>
    <?php echo $paginacao; ?>
</div>