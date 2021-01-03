  <!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="<?=base_url('assets/CSS/Listagem.css');?>">
    <link rel="stylesheet" href="<?=base_url('assets/CSS/test1.css');?>">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css" integrity="sha384-oS3vJWv+0UjzBfQzYUhtDYW+Pj2yciDJxpsK1OYPAYjqT085Qq/1cq5FLXAZQ7Ay" crossorigin="anonymous">
    <link rel="icon" href="<?=base_url('assets/Imagens/icon.png');?>">


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
  </style>
  <body>
    <nav class="navbar navbar-expand-md navbar-light" style="background-color:#E25622;">
        <a class="navbar-brand" href="<?=base_url('index.php/auth/login');?>" style="color:white;">Bizz Bizz</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
              
            <div class="collapse navbar-collapse" id="navbarCollapse">
                <ul class="navbar-nav ml-auto" style="margin-right:15%;">
                    <li class="nav-item" style="margin-right:7%;">
                        <button type="button" class="btn btn-dark btn-lg" style="background-color:#E25622; border:none;"
                        data-toggle="modal" data-target="#myModal">Login</button>
                    </li>
                        <a href="<?=base_url('index.php/auth/register');?>"class="btn btn-dark btn-lg" style="background-color:#E25622; border:none;">Registo</a>
                </ul>
            </div>
    </nav>

    <!-- Modal -->
    <div id="myModal" class="modal fade">
        <div class="modal-dialog modal-login">
        <?php if (isset($_SESSION["error"])) { ?>
            <div class="alert alert-danger"> <?php echo $_SESSION['error'];?> </div>
        <?php    
        }
        ?>
        <?php if (isset($_SESSION["forgotpassword"])) { ?>
            <div class="alert alert-success"> <?php echo $_SESSION['forgotpassword'];?> </div>
        <?php    
        }
        ?>
        <?php echo validation_errors('<div class="alert alert-danger">', '</div>'); ?>
            <div class="modal-content">
                <div class="modal-header">              
                    <h4 class="modal-title">Login</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                </div>
                <div class="modal-body">
                    <form action="<?= base_url('index.php/auth/login')?>" method="post">
                        <div class="form-group">
                            <i class="fa fa-user"></i>
                            <input type="text" class="form-control" placeholder="Email" name="email" id="email" required="required">
                        </div>
                        <div class="form-group">
                            <i class="fa fa-lock"></i>
                            <input type="password" class="form-control" placeholder="Password" name="password" id="password" required="required">
                        </div>
                        <div class="form-group">
                            <input type="submit" class="btn btn-primary btn-block btn-lg" name="login" value="Login">
                        </div>
                    </form>             
                        
                </div>
                <div class="modal-footer">
                    <a href="<?= base_url('index.php/auth/ForgotPass')?>">Esqueceu-se da Password?</a>
                </div>
            </div>
        </div>
    </div> 
    <!-- Fim Modal -->
    
   <div class="container mt-5 pt-5">
        <?php if (isset($_SESSION["enviado"])) { ?>
            <div class="alert alert-success"> <?php echo $_SESSION['enviado'];?> </div>
        <?php    
        }
        ?>
        <?php if (isset($_SESSION["nãoenviado"])) { ?>
            <div class="alert alert-danger"> <?php echo $_SESSION['nãoenviado'];?> </div>
        <?php    
        }
        ?>
        <?php if (isset($_SESSION["error_message"])) { ?>
            <div class="alert alert-danger"> <?php echo $_SESSION['error_message'];?> </div>
        <?php    
        }
        ?>
        <form class="form-horizontal" method="POST" action="<?= base_url('index.php/auth/reset_link')?>">
            <div class="row">
                <div class="col-md-3"></div>
                <div class="col-md-6">
                    <h4 class="text-center">Escreva o seu E-mail para ser enviado um link para repor a sua Palavra-Passe</h4>
                    <hr>
                </div>
            </div>
            <div class="row mt-3">
                <div class="col-md-3 pt-1 field-label-responsive text-right">
                    <label for="Email">Email:</label>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <input type="text" name="email" class="form-control"
                                    id="email" placeholder="Email">
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-5"></div>
                <div class="col-md-6">
                    <button style="color: black; background:orange; border:none; line-height:normal;" type="submit" class="btn btn-success" id="send_email" name="send_email"><i class="fas fa-envelope pr-1"></i>Enviar E-mail </button>
                </div>
            </div>
        </form>
    </div>

    <footer class="page-footer fixed-bottom font-small bg-light">

        <!-- Footer Elements -->
        <div class="container pt-4">
    
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
                      <i  style="padding: 20px;"  class="fab fa-instagram"> </i>
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
      <!-- Footer -->

</body>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</html>
