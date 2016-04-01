<div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main container">
    <div class="breadcrumbs sombra">Cadastro</div>
         

    <legend>Levantamento de Cadastros<a href="<?php echo base_url(); ?>ContCadastro" class="btn-xs btnFiltros"><span class="glyphicon glyphicon-minus" aria-hidden="true"></span> <span class="texto">Ocultar</span> </a></legend> 


    <div class="form-group">
                    <label class="col-sm-2 control-label">Data de Cadastro:</label>
                    <div class="col-sm-10">
                        <input value="<?php echo $this->input->get('data_cadastro'); ?>" type="text" class="form-control" name="data_cadastro" />
                        <!--<input style="display: inline-block; width: 49%;" value="" type="text" class="form-control datepicker hasDatepicker" name="data_cadastro" placeholder="De" id=""/>!-->     
                   </div>
    
     <?php
          echo 'Foram encontrados'. $contador.'Cadastros';
         
     ?>

  
</div>



