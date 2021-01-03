<!------ Include the above in your HEAD tag ---------->

<!--
User Profile Sidebar by @keenthemes
A component of Metronic Theme - #1 Selling Bootstrap 3 Admin Theme in Themeforest: http://j.mp/metronictheme
Licensed under MIT
-->
<div class="container">
    <div class="row profile">
		<div class="col-md-3">
			<div class="profile-sidebar">
				<!-- SIDEBAR USERPIC -->
				<div class="profile-userpic">
					<img src="http://keenthemes.com/preview/metronic/theme/assets/admin/pages/media/profile/profile_user.jpg" class="img-responsive" alt="">
				</div>
				<!-- END SIDEBAR USERPIC -->
				<!-- SIDEBAR USER TITLE -->
				<?php  foreach($dados as $ds):?> 
				<div class="profile-usertitle">
					<div class="profile-usertitle-name">
						Nome:  <?php echo $ds->NOME?>
					</div>
					<div class="profile-usertitle-job">
					ID:<?php echo $ds->ID?>
					</div>
				</div>
                <hr>
				<!-- END SIDEBAR USER TITLE -->
				<!-- SIDEBAR BUTTONS -->
				<!-- END SIDEBAR BUTTONS -->
				<!-- SIDEBAR MENU -->
				<div class="profile-usermenu">
					<ul >
                    <li >
							Localização:<?php echo $ds->MORADA?> <br>
						</li>
						<li>
						    Telefone:<?php echo $ds->TELEFONE?> <br>
						</li>
						<li>
                            Email:<?php echo $ds->EMAIL?> <br>
						</li> 
						<li>
							NIF:<?php echo $ds->NIF?> <br>
						</li>
                        <li>
						    Data Registo:<?php echo $ds->DATA_REGISTO?> <br>
						</li>
                        <li>
						    Estado Civil:<?php echo $ds->ESTADOCIVIL?> <br>
						</li>
                        <li>
						    Gênero:<?php echo $ds->GENERO?> <br>
						</li>
                        <li>
						    Animais:<?php echo $ds->ANIMAIS?> <br>
						</li>
                        <li>
						  Cidadão:<?php echo $ds->CARTAOCIDADAO?> <br>
						</li>
					</ul>
				</div>
				
				<!-- END MENU -->
			</div>
            <hr>
		</div>
       <div class="botoes col-md-3"> </div>
		<div class="botoes col-md-6">
        <div class="no-results">
            <div class="vertical-align">
            <!--
            <a class="w-25 btn  btn-social btn-success" data-toggle="modal">
        <i class="fa fa-bitbucket"></i> FIDELIZAÇÕES
      </a>
      <a class="w-25 btn btn-social btn-success" data-toggle="modal">
        <i class="fa fa-dropbox"></i> APAGAR CONTA
      </a>
      <a class="w-25 btn  btn-social btn-success" data-toggle="modal">
        <i class="fa fa-dropbox"></i> VER TRANSAÇÕES
      </a>
      <a class="w-25 btn  btn-social btn-success" data-toggle="modal">
        <i class="fa fa-dropbox"></i> NOTIFICAR CLIENTES
      </a>-->
      
            <ul class="md-9">
        <li class="mr-3"><a href="<?php echo site_url('/Admin_ctl/List_FIDEL_CLI/'.$ds->ID) ?>"> <button class="btn btn-block btn-lg btn-success"  >FIDELIZAÇÕES </button></a>  </li> 
        <li class="mr-3"> <a  href="<?php echo site_url('/Admin_ctl/List_TRANS_CLI/'.$ds->ID) ?>"><button class="btn btn-block btn-lg btn-success"  >TRANSAÇÕES </button> </a> </li>           
        <li class="mr-3"> <button  id="apagar" class=" btn btn-block btn-lg btn-success"   > APAGAR CONTA </button>  </li> 
        <li class="mr-3"> <button class=" btn btn-block btn-lg btn-success" data-toggle="modal" data-target="#passchange"> NOTIFICAR CLIENTE </button>  </li> 
            </ul>
            </div>
        </div>
        <?php endforeach;?>
    </div>

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
    <script type="text/javascript">
        $(document).ready(function(){
            $('#apagar').click(function(){
              //  var id = $(this).attr("NOME");
                if (confirm("Tem a certeza que quer eliminar esta conta?")) {
                        window.location ="<?php echo site_url('/Admin_ctl/delete_cli/'.$ds->ID)  ?>";
                }else{
                        return false;
                }
            })
        });

        $(document).ready(function(){
        $('.pass_show').append('<span class="ptxt">Show</span>');  
        });
  

        $(document).on('click','.pass_show .ptxt', function(){ 

        $(this).text($(this).text() == "Show" ? "Hide" : "Show"); 

        $(this).prev().attr('type', function(index, attr){return attr == 'password' ? 'text' : 'password'; }); 

});  
    </script> 	
	</div>
</div>

