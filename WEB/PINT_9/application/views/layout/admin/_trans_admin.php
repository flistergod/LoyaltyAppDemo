<div class="container">
    <div class="row">
    <div class="col-md-12">

    <h1>Transações</h1>

<table id="sid" class="table table-bordered table-striped table-hover ">
     <thead>
        <tr>
            <th>ID</th>
            <th>Empresa</th>
            <th>Descrição Transação</th>
            <th>Data Registo</th>
            
            <th>Código</th>
        </tr>
     </thead>
     <tbody>
      <?php  foreach($dados as $ds):?> 
        <tr>     
            <td> <?php  echo $ds->ID_TRANSACAO ?></a> </td>
            <td> <?php  echo $ds->NOMEEMPRESA ?> </td>
            <td> <?php  echo $ds->DESCRICAO_TRANSACAO ?> </td>
            <td> <?php  echo $ds->DATA_REGISTO ?> </td>
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