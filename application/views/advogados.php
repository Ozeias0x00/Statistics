
<div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main container">
    <div class="breadcrumbs sombra">Advogados</div>
        
    <a style="margin-bottom: 20px;" href="<?php echo base_url(); ?>advogados/criar" class="btn btn-primary"> <span class="glyphicon glyphicon-plus" aria-hidden="true"></span> Criar Advogado</a>

    <legend>Filtros de busca <a href="#" class="btn-xs btnFiltros"><span class="glyphicon glyphicon-minus" aria-hidden="true"></span> <span class="texto">Ocultar</span> </a></legend>
    <form class="form-horizontal filtros" action="<?php echo base_url(); ?>advogados" method="get">
        <div class="row">
            <span class="col-sm-5">
                <div class="form-group">
                    <label class="col-sm-2 control-label">Oab:</label>
                    <div class="col-sm-10">
                        <input value="<?php echo $this->input->get('oab'); ?>" type="text" class="form-control" name="oab" />
                    </div>
                </div>   
                <div class="form-group">
                    <label class="col-sm-2 control-label">Nome:</label>
                    <div class="col-sm-10">
                        <input value="<?php echo $this->input->get('nome'); ?>" type="text" class="form-control" name="nome" />
                    </div>
                </div>   
                <div class="form-group">
                    <label class="col-sm-2 control-label">Email:</label>
                    <div class="col-sm-10">
                        <input value="<?php echo $this->input->get('email'); ?>" type="text" class="form-control" name="email" />
                    </div>
                </div>   
                <div class="form-group">
                    <label class="col-sm-2 control-label">Cidade:</label>
                    <div class="col-sm-10">
                        <input value="<?php echo $this->input->get('cidade'); ?>" type="text" class="form-control" name="cidade" />
                    </div>
                </div>   
                <div class="form-group">
                    <label class="col-sm-2 control-label">Nível:</label>
                    <div class="col-sm-10">
                        <input value="<?php echo $this->input->get('nivel'); ?>" type="text" class="form-control" name="nivel" />
                    </div>
                </div>       
            </span>
            <span class="col-sm-5">
                <div class="form-group">
                    <label class="col-sm-2 control-label">Ativo:</label>
                    <div class="col-sm-10">
                        <div class="radio">
                            <label>
                                <input type="radio" name="ativo" value="2" <?php echo ($this->input->get('ativo') == 2 || $this->input->get('ativo') == null) ? 'checked' : ''; ?>>
                                Ambos
                            </label>
                        </div>
                        <div class="radio">
                            <label>
                                <input type="radio" name="ativo" value="1" <?php echo ($this->input->get('ativo') == 1 && $this->input->get('ativo') != null) ? 'checked' : ''; ?>>
                                Sim
                            </label>
                        </div>
                        <div class="radio">
                            <label>
                                <input type="radio" name="ativo" value="0" <?php echo ($this->input->get('ativo') == 0 && $this->input->get('ativo') != null) ? 'checked' : ''; ?>>
                                Não
                            </label>
                        </div>
                    </div>                    
                </div>  
                
                <div class="form-group">
                    <label class="col-sm-2 control-label">Tipo:</label>
                    <div class="col-sm-10">
                        <select class="form-control" name="tipo">
                                
            
                            <option value="null">Qualquer um...</option>
                            <option value="N" <?php echo ($this->input->get('tipo') != null && $this->input->get('tipo') == 'N') ? 'selected' : ''; ?>>N - Advogado Normal</option>
                            <option value="A" <?php echo ($this->input->get('tipo') != null && $this->input->get('tipo') == 'A') ? 'selected' : ''; ?>>A - Advogado Suplementar</option>
                            <option value="D" <?php echo ($this->input->get('tipo') != null && $this->input->get('tipo') == 'D') ? 'selected' : ''; ?>>D - Defensor Público</option>
                            <option value="E" <?php echo ($this->input->get('tipo') != null && $this->input->get('tipo') == 'E') ? 'selected' : ''; ?>>E - Estagiário</option>
                        </select>
                    </div>
                </div>                
            </span>
        </div>
        <div class="row">
            <button type="submit" class="btn btn-default" style="margin-left: 7.8%;"><span class="glyphicon glyphicon-search"></span> Pesquisar</button>
        </div>
    </form>

    <?php
        echo '<br><div> <span class="glyphicon glyphicon-filter"> </span><span class="text text-info"> '. $total .' registros encontrados </div>';
        echo $this->session->flashdata('mensagem');
        echo $paginacao;
    ?>
    
    <table class="table table-striped table-bordered">
        <thead>
            <tr>
				<th>Codigo</th>
                <th>OAB</th>
				<th>Nome</th>
				<th>Email</th>
				<th>Cidade</th>
                <th>Data cadastro</th>
				<th>Ativo</th>
				<th></th>
            </tr>
        </thead>
        <tbody>
            <?php 

                if($listaPaginada) {

                    foreach ($listaPaginada as $a) {
                        echo '    
                            <tr>
                                <td>'. $a->codigo .'</td>
                                <td>'. $a->oab .'</td>
                                <td style="text-align: left;">'. $a->nome .'</td>
                                <td style="text-align: left;">'. $a->email .'</td>
                                <td style="text-align: left;">'. $a->cidade .'</td>
                                <td>'. date('d/m/Y', strtotime($a->data_cadastro)) .'</td>
                                <td>';
                                
                        echo $a->ativo == 1 ? '<span class="label label-success"> Sim </span>' : '<span class="label label-danger"> Não </span>';
                                
                                echo '</td>
                                <td><a href="'. base_url() .'advogados/visualizar/'. $a->codigo .'" class="btn btn-default btn-xs"><span class="glyphicon glyphicon glyphicon-edit"> </span> Visualizar / Opções </td>
                            </tr>';
                    }
                } 
            ?>
        </tbody>
    </table>
    <?php echo $paginacao; ?>
</div>