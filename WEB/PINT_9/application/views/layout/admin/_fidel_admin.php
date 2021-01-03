<div class="container">
    <div class="row">
    <div class="col-md-12">

    <h1>Fidelizações</h1>

<table id="sid" class="table table-bordered table-striped table-hover ">
     <thead>
        <tr>
            <th>Empresa</th>
            <th>Descrição</th>
            <th>Data Fidelização</th>
            
            <th></th>
        </tr>
     </thead>
     <tbody>
      <?php  foreach($dados as $ds):?> 
        <tr>     
            <td> <?php  echo $ds->NOMEEMPRESA ?></a> </td>
            <td> <?php  echo $ds->DESCRICAO ?> </td>
            <td> <?php  echo $ds->Data_fidelização ?> </td>
            <td class="mr-3"><a href="<?php echo site_url('/Admin_ctl/delete_fidel/'.$ds->ID .'/' .$ds->EMP_ID) ?>"> <button id="apagar" onClick="return confirm('Tem a certeza?')"z*class="w-14 btn btn-md btn-danger"> <i class="far fa-trash-alt"></i> </button></a> </td>
            
        
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