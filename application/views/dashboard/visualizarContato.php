<div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main container">
    <div class="breadcrumbs sombra"> <a href="<?php echo base_url(); ?>main"> Início </a>  / <b> Visualizar chamado </b></div>
    

<form id="formStatus" method="post" action="<?php echo base_url(); ?>main/salvarStatus" class="formulario" style="background-color: white; width:40%; padding: 5px 15px 15px 15px">
        <div class="form-group" style="width: 100%">
            <h3>Status</h3>
            <input type="hidden" name="id" value="<?php echo $contato->id; ?>">
            <select id="status" name="status" class="form-control" required="">
                <option <?php echo $contato->status == 'NOVO' ? 'selected' : ''; ?> value="NOVO">Novo</option>
                <option <?php echo $contato->status == 'RESPONDIDO' ? 'selected' : ''; ?> value="RESPONDIDO">Respondido</option>
                <option <?php echo $contato->status == 'LIDO' ? 'selected' : ''; ?> value="LIDO">Lido</option> 
                <option <?php echo $contato->status == 'PENDENTE' ? 'selected' : ''; ?> value="PENDENTE">Pendente</option> 
            </select>    
        </div>

        <div data-lock="0" id="divCheckPasswordMatch"></div>

            <button type="submit" class="btn btn-default btn-lg" style="background-color: #337ab7; border-color: #2e6da4; color: white; padding:6px 12px; font-size: 15px">Salvar</button>
                        
</form>


    <div id="informacoesProcesso" class="sombra col-sm-12  col-xs-12 col-md-8" style="background-color: white; margin-top: 30px">

        <form method="post" action="<?php echo base_url(); ?>main/salvarChamado">
            <input type="hidden" name="contato_pai" value="<?php echo $contato->id; ?>" />
            <h3>Mensagens</h3>
             <div class="alert alert-info"> 
                <?php 
                    echo  '<b> Cliente: </b>' . $contato->mensagem; 
                ?> 
            </div>
            <?php 

                foreach ($listaFilhos as $c) {
                    
                    echo $c->origem == 'SUPORTE' ? '<div class="alert alert-success"> ' : '<div class="alert alert-info"> ';
                    echo $c->origem == 'SUPORTE' ? '<b>Suporte: </b>' : '<b> Cliente: </b> ';

                    if($c->origem == 'SUPORTE') {
                        echo $c->mensagem . '<a href="'. base_url() .'main/deletarContatoFilho/'. $c->id .'" class="btn btn-sm btn-danger" style="float: right; margin-top: -6px;"> <span class="glyphicon glyphicon-trash"> </span> </a> </div>';    
                    } else {
                        echo $c->mensagem . '</div>';
                    }
                }
            ?>
            <textarea style="margin-bottom: 20px;" name="mensagem" class="form-control" rows="4" placeholder="Resposta..."></textarea>
            <button style="margin-bottom: 20px;" type="submit" class="btn btn-primary"><span class="glyphicon glyphicon-comment"></span> Responder</button>       

        </form>
        
    </div>
    <div id="teorProcesso" class="sombra col-sm-12 col-xs-12 col-md-3 col-md-offset-1" style="background-color: white; padding-bottom: 20px;">

        <h3>Informações</h3>
        <dl style="margin-bottom: 0;">

            <dt>Data</dt>
            <dd><?php echo date('d/m/Y h:i:s',  strtotime($contato->data)); ?></dd>

            <dt>Data De Cadastro</dt>
            <dd><?php   

                if($contato->origem == 'SITE') {
                    echo 'Não Inserido';
                } else {
                     echo date('d/m/Y h:i:s',  strtotime($contato->dataCadastro));    
                }

                ?></dd>

            <dt>Origem</dt>
            <dd><?php echo $contato->origem; ?></dd>

            <dt>Tipo de chamado</dt>
            <dd><?php echo $contato->tipo_chamado; ?></dd>

            <dt>Navegador</dt>
            <dd><?php echo $contato->modelo; ?></dd>

            <dt>Sistema operacional</dt>
            <dd><?php echo $contato->origem; ?></dd>

            <dt>Id do suporte</dt>
            <dd><?php echo $contato->id; ?></dd>    

            <dt>Codigo Escritorio</dt>
            <dd><?php   

                if($contato->origem == 'SITE') {
                    echo 'Não Inserido';
                } else {
                    echo $contato->cod_escritorio;  
                }

                ?></dd>
 
            <dt>Email</dt> 
            <dd>
                <?php 
 
                    if($contato->origem == 'SITE') {
                        echo $contato->email;
                    } else {
                        echo $contato->emailAdvogado;     
                    }
                ?>
            </dd>
            
            <dt>Nome</dt> 
            <dd>
                <?php 
 
                    if($contato->origem == 'SITE') {
                        echo $contato->nome;
                    } else {
                        echo $contato->nomeAdvogado;     
                    }
                ?>
            </dd>
            
            <dt>Cidade</dt> 

            <dd>
                <?php 

                if($contato->origem == 'SITE') {
                   echo'Não Inserido';
                } else {
                     echo $contato->cidadeAdvogado;   
                }
                     
                ?></dd>
            
            <dt>Uf</dt> 
            <dd>
                <?php 

                if($contato->origem == 'SITE') {
                    echo'Não Inserido';
                } else {
                    echo $contato->ufAdvogado;   
                }
                   
                ?>
            </dd>
            
            <dt>Telefone</dt> 

            <dd><?php 
 
                if($contato->origem == 'SITE') {
                   echo'Não Inserido';
                } else {
                    echo $contato->telefoneAdvogado; //!= 'null' ? 'Não Inserido' : $contato->telefoneAdvogado;   
                }
            ?></dd>

            <dt>Ativo</dt> 

            <dd><?php 

                if($contato->origem == 'SITE') {
                   echo'Não';
                } else {
                     echo ($contato->ativoAdvogado == 1) ? 'Sim' : 'Não' ;   
                }

            ?></dd>
            
            <dt>Escolheu Abrangencia</dt>        
            <dd><?php 

                if($contato->origem == 'SITE') {
                   echo'Não';
                } else {
                      echo ($contato->escolheu_abrangenciaAdvogado == 1)? 'Sim' : 'Não';                }

            ?></dd>

        </dl>        
    </div>
</div>