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
      .border-right-2{
 border-right: 2px solid #E25622;
}

.card-container {
  perspective: 700px;
}
.card-flip {
  position: relative;
  width: 100%;
  transform-style: preserve-3d;
  height: auto;
  transition: all 0.5s ease-out;
  /*background: white;*/
  border: 2px solid #E25622;
}

.card-flip div {
  backface-visibility: hidden;
  transform-style: preserve-3d;
  height: 100%;
  width: 100%;
  border: none;
}

.card-flip .front {
  position: relative;
  z-index: 1;
}

.card-flip .back {
  position: relative;
  z-index: 0;
  transform: rotateY(-180deg);
}

.card-container:hover .card-flip {
  transform: rotateY(180deg);
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
                <a class="nav-link text-nowrap <?php if($this->uri->segment(2)=="profile"){echo "active";}?>" href="<?=base_url('index.php/user/profile');?>">Dashboard <span class="sr-only"></span></a>
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
<div class="container">
  <h2 class="text-center mt-4">Estatisticas Gerais</h2> 
  <div class="row mt-3">
    <div class="col-12 col-sm-6 col-lg-4 mr-auto">
      <div class="card">
        <div class="card-header">
          Campanhas
        </div>
        <div class="card-body">
          <?php foreach ($results['camp'] as $ca) {
          //foreach ($campanhas as $camp) { ?>
          <h4 class="card-title">Campanhas Ativas</h4>
          <p class="card-text">Neste momento tem <?php echo $ca->CAM; ?> Campanhas ativas. </p>
          <?php }
          //} ?>
          <a href="<?= base_url('index.php/Campanha_ctl/my_camp')?>" class="btn btn-danger">Consultar Campanhas</a>
        </div>
      </div>
    </div>
    <div class="col-12 col-sm-6 col-lg-4 mr-auto">
      <div class="card">
        <div class="card-header">
          Cartão
        </div>
        <div class="card-body">
          <?php foreach ($results['card'] as $card) {
          //foreach ($campanhas as $camp) { ?>
          <h4 class="card-title">Cartões</h4>
          <p class="card-text">Tem <?php echo $card->card; ?> Cartão ativo. </p>
          <?php }
          //} ?>
          <a href="<?= base_url('index.php/Cartao_ctl/my_card')?>" class="btn btn-danger">Ver</a>
        </div>
      </div>
    </div>
    <div class="col-12 col-sm-6 col-lg-4 ml-auto">
      <div class="card">
        <div class="card-header">
          Clientes
        </div>
        <div class="card-body">
          <?php foreach ($results['cli'] as $cli) {
          //foreach ($campanhas as $camp) { ?>
          <h4 class="card-title">Clientes Fidelizados</h4>
          <p class="card-text">Neste momento tem <?php echo $cli->Num; ?> cliente(s) fidelizados. </p>
          <?php }
          //} ?>
          <a href="<?= base_url('index.php/User/load_clientes')?>" class="btn btn-danger">Mais Informações</a>
        </div>
      </div>
    </div>
  </div>
  <div class="row mt-3">
    <div class="col-12 col-md-4">
      <div class="card">
        <div class="card-header">
          Clientes(Género)
        </div>
        <div class="card-body">
           <?php foreach ($dados['homem'] as $man) {
           foreach ($dados['mulher'] as $women) {
           foreach ($dados['outro'] as $other) { ?>
          <div class="row">
            <div class="col-4 border-right-2">
              <h5 class="text-center"> Homens </h5>
              <p class="card-text text-center"><?php echo $man->homem; ?></p>
            </div>
            <div class="col-4 border-right-2">
              <h5 class="text-center"> Mulher </h5>
              <p class="card-text text-center"><?php echo $women->mulher; ?></p>
            </div>
            <div class="col-4">
              <h5 class="text-center"> Outros </h5>
              <p class="card-text text-center"><?php echo $other->outro; ?></p>
            </div>
          </div>
        <?php } 
      } 
    }?>
        </div>
      </div>
    </div>
     <div class="col-12 col-md-8">
      <div class="card">
        <div class="card-header">
          Clientes(Idade)
        </div>
        <div class="card-body">
           <?php foreach ($idade['18+'] as $a) {
          foreach ($idade['30+'] as $b) {
          foreach ($idade['40+'] as $c) { 
          foreach ($idade['50+'] as $d) {
          foreach ($idade['60+'] as $e) {
          foreach ($idade['70+'] as $f) {?>
          <div class="row">
            <div class="col-2 border-right-2">
              <h5 class="text-center"> 18+ </h5>
              <p class="card-text text-center"><?php echo $a->eighteen; ?></p>
            </div>
            <div class="col-2 border-right-2">
              <h5 class="text-center"> 30+ </h5>
              <p class="card-text text-center"><?php echo $b->thirty; ?></p>
            </div>
            <div class="col-2 border-right-2">
              <h5 class="text-center"> 40+</h5>
              <p class="card-text text-center"><?php echo $c->forty; ?></p>
            </div>
            <div class="col-2 border-right-2">
              <h5 class="text-center"> 50+ </h5>
              <p class="card-text text-center"><?php echo $d->fifty; ?></p>
            </div>
            <div class="col-2 border-right-2">
              <h5 class="text-center"> 60+ </h5>
              <p class="card-text text-center"><?php echo $e->sixty; ?></p>
            </div>
            <div class="col-2">
              <h5 class="text-center"> 70+ </h5>
              <p class="card-text text-center"><?php echo $f->seventy; ?></p>
            </div>

          </div>
        <?php     } 
                } 
              }
            }
          }
        }?>
        </div>
      </div>
    </div>
  </div>
  <div class="row mt-3">
    <div class="col-12 col-md-12">
      <div class="card">
        <div class="card-header">
          Clientes(Estado Civil)
        </div>
        <div class="card-body">
           <?php foreach ($estado['solteiro'] as $solteiro) {
          foreach ($estado['casado'] as $casado) {
          foreach ($estado['divorciado'] as $divorciado) { 
          foreach ($estado['viuvo'] as $viuvo) {
          foreach ($estado['separado'] as $separado) {
          foreach ($estado['comprometido'] as $comprometido) {?>
          <div class="row">
            <div class="col-2 border-right-2">
              <h6 class="text-center"> Solteiro </h6>
              <p class="card-text text-center"><?php echo $solteiro->solteiro; ?></p>
            </div>
            <div class="col-2 border-right-2">
              <h6 class="text-center"> Casado </h6>
              <p class="card-text text-center"><?php echo $casado->casado; ?></p>
            </div>
            <div class="col-2 border-right-2">
              <h6 class="text-center"> Divorciado </h6>
              <p class="card-text text-center"><?php echo $divorciado->divorciado; ?></p>
            </div>
            <div class="col-2 border-right-2">
              <h6 class="text-center"> Viúvo </h6>
              <p class="card-text text-center"><?php echo $viuvo->viuvo; ?></p>
            </div>
            <div class="col-2 border-right-2">
              <h6 class="text-center"> Separado </h6>
              <p class="card-text text-center"><?php echo $separado->separado; ?></p>
            </div>
            <div class="col-2">
              <h6 class="text-center"> Comprometido </h6>
              <p class="card-text text-center"><?php echo $comprometido->comprometido; ?></p>
            </div>

          </div>
        <?php     } 
                } 
              }
            }
          }
        }?>
        </div>
      </div>
    </div>
  </div>
</div>
<div class="container mb-5">
  <h2 class="text-center mt-4">Estatisticas Clientes</h2> 
  <div class="row mt-3">
    <?php foreach ($fidelização['semana'] as $week) {
          foreach ($fidelização['mes'] as $month) {
          foreach ($fidelização['ano'] as $year) { ?>
    <div class="col-12 col-md-4 card-container">
      <div class="card card-flip bg-light text-center pt-2 pb-3">
        <div class="front card-block">
          <h4 class="card-title text-center">Ultima Semana</h4>
          <p class="card-text text-center">Veja Quantos Utilizadores se fidelizaram à sua empresa na última semana</p>
        </div>
        <div class="back card-block">
            <h4 class="pt-3"> Ganhou <?php echo $week->lastweek; ?> clientes na última semana. </h4>  
        </div>
      </div>
    </div>
    <div class="col-12 col-md-4 card-container">
      <div class="card card-flip bg-light text-center pt-2 pb-3">
        <div class="front card-block">
          <h4 class="card-title text-center">Ultimo Mês</h4>
          <p class="card-text text-center">Veja Quantos Utilizadores se fidelizaram à sua empresa no último mês</p>
        </div>
        <div class="back card-block">
            <h4 class="pt-3"> Ganhou <?php echo $month->lastmonth; ?> clientes no último mês. </h4> 
        </div>
      </div>
    </div>
    <div class="col-12 col-md-4 card-container">
      <div class="card card-flip bg-light text-center pt-2 pb-3">
        <div class="front card-block">
          <!-- To add FontAwesome Icons use Unicode characters and to set size use font-size instead of fa-*x because when calculating the height (see js), the size of the icon is not calculated if using classes -->
          <!--<span class="card-img-top fa" style="font-size: 4em">&#xf118;</span>-->
          <h4 class="card-title">Ultimo Ano</h4>
          <p class="card-text">Veja Quantos Utilizadores se fidelizaram à sua empresa no último ano</p>
        </div>
        <div class="back card-block">
          <h4 class="pt-3"> Ganhou <?php echo $year->lastyear; ?> clientes no último ano. </h4>
        </div>
      </div>
    </div>
  <?php }
}
}?>
  </div>
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
      $(document).ready(function() {
  var front = document.getElementsByClassName("front");
  var back = document.getElementsByClassName("back");

  var highest = 0;
  var absoluteSide = "";

  for (var i = 0; i < front.length; i++) {
    if (front[i].offsetHeight > back[i].offsetHeight) {
      if (front[i].offsetHeight > highest) {
        highest = front[i].offsetHeight;
        absoluteSide = ".front";
      }
    } else if (back[i].offsetHeight > highest) {
      highest = back[i].offsetHeight;
      absoluteSide = ".back";
    }
  }
  $(".front").css("height", highest);
  $(".back").css("height", highest);
  $(absoluteSide).css("position", "absolute");
});

    </script>
  
</html>