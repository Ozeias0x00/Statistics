<div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main container">
    <div class="breadcrumbs sombra">Vista / Escritórios</div>

    <form action="<?php echo base_url(); ?>vistaEscritorios/visualizarEscritorio" method="get" class="form-inline">
        <div class="form-group">
            <input type="text" class="form-control" placeholder="Buscar por codEscritorio" name="codEscritorio" required>
        </div>
        <button type="submit" class="btn btn-primary"><span class="glyphicon glyphicon-search"></span> Buscar</button>
    </form>
    
    <br>
        Ou
    <br>
    <br>
    
    <a style="margin-bottom: 20px;" href="<?php echo base_url(); ?>VistaEscritorios/todosEscritorios" class="btn btn-primary"> <span class="glyphicon glyphicon-th-list" aria-hidden="true"></span> Listar todos escritórios *</a> (Consulta demorada)
</div>