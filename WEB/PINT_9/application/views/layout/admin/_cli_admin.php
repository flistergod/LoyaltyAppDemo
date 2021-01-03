
 
    <div class="container">
    <div class="row">
    <div class="col-md-12">

    <h1>Clientes</h1>

<table id="sid" class="table table-bordered table-striped table-hover ">
     <thead>
        <tr>
            <th>Nome</th>
            <th>Email</th>
            <th>Telefone</th>
            <th>Data Nascimento</th>
            <th>Data Registo</th>
            <th></th>
        </tr>
     </thead>
     <tbody>
      <?php  foreach($dados as $ds):?> 
        <tr>     
            <td><a href="<?php echo site_url('/Admin_ctl/perfil_clientes/'.$ds->ID) ?>"> <?php  echo $ds->NOME ?></a> </td>
            <td> <?php  echo $ds->EMAIL ?> </td>
            <td> <?php  echo $ds->TELEFONE ?> </td>
            <td> <?php  echo $ds->DATANASC ?> </td>
            <td> <?php  echo $ds->DATA_REGISTO ?> </td>
            <td class="mr-3"><a href="<?php echo site_url('/Admin_ctl/delete_cli/'.$ds->ID) ?>"> <button id="apagar" onClick="return confirm('Tem a certeza?')"z*class="w-14 btn btn-md btn-danger"> <i class="far fa-trash-alt"></i> </button></a> </td>
        
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