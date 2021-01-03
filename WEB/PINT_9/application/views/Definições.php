<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="<?=base_url('assets/CSS/botoes.css');?>">
    <link rel="stylesheet" href="<?=base_url('assets/CSS/defs.css');?>">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css" integrity="sha384-oS3vJWv+0UjzBfQzYUhtDYW+Pj2yciDJxpsK1OYPAYjqT085Qq/1cq5FLXAZQ7Ay" crossorigin="anonymous">
    <link rel="stylesheet" href="http://cdn.datatables.net/1.10.13/css/jquery.dataTables.min.css">
    <link href="https://cdn.rawgit.com/atatanasov/gijgo/master/dist/combined/css/gijgo.min.css" rel="stylesheet" type="text/css" />
    <link rel="icon" href="<?=base_url('assets/Imagens/icon.png');?>">


    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <title>BIZZ BIZZ</title>
  </head>
  <style type="text/css">

    .dropdown-menu{
            background-color: #E25622;
        }
    .dropdownthings{
        color: white;
      }
    .dropdownthings:hover{
        color: #283352 ;
        text-decoration: none;
        
      }
  </style> 
  <body>
    <nav id="nav" class="navbar navbar-expand-md navbar-dark" style="background-color:#E25622;">
    <div class="d-flex order-0">
        <a class="navbar-brand mr-1" href="<?=base_url('index.php/User/profile');?>">Bizz Bizz</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsingNavbar">
            <span class="navbar-toggler-icon"></span>
        </button>
    </div>
    <div class="navbar-collapse collapse justify-content-center order-1" id="collapsingNavbar">
        <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link text-nowrap <?php if($this->uri->segment(2)=="profile"){echo "active";}?>" href="<?=base_url('index.php/user/profile');?>">Home <span class="sr-only"></span></a>
            </li>
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle <?php if($this->uri->segment(2)=="camp" or $this->uri->segment(2)=="card"){echo "active";}?>" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" >
                Criar
                </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                    <a class="dropdown-item dropdownthings" href="<?=base_url('index.php/Campanha_ctl/camp');?>">Campanha</a>
                    <a class="dropdown-item dropdownthings" href="<?=base_url('index.php/Cartao_ctl/card');?>">Cartão</a>
                </div>
            </li>
            <li class="nav-item">
                <a class="nav-link text-nowrap  <?php if($this->uri->segment(2)=="load_clientes"){echo "active";}?>" href="<?=base_url('index.php/user/load_clientes');?>">Meus Clientes</a>
            </li>
        </ul>
    </div>
    <div class="order-2">
    <a href="<?=base_url('index.php/user/loademp_profile');?>"class="nav-item medium mt-1 w-50 text-right order-md-last text-white"><?php echo $_SESSION['nomeemp'];?></a>
    <a href="<?=base_url('index.php/user/definicoes');?>" class="fas fa-cog nav-item mt-1 ml-3 text-right order-md-last text-white"></a>
    <a href="<?php echo base_url(); ?>index.php/auth/logout" class="fas fa-sign-out-alt nav-item mt-1 ml-3 text-right order-md-last text-white"></a>
</div>
</nav>
    <div class="botoes">
        <div class="no-results">
            <div class="vertical-align">
                <h3 class="mb-5">Definições</h3>
            <ul class="mr-5">
        <li class="mr-3"> <button class="w-25 btn btn-lg btn-success" data-toggle="modal" data-target="#email"> Alterar E-mail </button> </li>           
        <li class="mr-3"> <button class="w-25 btn btn-lg btn-success" data-toggle="modal" data-target="#passchange"> Alterar Password </button> </li> 
        <li class="mr-3"> <button id="apagar"class="w-25 btn btn-lg btn-success"> Apagar Conta </button>
        </li>
            </ul>
            </div>
        </div>
    </div>
    <?php if (isset($_SESSION["bem"])) { ?>
            <div class="col-12 text-center alert alert-success"> <?php echo $_SESSION['bem'];?> </div>
        <?php    
        }
        ?>
    <?php if (isset($_SESSION["erro"])) { ?>
            <div class="col-12 text-center alert alert-danger"> <?php echo $_SESSION['erro'];?> </div>
        <?php    
        }
        ?>
    <?php if (isset($_SESSION["erro2"])) { ?>
            <div class="col-12 text-center alert alert-danger"> <?php echo $_SESSION['erro2'];?> </div>
        <?php    
        }
        ?>
    <?php if (isset($_SESSION["bem2"])) { ?>
            <div class="col-12 text-center alert alert-success"> <?php echo $_SESSION['bem2'];?> </div>
        <?php    
        }
        ?>
    <?php if (isset($_SESSION["erro3"])) { ?>
            <div class="col-12 text-center alert alert-danger"> <?php echo $_SESSION['erro3'];?> </div>
        <?php    
        }
        ?>
    <?php if (isset($_SESSION["erro4"])) { ?>
            <div class="col-12 text-center alert alert-danger"> <?php echo $_SESSION['erro4'];?> </div>
        <?php    
        }
        ?>
    <?php if (isset($_SESSION["erro5"])) { ?>
            <div class="col-12 text-center alert alert-danger"> <?php echo $_SESSION['erro5'];?> </div>
        <?php    
        }
        ?>
    <?php if (isset($_SESSION["erro6"])) { ?>
            <div class="col-12 text-center alert alert-danger"> <?php echo $_SESSION['erro4'];?> </div>
        <?php    
        }
        ?>
    <?php if (isset($_SESSION["erro7"])) { ?>
            <div class="col-12 text-center alert alert-danger"> <?php echo $_SESSION['erro5'];?> </div>
        <?php    
        }
        ?>
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
                <label>Password Atual</label>
                <div class="form-group pass_show"> 
                    <input type="password" class="form-control" name="oldpass" placeholder="Password Atual"> 
                </div> 
               <label>Nova Password</label>
                <div class="form-group pass_show"> 
                    <input type="password" class="form-control" name="newpass" placeholder="Nova Password"> 
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
<div>
<div class="modal fade" id="email" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-center">
        <div class="modal-dialog .modal-align-center">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="myModalLabel">Alterar E-mail</h4>
                    <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span><span class="sr-only">Fechar</span></button>
                 </div>
                <div class="modal-body">
                    <form action="<?php echo base_url('index.php/user/updateemail');?>" method="POST">
                        <label>E-mail Atual</label>
                            <div class="form-group pass_show"> 
                                <input type="text" class="form-control" name="oldemail" placeholder="E-mail Atual"> 
                            </div> 
                        <label>Novo E-mail</label>
                            <div class="form-group pass_show"> 
                                <input type="text" class="form-control" name="newemail" placeholder="Novo E-mail"> 
                            </div> 
                        <label>Confirmar E-mail</label>
                            <div class="form-group pass_show"> 
                                <input type="text" class="form-control" name="newemail2" placeholder="Confirmar E-mail"> 
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

<footer class="page-footer font-small bg-light">

        <!-- Footer Elements -->
        <div class="container pt-5">
    
          <!-- Social buttons -->
          <ul class="list-unstyled list-inline text-center">
            <li class="list-inline-item">
              <a href="https://www.facebook.com/Bizdirect.pt/" class="btn-floating btn-fb mx-1">
                <i style="padding: 20px;" class="fab fa-facebook-f"> </i>
              </a>
            </li>
            <li class="list-inline-item">
              <a href="https://twitter.com/bizdirect?lang=en&fbclid=IwAR1QeNpkgE32-byqi361uwP-fLXlpEQAL9_4jBVlJp_tlQvMqEJL3iOqH9w" class="btn-floating btn-tw mx-1">
                <i  style="padding: 20px;" class="fab fa-twitter"> </i>
              </a>
            </li>
            <li class="list-inline-item">
                    <a href="https://www.youtube.com/channel/UCX7Es00p7C6fXGAxVY4p-4g" class="btn-floating btn-gplus mx-1">
                      <i style="padding: 20px"; class="fab fa-youtube"></i>
                    </a>
                  </li>
                  <li class="list-inline-item">
                    <a href="https://www.linkedin.com/company/bizdirect?fbclid=IwAR0wOZ0QI5Lmz-qfx26yV8ihYv6XlAME26VCPSq0ioxeu43eySBUXYHfdKQ" class="btn-floating btn-li mx-1">
                      <i  style="padding: 20px;" class="fab fa-linkedin-in"> </i>
                    </a>
                  </li>
                  <li class="list-inline-item">
                    <a href="https://www.instagram.com/_bizdirect/?fbclid=IwAR2_NBhxErjKSim0huqm5KoMfsAgBAH35TprtSuPdZ5n25wPue9SpSqYpAA" class="btn-floating btn-dribbble mx-1">
                      <i  style="padding: 20px;" class="fab fa-instagram"> </i>
                    </a>
                  </li>
          </ul>
          <!-- Social buttons -->
    
        </div>
        <!-- Footer Elements -->
    
        <!-- Copyright -->
        <div class="footer-copyright text-center py-3">© 2019 Copyright:
          <a href="https://www.bizdirect.pt/en/"> Bizdirect.pt</a>
        </div>
        <!-- Copyright -->
    
      </footer>
      
    
</body>

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"> </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"> </script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"> </script>
    <script src="https://cdn.datatables.net/1.10.13/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.rawgit.com/atatanasov/gijgo/master/dist/combined/js/gijgo.min.js" type="text/javascript"></script>

    <script type="text/javascript">
        $(document).ready(function(){
            $('#apagar').click(function(){
              //  var id = $(this).attr("NOME");
                if (confirm("Tem a Certeza que deseja apagar esta conta?")) {
                        window.location ="<?php echo base_url(); ?>index.php/user/delete";
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

</html>