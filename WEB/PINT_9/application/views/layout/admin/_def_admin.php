<div class="botoes">
        <div class="no-results">
            <div class="vertical-align">
                <h3 class="mb-5">Definições</h3>
            <ul class="mr-5">
        <li class="mr-3"> <a class="w-25 btn btn-lg btn-success" href="<?php echo site_url('/Admin_ctl/AdAdmin/') ?>"> Adicionar Administrador </a> </li>           
        <li class="mr-3"> <button class="w-25 btn btn-lg btn-success" data-toggle="modal" data-target="#passchange"> Alterar Password </button> </li> 
        <li class="mr-3"> <button id="apagar"class="w-25 btn btn-lg btn-success"> Apagar Conta </button>
        </li>
            </ul>
            </div>
        </div>
    </div>
<!-- Modal -->
<div>
<div class="modal fade" id="passchange" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-center">
        <div class="modal-dialog .modal-align-center">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="myModalLabel">Alterar Password</h4>
                    <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span><span class="sr-only">Fechar</span>

                    </button>
                     

                </div>
        <div class="modal-body">
            <form action="<?php echo base_url('index.php/user/updatepw');?>" method="POST">
                <label>Password Atual </label>
                <div class="form-group pass_show"> 
                    <input type="password" class="form-control" name="oldpass" placeholder=" Password Atual"> 
                </div> 
               <label>Nova Password</label>
                <div class="form-group pass_show"> 
                    <input type="password" class="form-control" name="newpass" placeholder="Novo Password"> 
                </div> 
               <label>Confirmar Password</label>
                <div class="form-group pass_show"> 
                    <input type="password" class="form-control" name="newpass2" placeholder="Confirmar Password"> 
                </div> 
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Fechar</button>
                    <input type="submit" value="Guardar Alterações" class="btn btn-primary">
            </form>
            </div>
        </div>
    </div>
</div>
</div>
    <!-- Fim Modal -->
    <!-- Modal Email -->
<!--<div>
<div class="modal fade" id="email" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-center">
        <div class="modal-dialog .modal-align-center">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="myModalLabel">Alterar E-mail</h4>
                    <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span><span class="sr-only">Close</span></button>
                 </div>
                <div class="modal-body">
                    <form action="<?php echo base_url('index.php/user/updateemail');?>" method="POST">
                        <label>Current E-mail</label>
                            <div class="form-group pass_show"> 
                                <input type="password" class="form-control" name="oldemail" placeholder="Current Password"> 
                            </div> 
                        <label>New E-mail</label>
                            <div class="form-group pass_show"> 
                                <input type="password" class="form-control" name="newemail" placeholder="New Password"> 
                            </div> 
                        <label>Confirm E-mail</label>
                            <div class="form-group pass_show"> 
                                <input type="password" class="form-control" name="newemail2" placeholder="Confirm Password"> 
                            </div> 
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <input type="submit" value="Save changes" class="btn btn-primary">
                    </form>
                </div>
        </div>
    </div>
</div>
</div>-->
<!-- Fim Modal -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
    <script type="text/javascript">
        $(document).ready(function(){
            $('#apagar').click(function(){
              //  var id = $(this).attr("NOME");
                if (confirm("Tem a certeza que quer eliminar esta conta?")) {
                        window.location ="<?php echo base_url(); ?>index.php/Admin_ctl/delete_admin";
                }else{
                        return false;
                }
            })
        });

        $(document).ready(function(){
        $('.pass_show').append('<span class="ptxt">Mostrar</span>');  
        });
  

        $(document).on('click','.pass_show .ptxt', function(){ 

        $(this).text($(this).text() == "Mostrar" ? "Esconder" : "Mostrar"); 

        $(this).prev().attr('type', function(index, attr){return attr == 'password' ? 'text' : 'password'; }); 

});  
    </script>