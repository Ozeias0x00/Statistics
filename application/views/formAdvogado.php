<div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main container">
    <div class="breadcrumbs sombra"><a href="<?php echo base_url(); ?>advogados" class="btn btn-primary btn-xs"><span class="glyphicon glyphicon-arrow-left"> </span> Voltar</a> <?php echo isset($advogado) ? 'Editar' : 'Criar'; ?> advogado </div>
    <form class="form-horizontal" action="<?php echo isset($advogado) ? base_url() .'advogados/atualizar' : base_url() .'advogados/salvar'; ?>" method="post">
         <input value="<?php echo isset($advogado) ? $advogado->id : ''; ?>" type="hidden" class="form-control" name="id" /> 
        <div class="row">
            <span class="col-sm-6 col-xs-12">
                <div class="form-group">
                    <label class="col-sm-2 control-label">Oab:</label>
                    <div class="col-sm-10">
                        <input value="<?php echo isset($advogado) ? $advogado->oab : ''; ?>" type="text" required class="form-control" name="oab" />
                    </div>
                </div>   
                <div class="form-group">
                    <label class="col-sm-2 control-label">Nome:</label>
                    <div class="col-sm-10">
                        <input value="<?php echo isset($advogado) ? $advogado->nome : ''; ?>" type="text" required class="form-control" name="nome" />
                    </div>
                </div>   
                <div class="form-group">
                    <label class="col-sm-2 control-label">Email:</label>
                    <div class="col-sm-10">
                        <input value="<?php echo isset($advogado) ? $advogado->email : ''; ?>" type="email" required class="form-control" name="email" />
                    </div>
                </div>   
                <div class="form-group">
                    <label class="col-sm-2 control-label">Cidade:</label>
                    <div class="col-sm-10">
                        <input value="<?php echo isset($advogado) ? $advogado->cidade : ''; ?>" type="text" class="form-control" name="cidade" />
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-2 control-label">Data de cadastro:</label>
                    <div class="col-sm-10">
                        <!--<input value="<?php echo isset($advogado) ? $advogado->data_cadastro : ''; ?>" type="text" class="form-control" name="data_cadastro" />-->
                        <input id='data' type='text' value="<?php echo isset($advogado) ?  date('d/m/Y', strtotime($advogado->data_cadastro)) : ''; ?>"  class="datepicker form-control" name="data_cadastro" />
                    </div>
                </div>   
               

             <!--  <div class="form-group">
                    <label class="col-sm-2 control-label">Ativo início:</label>
                    <div class="col-sm-10">
                        <input value="<?php echo isset($advogado) ?  date('d/m/Y', strtotime($advogado->ativo_inicio)) : ''; ?>" type="text" class="datepicker form-control" name="ativo_inicio" />
                    </div>
                </div> 

                <div class="form-group">
                    <label class="col-sm-2 control-label">Ativo fim:</label>
                    <div class="col-sm-10">
                        <input value="<?php echo isset($advogado) ?  date('d/m/Y', strtotime($advogado->ativo_fim)) : ''; ?>" type="text" class="datepicker form-control" name="ativo_fim" />
                    </div>
                </div>                 

                <div class="form-group">
                    <label class="col-sm-2 control-label">Codigo:</label>
                    <div class="col-sm-10">
                        <input value="<?php echo isset($advogado) ? $advogado->codigo : ''; ?>" type="text" class="form-control" name="codigo" />
                    </div>
                </div> -->
                <div class="form-group">
                    <label class="col-sm-2 control-label">Ativo:</label>

                    <div class="col-sm-10">
                        <div class="radio">
                            <label>
                                <input type="radio" name="ativo"value="1" <?php echo ($this->input->get('ativo') == 1 && $this->input->get('ativo') != null); ?> />
                                Sim
                            </label>
                        </div>
                        <div class="radio">
                            <label>
                                <input type="radio" name="ativo" value="0" <?php echo ($this->input->get('ativo') == 0 && $this->input->get('ativo') != null); ?>checked=""/>
                                Não
                            </label>
                        </div>
                    </div>
                </div>   
                <div class="form-group">
                    <label class="col-sm-2 control-label">Tipo:</label>
                    <div class="col-sm-10">
                        <select class="form-control" name="tipo" >
                            <option value="null">Selecionar tipo...</option>
                            <option value="N" <?php echo isset($advogado) && $advogado->tipo == 'N' ? 'selected' : ''; ?>>N - Advogado Normal    </option>
                            <option value="A" <?php echo isset($advogado) && $advogado->tipo == 'A' ? 'selected' : ''; ?>>A - Advogado Suplementar   </option>
                            <option value="D" <?php echo isset($advogado) && $advogado->tipo == 'D' ? 'selected' : ''; ?>>D - Defensor Público   </option>
                            <option value="E" <?php echo isset($advogado) && $advogado->tipo == 'E' ? 'selected' : ''; ?>>E - Estagiário     </option>
                        </select>
                    </div>
                </div>
            </span>
        </div>
        <div class="row">
            <button type="submit" class="btn btn-primary" style="margin-left: 7.8%;"><span class="glyphicon glyphicon-floppy-disk"></span> <?php echo isset($advogado) ? 'Atualizar' : 'Salvar'; ?> </button>
            <a href="<?php echo base_url(); ?>advogados" class="btn btn-default"> Cancelar </a>
        </div>
    </form>
</div>