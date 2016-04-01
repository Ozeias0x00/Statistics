<div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main container">
    <div class="breadcrumbs sombra">Vista / Todos escritórios</div>
    <br><br>
    <table class="table table-striped table-bordered">
        <thead>
            <tr>
                <th> CodEscritorio </th>
                <th> Area </th>
                <th> Nome </th>
                <th> Senha </th>
                <th> Endereco </th>
                <th> Cidade </th>
                <th> Estado </th>
                <th> Cep </th>
                <th> Telefone </th>
                <th> DataCadastro </th>
                <th> Bloqueado </th>
				<th></th>
            </tr>
        </thead>
        <tbody>
            <?php
                foreach ($escritoriosList as $e) {
                    echo 
                    '<tr>
                        <td>'. $e->codEscritorio .'</td>
                        <td>'. $e->area .'</td>
                        <td>'. $e->nome .'</td>
                        <td>'. $e->senha .'</td>
                        <td>'. $e->endereco .'</td>
                        <td>'. $e->cidade .'</td>
                        <td>'. $e->estado .'</td>
                        <td>'. $e->cep .'</td>
                        <td>'. $e->telefone .'</td>
                        <td>'. $e->dataCadastro .'</td>
                        <td>'. $e->bloqueado .'</td>
                        <td><a class="btn btn-default" href="'. base_url() .'VistaEscritorios/"> </a></td>
                    </tr>';
                }
            ?>
         </tbody>
    </table>
</div>