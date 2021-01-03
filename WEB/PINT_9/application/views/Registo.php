<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="<?=base_url('assets/CSS/test1.css');?>">
    <link rel="stylesheet" href="<?=base_url('assets/CSS/registo.css');?>">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css" integrity="sha384-oS3vJWv+0UjzBfQzYUhtDYW+Pj2yciDJxpsK1OYPAYjqT085Qq/1cq5FLXAZQ7Ay" crossorigin="anonymous">
    <link rel="icon" href="<?=base_url('assets/Imagens/icon.png');?>">


    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    
    <title>BIZZ BIZZ</title>
  </head>
<body>
        <nav class="navbar navbar-expand-md navbar-light fixed-top" style="background-color:#E25622;">
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
                        </ul>
                    </div>
            </nav>
    <!--Modal Login-->
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
    <div class="container">
        <?php if (isset($_SESSION["success"])) { ?>
            <div class="alert alert-success"> <?php echo $_SESSION['success'];?> </div>
        <?php    
        }
        ?>
        <?php if (isset($_SESSION["error"])) { ?>
            <div class="alert alert-danger"> <?php echo $_SESSION['error'];?> </div>
        <?php    
        }
        ?>
        <?php echo validation_errors('<div class="alert alert-danger col-md-6 mx-auto" >', '</div>'); ?>
        <form class="form-horizontal" method="POST" action="">
            <div class="row">
                <div class="col-md-3"></div>
                <div class="col-md-6">
                    <h2 class="text-center">Registar</h2>
                    <hr>
                </div>
            </div>
            <div class="row">
                <div class="col-md-3 field-label-responsive">
                    <label for="name">Name</label>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <div class="input-group mt-2 mb-2 mr-sm-2 mb-sm-0">
                            <div class="input-group-addon" style="width: 2.6rem"><i class="fa fa-user"></i></div>
                            <input type="text" name="name" class="form-control" id="name"
                                   placeholder="John Doe">
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-3 field-label-responsive">
                    <label for="email">E-Mail</label>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <div class="input-group mt-2 mb-2 mr-sm-2 mb-sm-0">
                            <div class="input-group-addon" style="width: 2.6rem"><i class="fa fa-at"></i></div>
                            <input type="text" name="email" class="form-control" id="email"
                                   placeholder="you@example.com">
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-3 field-label-responsive">
                    <label for="password">Password</label>
                </div>
                <div class="col-md-6">
                    <div class="form-group has-danger">
                        <div class="input-group mt-2 mb-2 mr-sm-2 mb-sm-0">
                            <div class="input-group-addon" style="width: 2.6rem"><i class="fa fa-key"></i></div>
                            <input type="password" name="password" class="form-control" id="password"
                                   placeholder="Password">
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-3 field-label-responsive">
                    <label for="password">Confirmar Password</label>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <div class="input-group mt-2 mb-2 mr-sm-2 mb-sm-0">
                            <div class="input-group-addon" style="width: 2.6rem">
                                <i class="fa fa-repeat"></i>
                            </div>
                            <input type="password" name="password2" class="form-control"
                                   id="password2" placeholder="Password">
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-3 field-label-responsive">
                    <label for="Morada">Morada</label>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <div class="input-group mt-2 mb-2 mr-sm-2 mb-sm-0">
                            <div class="input-group-addon" style="width: 2.6rem">
                                <i class="fa fa-home"></i>
                            </div>
                            <input type="text" name="morada" class="form-control"
                                    id="morada" placeholder="Morada">
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-3 field-label-responsive">
                    <label for="Morada">Data de Fundação</label>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <div class="input-group mt-2 mb-2 mr-sm-2 mb-sm-0">
                            <div class="input-group-addon" style="width: 2.6rem">
                                <i class="fas fa-calendar-day"></i>
                            </div>
                            <input type="text" name="fundação" class="form-control"
                                    id="fundação" placeholder="Ex: 23/06/1997">
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-3 field-label-responsive">
                    <label for="Nif">NIF</label>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <div class="input-group mt-2 mb-2 mr-sm-2 mb-sm-0">
                            <div class="input-group-addon" style="width: 2.6rem">
                                <i class="fas fa-money-check"></i>
                            </div>
                            <input type="text" name="nif" class="form-control"
                                    id="nif" placeholder="NIF">
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-3 field-label-responsive">
                    <label for="Telefone">Telefone</label>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <div class="input-group mt-2 mb-2 mr-sm-2 mb-sm-0">
                            <div class="input-group-addon" style="width: 2.6rem">
                                <i class="fas fa-mobile-alt"></i>
                            </div>
                            <input type="text" name="telefone" class="form-control"
                                    id="telefone" placeholder="Telefone">
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-3 field-label-responsive">
                    <label for="Nome da Loja">Nome da Loja</label>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <div class="input-group mt-2 mb-2 mr-sm-2 mb-sm-0">
                            <div class="input-group-addon" style="width: 2.6rem">
                                <i class="fas fa-store-alt"></i>
                            </div>
                            <input type="text" name="loja" class="form-control"
                                    id="loja" placeholder="Nome da Loja">
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-3 field-label-responsive">
                    <label for="Nome da Loja">Descrição da Loja</label>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <div class="input-group mt-2 mb-2 mr-sm-2 mb-sm-0">
                            <div class="input-group-addon" style="width: 2.6rem">
                                <i class="fas fa-store-alt"></i>
                            </div>
                            <textarea type="text" name="descricao" class="form-control"
                                    id="descricao" placeholder="Descrição da Loja"></textarea>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-8 py-4 field-label-responsive custom-control custom-checkbox">
                  <input type="checkbox" class="custom-control-input" id="customCheck" onclick="validate()">
                  <label class="custom-control-label" for="customCheck">Li e aceito os <a class="button" data-toggle="modal" href="#exampleModalLong"> Termos e Condições de privacidade </a></label>
                </div>
            </div>
            <div class="row">
                <div class="col-md-5"></div>
                <div class="col-md-6">
                    <button style="color: black; background:orange; border:none; line-height:normal;" type="submit" class="btn btn-success" id="registo" name="registo"><i class="fa fa-user-plus"></i> Registar</button>
                </div>
            </div>
        </form>
    </div>

<!-- Modal -->
<div class="modal fade" id="exampleModalLong" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Termos e Condições de Privacidade</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        Polı́tica de Privacidade<br>
Carla Leal – Projeto Integrado 2019<br>

1. IDENTIFICAÇÃO DO RESPONSÁVEL PELO TRATAMENTO<br>
Identificação da Empresa: BizDirect<br>
NIPC: 505 046 555<br>
Sede: Lugar do Espido, Via Norte, 4470-177 Maia, Portugal<br>
Contacto Encarregado da Proteção de Dados: +351 210 100 524<br>
2. INFORMAÇÃO E CONSENTIMENTO<br>
A Lei da Proteção de Dados Pessoais (em diante “LPD”) e o Regulamento Geral de
Proteção de Dados (Regulamento (UE) 2016/679 do Parlamento Europeu e do Conselho
de 27 de abril de 2016, em diante “RGPD”) asseguram a proteção das pessoas singulares
no que diz respeito ao tratamento de dados pessoais e à livre circulação desses dados.
Nos termos legais são considerados "dados pessoais" qualquer informação, de qualquer
natureza e independentemente do respetivo suporte, incluindo a imagem, relativa a
uma pessoa singular identificada ou identificável, pelo que a proteção não abrange os
dados de pessoas coletivas.<br>
Mediante a aceitação da presente Política de Privacidade o utilizador presta o seu
consentimento informado, expresso, livre e inequívoco para que os dados pessoais
fornecidos através do site https://http://193.137.7.33/~estgv16061/PINT_10/index.php/auth/login sejam incluídos num ficheiro da
responsabilidade da BizDirect, cujo tratamento nos termos da LPD e do RGPD cumpre as
medidas de segurança técnicas e organizativas adequadas.<br>
 Os dados presentes nesta base são unicamente os dados prestados pelos próprios na
altura do seu registo, sendo recolhidos e processados automaticamente, nos termos do
Regulamento Geral de Proteção de Dados.<br>
Em caso algum será solicitada informação sobre convicções filosóficas ou políticas,
filiação partidária ou sindical, fé religiosa, vida privada e origem racial ou étnica bem
como os dados relativos à saúde e à vida sexual, incluindo os dados genéticos.
Em caso algum levaremos a cabo qualquer das seguintes atividades com os dados
pessoais que nos sejam facultados através deste site:<br>
 Ceder a outras pessoas ou outras entidades, sem o consentimento prévio do
titular dos dados;<br>
 Transferir para fora do Espaço Económico Europeu (EEE), sem o consentimento
prévio do titular dos dados. <br>
Polı́tica de Privacidade<br>
Carla Leal – Projeto Integrado 2019<br>

3. FINALIDADES DO TRATAMENTO DE DADOS PESSOAIS<br>
Os dados pessoais que tratamos através desta página serão unicamente utilizados para
as seguintes finalidades:<br>
 (i) Processamento de encomendas;<br>
 (ii) Comunicação com clientes e esclarecimento de dúvidas;<br>
 (iii) Processamento de pedidos de informação; <br>
 (iv) Processamento de reclamações;<br>
 (viii) Prevenção e combate à fraude;<br>
 (ix) Solicitação de comentários a produtos ou serviços adquiridos;<br>
 (x) Realização de inquéritos de satisfação.<br>
 (xi) Comunicações de marketing direto (caso tenha consentido no tratamento
dos seus dados pessoais para esta finalidade);<br>
A BizDirect garante a confidencialidade de todos os dados fornecidos pelos seus
clientes. Não obstante a BizDirect proceder à recolha e ao tratamento de dados de
forma segura e que impede a sua perda ou manipulação, utilizando as técnicas mais
aperfeiçoadas para o efeito, informamos que a recolha em rede aberta permite a
circulação dos dados pessoais sem condições de segurança, correndo o risco de ser
vistos e utilizados por terceiros não autorizados.<br>

4. MEDIDAS DE SEGURANÇA<br>
A BizDirect declara que implementou e continuará a implementar as medidas de
segurança de natureza técnica e organizativa necessárias para garantir a segurança dos
dados de carácter pessoal que lhe sejam fornecidos visando evitar a sua alteração,
perda, tratamento e/ou acesso não autorizado, tendo em conta o estado atual da
tecnologia, a natureza dos dados armazenados e os riscos a que estão expostos.
A BizDirect garante a confidencialidade de todos os dados fornecidos pelos
seus clientes quer no registo, quer no processo de compra/encomenda de produtos ou
serviços. A recolha e tratamento de dados realiza-se de forma segura e que impede a
sua perda ou manipulação. Todos os dados serão inseridos num Servidor Seguro que os
encripta. O utilizador poderá verificar que o seu browser é seguro se o símbolo do
cadeado aparecer ou se o endereço começar com https em vez de http. <br>
Polı́tica de Privacidade<br>
Carla Leal – Projeto Integrado 2019<br>
Os dados pessoais são tratados com o nível de proteção legalmente exigível para
garantir a segurança dos mesmos e evitar a sua alteração, perda, tratamento ou acesso
não autorizado, tendo em conta o estado da tecnologia, sendo o utilizador consciente e
aceitando que as medidas de segurança em Internet não são inexpugnáveis.<br>

5. EXERCÍCIO DOS DIREITOS<br>
De acordo com as disposições da LDPD e do RGPD, o utilizador pode exercer a todo o
tempo os seus direitos de acesso, retificação, apagamento, limitação, oposição e
portabilidade, através de solicitação por qualquer dos seguintes meios:<br>
APP e WEB<br>
6. AUTORIDADE DE CONTROLO<br>
Nos termos legais, o titular dos dados tem o direito de apresentar uma reclamação em
matéria de proteção de dados pessoais à autoridade de controlo competente, a
Comissão Nacional de Proteção de Dados (CNPD). <br>
Polı́tica de Privacidade<br>
Carla Leal – Projeto Integrado 2019
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
      </div>
    </div>
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

<!-- Footer -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>  
    <script type="text/javascript">
/*
         function validate() {
            var x = document.getElementById('registo');
        if (document.getElementById('customCheck').checked ) {
            x.disabled="false";
        } else {
            x.disabled="true";
        }
    }*/
    /*o código abaixo serve para o botão registar só se poder clicar quando se aceita os termos e condições*/
    window.onload = function () {
    var input = document.querySelector('input[type=checkbox]');
    var x = document.getElementById('registo');
    function check() {
        if (input.checked) {
            x.disabled=false;
        } else {
            x.disabled=true;//alert("You didn't check it.");
        }
    }
    input.onchange = check;
    check();
}
    </script>

</html>