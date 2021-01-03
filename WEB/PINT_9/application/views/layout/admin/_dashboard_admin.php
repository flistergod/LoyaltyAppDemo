

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
          <a href="<?= base_url('index.php/Admin_ctl/load_campanhas')?>" class="btn btn-danger">Consultar Campanhas</a>
        </div>
      </div>
    </div>
   <div class="col-12 col-sm-6 col-lg-4 mr-auto">
      <div class="card">
        <div class="card-header">
          Empresas
        </div>
        <div class="card-body">
          <?php foreach ($results['empresas'] as $card) {
          //foreach ($campanhas as $camp) { ?>
          <h4 class="card-title">Empresas</h4>
          <p class="card-text">Tem <?php echo $card->empresas; ?> Empresas registadas. </p>
          <?php }
          //} ?>
          <a href="<?= base_url('index.php/Admin_ctl/load_empresas')?>" class="btn btn-danger">Ver</a>
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
          <h4 class="card-title">Clientes Registados</h4>
          <p class="card-text">Neste momento existem <?php echo $cli->Num; ?> cliente(s) registados. </p>
          <?php }
          //} ?>
          <a href="<?= base_url('index.php/Admin_ctl/load_clientes')?>" class="btn btn-danger">Mais Informações</a>
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
        <div class="front card-block" style="height: 89px; position:absolute;">
          <h4 class="card-title text-center">Ultima Semana</h4>
          <p class="card-text text-center">Veja Quantos Utilizadores se registaram no site na última semana</p>
        </div>
        <div class="back card-block" style="height: 89px;">
            <h4 class="pt-3"> Ganhou <?php echo $week->lastweek; ?> Utilizadores na última semana. </h4>  
        </div>
      </div>
    </div>
    <div class="col-12 col-md-4 card-container">
      <div class="card card-flip bg-light text-center pt-2 pb-3">
        <div class="front card-block" style="height: 89px; position:absolute;">
          <h4 class="card-title text-center">Ultimo Mês</h4>
          <p class="card-text text-center">Veja Quantos Utilizadores se registaram no site no último mês</p>
        </div>
        <div class="back card-block" style="height: 89px;">
            <h4 class="pt-3"> Ganhou <?php echo $month->lastmonth; ?> Utilizadores no último mês. </h4> 
        </div>
      </div>
    </div>
    <div class="col-12 col-md-4 card-container">
      <div class="card card-flip bg-light text-center pt-2 pb-3">
        <div class="front card-block" style="height: 89px; position:absolute;">
          <!-- To add FontAwesome Icons use Unicode characters and to set size use font-size instead of fa-*x because when calculating the height (see js), the size of the icon is not calculated if using classes -->
          <!--<span class="card-img-top fa" style="font-size: 4em">&#xf118;</span>-->
          <h4 class="card-title">Ultimo Ano</h4>
          <p class="card-text">Veja Quantos Utilizadores se registaram no site no último ano</p>
        </div>
        <div class="back card-block" style="height: 89px;">
          <h4 class="pt-3"> Ganhou <?php echo $year->lastyear; ?> Utilizadores no último ano. </h4>
        </div>
      </div>
    </div>
  <?php }
}
}?>
  </div>
</div>