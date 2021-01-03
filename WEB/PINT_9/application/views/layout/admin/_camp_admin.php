
 
    <div class="container">
    <div class="row">
    <div class="col-md-12">

    <h1>Campanhas</h1>

<table id="sid" class="table table-bordered table-striped table-hover ">
     <thead>
        <tr>
            <th>ID</th>
            <th>Início</th>
            <th>Fim</th>
            <th>Desconto</th>
            <th>Título</th>
            <th>Produto</th>
            <th>Gênero</th>
            <th>Estado Civil</th>
            <th>Idade</th>
            <th>Animais</th>
            <th>Codigo</th>
        </tr>
     </thead>
     <tbody>
      <?php  foreach($dados as $ds):?> 
        <tr>     
            <td> <?php  echo $ds->ID_CAMPANHA ?></a> </td>
            <td> <?php  echo $ds->DATA_INICIO ?> </td>
            <td> <?php  echo $ds->DATA_FIM ?> </td>
            <td> <?php  echo $ds->DESCONTO ?> </td>
            <td> <?php  echo $ds->TITULO ?> </td>
            <td> <?php  echo $ds->PRODUTO_ALVO ?> </td>
            <td> <?php  echo $ds->GENERO ?> </td>
            <td> <?php  echo $ds->ESTADOCIVIL ?> </td>
            <td> <?php  echo $ds->IDADE ?> </td>
            <td> <?php  echo $ds->ANIMAIS ?> </td>
            <td> <?php  echo $ds->CODIGO ?> </td>
            
        
        </tr>
      <?php endforeach;?>
     </tbody>
 </table>


    
    </div>
    </div>
    </div>  
    

    <script type="text/javascript">

    $(document).ready( function () {
    $('#sid').DataTable({
        scrollY: 400,
        "pageLength": 7
    });
} );


</script>