
<nav id="nav" class="navbar navbar-expand-md navbar-dark" style="background-color:#E25622;">
    <div class="d-flex order-0">
        <a class="navbar-brand mr-1" href="#">Bizz Bizz</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsingNavbar">
            <span class="navbar-toggler-icon"></span>
        </button>
    </div>
    <div class="navbar-collapse collapse justify-content-center order-1" id="collapsingNavbar">
        <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link text-nowrap  <?php if($this->uri->segment(2)=="admin"){echo "active";}?>" href="<?php echo base_url('index.php/Admin_ctl/admin');?>">Dashboard</a>
            </li>
            <li class="nav-item">
                <a class="nav-link text-nowrap  <?php if($this->uri->segment(2)=="load_empresas"){echo "active";}?>" href="<?php echo base_url('index.php/Admin_ctl/load_empresas');?>">Empresas  </a>
            </li>
            <li class="nav-item">
                <a class="nav-link text-nowrap  <?php if($this->uri->segment(2)=="load_clientes"){echo "active";}?>" href="<?php echo base_url('index.php/Admin_ctl/load_clientes');?>"> Clientes</a>
            </li>
        </ul>
    </div>
    <div class="order-2">
    <a class="nav-item medium mt-1 w-50 text-right order-md-last text-white"><?php echo $_SESSION['username'];?></a>
    <a href="<?=base_url('index.php/Admin_ctl/definicoes');?>" class="fas fa-cog nav-item mt-1 ml-3 text-right order-md-last text-white"></a>
    <a href="<?php echo base_url('index.php/Auth/logout'); ?>" class="fas fa-sign-out-alt nav-item mt-1 ml-3 text-right order-md-last text-white"></a>
</div>
</nav>