<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="<?=base_url('assets/CSS/Listagem.css');?>">
    <link rel="stylesheet" href="<?=base_url('assets/CSS/test1.css');?>">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css" integrity="sha384-oS3vJWv+0UjzBfQzYUhtDYW+Pj2yciDJxpsK1OYPAYjqT085Qq/1cq5FLXAZQ7Ay" crossorigin="anonymous">
    <link rel="stylesheet" href="http://cdn.datatables.net/1.10.13/css/jquery.dataTables.min.css">
    <link href="https://cdn.rawgit.com/atatanasov/gijgo/master/dist/combined/css/gijgo.min.css" rel="stylesheet" type="text/css" />
    <link rel="icon" href="<?=base_url('assets/Imagens/icon.png');?>">


    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <title>BIZZ BIZZ</title>
  </head>
  <style type="text/css">
    .btn-success:hover {
        background:gold !important;
        }
    .btn-success{
        background: orange !important;
        }

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
    <a href="<?=base_url('index.php/user/loademp_profile');?>"class="nav-item medium mt-1 w-50 text-right order-md-last text-white"><!-- apresento o nome da empresa --><?php echo $_SESSION['nomeemp'];?></a>
    <a href="<?=base_url('index.php/user/definicoes');?>" class="fas fa-cog nav-item mt-1 ml-3 text-right order-md-last text-white"></a>
    <a href="<?php echo base_url(); ?>index.php/auth/logout" class="fas fa-sign-out-alt nav-item mt-1 ml-3 text-right order-md-last text-white"></a>
</div>
</nav>
<div class="row mr-0">
    <div class="col-4 mt-5 ml-3">
        <p class="frase"> Criar Campanha </p>
    </div>
    <div class="col-7 mt-5 ml-3">
      <a href="<?= base_url('index.php/Campanha_ctl/my_camp')?>"><button type="button" class="btn btn-danger float-right mt-2"> Minhas Campanhas</button></a>
    </div>
</div>
    <div class="container mb-5">
        <?php echo validation_errors('<div class="alert alert-danger col-md-6 mx-auto" >', '</div>'); ?>
         <form class="form-horizontal" method="POST" action=""> 
            <div class="row mt-5 ml-5">
                 <div class="col-md-1 field-label-responsive">
                    <label for="name">Desde:</label>
                </div>
                <div class="col-md-4">
                    <input type='text' name="inicio"  id="date">
                </div>
                <div class="col-md-1 field-label-responsive">
                    <label for="name">Até:</label>
                </div>
                <div class="col-md-4">
                    <input type='text' name="fim"  id="date2">
                </div>
            </div>
            <div class="row mt-4 ml-5">
                <div class="col-md-1 field-label-responsive">
                    <label for="Desconto">Desconto</label>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                            <input type="text" name="desconto" class="form-control"
                                    id="desconto" placeholder="Desconto">
                    </div>
                </div>
                <div class="col-md-1 field-label-responsive">
                    <label for="Produtos">Produtos</label>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                            <input type="text" name="produtos" class="form-control"
                                    id="produtos" placeholder="Produtos">
                    </div>
                </div>
            </div>
            <div class="row mt-2 ml-5">
                <div class="col-md-1 field-label-responsive">
                    <label for="Desconto">Titulo da Campanha</label>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                            <input type="text" name="titulo" class="form-control"
                                    id="titulo" placeholder="Titulo da Campanha">
                    </div>
                </div>
                <div class="col-md-1 field-label-responsive">
                    <label for="Localidade">Localidade</label>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                            <input type="text" name="localidade" class="form-control"
                                    id="localidade" placeholder="Localidade">
                    </div>
                </div>
            </div>
            <div class="row mt-2 ml-5">
                <div class="col-md-1 field-label-responsive">
                    <label for="Desconto">Género</label>
                </div>
                <div class="col-md-4">
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="genero" id="genero" value="Homem">
                        <label class="form-check-label" for="genero">Homem</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="genero" id="genero2" value="Mulher">
                        <label class="form-check-label" for="genero2">Mulher</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="genero" id="genero3" value="Outro">
                        <label class="form-check-label" for="genero3">Outro</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="genero" id="genero3" value="Outro">
                        <label class="form-check-label" for="genero3">Todos</label>
                    </div>
                </div>
                <div class="col-md-1 field-label-responsive">
                    <label for="Descrição">Estado Civil</label>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="estado_civil" id="estado_civil" value="Solteiro">
                            <label class="form-check-label" for="estado_civil">Solteiro/a</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="estado_civil" id="estado_civil2" value="Casado">
                            <label class="form-check-label" for="estado_civil2">Casado/a</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="estado_civil" id="estado_civil3" value="Ambos">
                            <label class="form-check-label" for="estado_civil3">Ambos</label>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row mt-2 ml-5">
                <div class="col-md-1 field-label-responsive">
                    <label for="Idade_Alvo">Idade Alvo</label>
                </div>
                <div class="col-md-4">
                   <div class="form-group">
                        <select class="form-control" id="idade" name="idade">
                            <option>18+</option>
                            <option>30+</option>
                            <option>40+</option>
                            <option>50+</option>
                            <option>60+</option>
                        </select>
                    </div>
                </div>
                <div class="col-md-1 field-label-responsive">
                    <label for="Animais">Animais</label>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="animais" id="animais" value="Sim">
                            <label class="form-check-label" for="animais">Sim</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="animais" id="animais2" value="Não">
                            <label class="form-check-label" for="animais2">Não</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="animais" id="animais3" value="Ambos">
                            <label class="form-check-label" for="animais3">Ambos</label>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row mt-5">
                <div class="col-md-5"></div>
                <div class="col-md-6">
                    <button style="color: black; border:none; line-height:normal;" type="submit" value="submit" class="btn btn-success" id="campanha" name="submit"> Criar Campanha</button>
                </div>
            </div>
        </form>
    </div>

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
        /*uso este pedaço de código para usar um datepicker nas datas de Inicio e de Fim */
        var today = new Date(new Date().getFullYear(), new Date().getMonth(), new Date().getDate());
        $(function(){
            $("#date").datepicker({
                uiLibrary: 'bootstrap4',
                format: 'dd-mm-yyyy',
                minDate: today,
                maxDate: function () {
                   return $('#date2').val();
                }
            });
            $("#date2").datepicker({
                uiLibrary: 'bootstrap4',
                format: 'dd-mm-yyyy',
                minDate: function () {
                    return $('#date').val();
                }
            });
        });
    </script>
</html>