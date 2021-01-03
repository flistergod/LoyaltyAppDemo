<div class="container">
    <div class="row">
    <div class="col-md-12">

    <h1>Cartões</h1>

<table id="sid" class="table table-bordered table-striped table-hover ">
     <thead>
        <tr>
            <th>ID</th>
            <th>Início</th>
            <th>Fim</th>
            <th>Carimbos</th>
            <th>Desconto</th>
            <th>Designação</th>
            <th>Título</th>
            <th>Produto</th>
            <th>Código</th>
        </tr>
     </thead>
     <tbody>
      <?php  foreach($dados as $ds):?> 
        <tr>     
            <td> <?php  echo $ds->ID_CARTAO ?></a> </td>
            <td> <?php  echo $ds->DATA_INICIO ?> </td>
            <td> <?php  echo $ds->DATA_FIM ?> </td>
            <td> <?php  echo $ds->CARIMBOS ?> </td>
            <td> <?php  echo $ds->DESCONTO ?> </td>
            <td> <?php  echo $ds->DESIGNACAO ?> </td>
            <td> <?php  echo $ds->TITULO ?> </td>
            <td> <?php  echo $ds->PRODUTO_ALVO ?> </td>
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