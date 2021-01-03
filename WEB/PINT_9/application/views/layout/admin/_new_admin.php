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
                    <label for="name">Nome</label>
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
                    <label for="name">Data de Nascimento</label>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <div class="input-group mt-2 mb-2 mr-sm-2 mb-sm-0">
                            <div class="input-group-addon" style="width: 2.6rem"><i class="far fa-calendar-alt"></i></div>
                            <input type="text" name="nascimento" class="form-control" id="nascimento"
                                   placeholder="dd/mm/ANO">
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
                                   id="password" placeholder="Password">
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
                <div class="col-md-5"></div>
                <div class="col-md-6">
                    <button style="color: black; background:orange; border:none; line-height:normal;" type="submit" class="btn btn-success" id="registo" name="registo"><i class="fa fa-user-plus"></i> Registar</button>
                </div>
            </div>
        </form>
    </div>
