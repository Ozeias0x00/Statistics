<div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main container">
    <div class="breadcrumbs sombra"><a href="<?php echo base_url(); ?>registros" class="btn btn-primary btn-xs"><span class="glyphicon glyphicon-arrow-left"> </span> Voltar</a> <?php echo isset($registro) ? 'Editar' : 'Criar'; ?> registro </div>
    <form class="form-horizontal" action="<?php echo isset($registro) ? base_url() .'registros/atualizar' : base_url() .'registros/salvar'; ?>" method="post">
        <?php
            if(isset($registro)) {
                echo '<input value="'. $registro->codigo .'" type="hidden" class="form-control" name="codigo" />';
            }
        ?>

        <div class="row">
            <span class="col-sm-6 col-xs-12">
                <div class="form-group">
                    <label class="col-sm-2 control-label">Processo:</label>
                    <div class="col-sm-10">
                        <textarea class="form-control" rows="8" name="processo"><?php echo isset($registro) ? $registro->processo : ''; ?></textarea>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-2 control-label">Origem:</label>
                    <div class="col-sm-10">
                        <input value="<?php echo isset($registro) ? $registro->origem : ''; ?>" type="text" class="form-control" name="origem" />
                    </div>
                </div>   
                <div class="form-group">
                    <label class="col-sm-2 control-label">Lido:</label>
                    <div class="col-sm-10">
                        <div class="radio">
                            <label>
                                <input type="radio" name="lido" value="1"
                                    <?php 
                                        if(isset($registro) && $registro->lido == 1) {
                                            echo 'checked';
                                        }
                                    ?>
                                >
                                Sim
                            </label>
                        </div>
                        <div class="radio">
                            <label>
                                <input type="radio" name="lido" value="0"
                                    <?php 
                                        if(isset($registro) && $registro->lido == 0) {
                                            echo 'checked';
                                        }
                                    ?>
                                >
                                Não
                            </label>
                        </div>
                    </div>
                </div>   
                <div class="form-group">
                    <label class="col-sm-2 control-label">Oab:</label>
                    <div class="col-sm-10">
                        <input value="<?php echo isset($registro) ? $registro->oab : ''; ?>" type="text" class="form-control" name="oab" />
                    </div>
                </div>   
                
                <div class="form-group">
                    <label class="col-sm-2 control-label">Data pdf:</label>
                    <div class="col-sm-10">
                        <input value="<?php echo isset($registro) ? date('d/m/Y', strtotime($registro->datapdf)) : ''; ?>" type="text" class="form-control datepicker" name="datapdf" />
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-sm-2 control-label">Data sistema:</label>
                    <div class="col-sm-10">
                        <input value="<?php echo isset($registro) ? date('d/m/Y', strtotime($registro->datasistema)) : ''; ?>" type="text" class="form-control datepicker" name="datasistema" />
                    </div>
                </div>
            </span>
        </div>
        <div class="row">
            <button type="submit" class="btn btn-primary" style="margin-left: 7.8%;"><span class="glyphicon glyphicon-floppy-disk"></span> <?php echo isset($registro) ? 'Atualizar' : 'Salvar'; ?> </button>
            <a href="<?php echo base_url(); ?>registros" class="btn btn-default"> Cancelar </a>
        </div>
    </form>
</div>