<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="shortcut icon" type="image/x-icon" href="<?php echo base_url(); ?>includes/img/logo_1.png">
		<link rel="apple-touch-icon" href="<?php echo base_url(); ?>includes/img/logo_1.png">
        <title>Sistema - Advogar</title>
        <link href="<?php echo base_url(); ?>includes/css/bootstrap.min.css" rel="stylesheet">
        <link href="<?php echo base_url(); ?>includes/css/style.css" rel="stylesheet">
        <link href="<?php echo base_url(); ?>includes/jquery-ui/jquery-ui.min.css" rel="stylesheet">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
        <script src="<?php echo base_url(); ?>includes/js/bootstrap.min.js"></script>
        <script src="<?php echo base_url(); ?>includes/jquery-ui/jquery-ui.min.js"></script>
        <script src="<?php echo base_url(); ?>includes/js/script.js"></script>
    </head>
    <body>
        <nav id="navbar" class="navbar navbar-fixed-top">
            <div class="container-fluid">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    </button>
                    <a href="#" id="homeButton">
                    	<img style="display: inline-block;" src="<?php echo base_url(); ?>includes/img/logo2.png" />
                    </a>

                </div>
                <div id="navbar" class="navbar-collapse collapse">
                    <ul class="nav navbar-nav navbar-right">
                        <li>
                            <p class="navbar-btn">
                                <a style="margin-right: 20px;" href="<?php echo base_url(); ?>main/sair" class="btn btn-default"><span class="glyphicon glyphicon-off"></span> Sair</a>  
                            </p>
                        </li>                        
<!--                         <li>
                        	<a href="#"><span class="glyphicon glyphicon-off" aria-hidden="true"></span></a>
                    	</li> -->
                    </ul>
                </div>
            </div>
        </nav>
        <div class="container-fluid">
            <div class="row">
                <div id="menuLateral" class="col-sm-3 col-md-2 sidebar">
                    <ul class="nav nav-sidebar">
                        <li class="<?php echo $aba == 'index'         ? 'active' : ''; ?>"><a href="<?php echo base_url(); ?>"> <span class="glyphicon glyphicon-home" aria-hidden="true"></span> Início </a></li>
                        <li class="<?php echo $aba == 'advogados'     ? 'active' : ''; ?>"><a href="<?php echo base_url(); ?>advogados"> <span class="glyphicon glyphicon-user" aria-hidden="true"></span> Advogados </a></li>
                        <li class="<?php echo $aba == 'email_nao_lidas'     ? 'active' : ''; ?>"><a href="<?php echo base_url(); ?>"> <span class="glyphicon glyphicon glyphicon-download-alt" aria-hidden="true"></span> Publicações não lidas </a></li>
                        <li class="<?php echo $aba == 'pub_lidas_dia'     ? 'active' : ''; ?>"><a href="<?php echo base_url(); ?>"> <span class="glyphicon glyphicon-cloud" aria-hidden="true"></span> Saiu processos? </a></li>
                        <li class="<?php echo $aba == 'pub_lidas_dia'     ? 'active' : ''; ?>"><a href="<?php echo base_url(); ?>"> <span class="glyphicon glyphicon-stats" aria-hidden="true"></span> Pubs. lidas x Dia </a></li>
                        <li class="<?php echo $aba == 'pub_lidas_dia'     ? 'active' : ''; ?>"><a href="<?php echo base_url(); ?>"> <span class="glyphicon glyphicon-stats" aria-hidden="true"></span> Pubs. x Novos usuários </a></li>
                        <li class="<?php echo $aba == 'pub_lidas_dia'     ? 'active' : ''; ?>"><a href="<?php echo base_url(); ?>"> <span class="glyphicon glyphicon-stats" aria-hidden="true"></span> Usuários x Estado </a></li>
                        <li class="<?php echo $aba == 'pub_lidas_dia'     ? 'active' : ''; ?>"><a href="<?php echo base_url(); ?>"> <span class="glyphicon glyphicon-stats" aria-hidden="true"></span> Usuários x Dia </a></li>
                        
                        <li class="<?php echo $aba == 'cont_cadastros'     ? 'active' : ''; ?>"><a href="<?php echo base_url(); ?>VistaCont/"><span class="glyphicon glyphicon glyphicon-download-alt" aria-hidden="true"></span> Levantamento de Cadastros </a></li>

                        <li class="<?php echo $aba == 'vista'     ? 'active' : ''; ?>"><a href="<?php echo base_url(); ?>vistaEscritorios/"><span class="glyphicon glyphicon-cloud-download" aria-hidden="true"></span> Gerenciador Vista </a></li>



                    </ul>
                    <a href="#" style="display: none;" class="btnTopo btn-lg btn btn-default"><span class="glyphicon glyphicon-arrow-up"></span></a>  
                </div>
