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
    <a href="<?=base_url('index.php/user/loademp_profile');?>"class="nav-item medium mt-1 w-50 text-right order-md-last text-white"><?php echo $_SESSION['nomeemp'];?></a>
    <a href="<?=base_url('index.php/user/definicoes');?>" class="fas fa-cog nav-item mt-1 ml-3 text-right order-md-last text-white"></a>
    <a href="<?php echo base_url(); ?>index.php/auth/logout" class="fas fa-sign-out-alt nav-item mt-1 ml-3 text-right order-md-last text-white"></a>
</div>
</nav>
<div class="row mr-0">
    <div class="col-4 mt-5 ml-3">
        <p class="frase"> Meu Cartão </p>
    </div>
    <div class="col-7 mt-5 ml-3">
      <a href="<?= base_url('index.php/cartao_ctl/card')?>"><button type="button" class="btn btn-danger float-right mt-2"> Criar Cartão</button></a>
    </div>
</div>
<div class="table-responsive">
<table class="col-12 col-md-10 ml-auto mr-auto table table-bordered table-striped mt-5">
  <thead class="black white-text">
    <tr>
      <th scope="col">ID</th>
      <th scope="col">Titulo</th>
      <th scope="col">Produto Alvo</th>
      <th scope="col">Inicio</th>
      <th scope="col">Fim</th>
      <th scope="col">Carimbos</th>
      <th scope="col">Desconto</th>
      <th scope="col">Ações</th>
    </tr>
  </thead>
   <?php 
        if($card->num_rows()>0){
            foreach($card->result() as $row){

        ?>
  <tbody>
    <tr>
      <th scope="row"><?php echo $row->ID_CARTAO; ?></th>
      <td><?php echo $row->TITULO; ?></td>
      <td><?php echo $row->PRODUTO_ALVO; ?></td>
      <td><?php echo $row->DATA_INICIO; ?></td>
      <td><?php echo $row->DATA_FIM; ?></td>
      <td><?php echo $row->CARIMBOS; ?></td>
      <td><?php echo $row->DESCONTO; ?></td>
      <td>
            <a href="<?php echo site_url('cartao_ctl/editar_Card/'.$row->ID_CARTAO) ?>"><button type="button" class="btn btn-warning"><i class="far fa-edit"></i></button></a>
            <a href="<?php echo site_url('cartao_ctl/delete_Card/'.$row->ID_CARTAO) ?>"><button type="button" id="apagarCamp" class="btn btn-danger" onclick="return confirm('Are you Sure?')"title="Eliminar" value="Eliminar"><i class="far fa-trash-alt"></i></button></a>
        </td>
    </tr>
    <?php
            }
        }else {
         ?>
        
            <tr>
                <td colspan="8"> No data Found </td>
            </tr>
        <?php
        }
    ?>
  </tbody>
</table>
</div>

<footer class="page-footer fixed-bottom font-small bg-light">

        <!-- Footer Elements -->
        <div class="container pt-2">
    
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
</html>