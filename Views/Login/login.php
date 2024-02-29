<!doctype html>
<html lang="en">

<head>
    <title><?= $data['page_tag']; ?></title>
    <!-- Required meta tags -->
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <!-- Bootstrap CSS v5.2.1 -->
    <!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous" /> -->
    <link rel="stylesheet" type="text/css" href="<?= media();?>/css/main.css">
    <link rel="stylesheet" type="text/css" href="<?= media();?>/css/style.css">
</head>

<body>
    <section class="material-half-bg">
      <div class="cover"></div>
    </section>
    
    <section class="login-content">
        <div class="container">
            <div class="row justify-content-center align-items-center g-2">
                <div class="col-md-4"></div>

                <div class="col-md-4">
                    <br>
                    <div class="card">
                        <div class="card-header">Incio de sesion</div>
                        <div class="login-box card-body">

                            <div id="divLoading" >
                                <div>
                                    <img src="<?= media(); ?>/images/loading.svg" alt="Loading">
                                </div>    
                            </div>

                            <form action="" method="post" name="formLogin" id="formLogin" action="" autofocus>
                                Usuario: <input class="form-control" type="email" id="txtEmail" name="txtEmail">
                                <br />
                            
                                constraseña: <input class="form-control" type="password" id="txtPassword" name="txtPassword">
                                <br>
                            
                                <!-- Confirmar contraseña: <input class="form-control" type="password" name="confirmar" id=""> -->
                                <br />
                            
                                <button class="btn btn-success" type="submit">Iniciar sesion</button>

                            </form>

                        </div>
                    </div>
                </div>

                <div class="col-md-4"></div>
            </div>
        </div>
    </section>

    <script>
        const base_url = "<?= base_url(); ?>";
    </script>
    <!-- Essential javascripts for application to work-->
    <script src="<?= media(); ?>/js/jquery-3.3.1.min.js"></script>
    <script src="<?= media(); ?>/js/popper.min.js"></script>
    <script src="<?= media(); ?>/js/bootstrap.min.js"></script>
    <script src="<?= media(); ?>/js/fontawesome.js"></script>
    <script src="<?= media(); ?>/js/main.js"></script>
    <!-- The javascript plugin to display page loading on top-->
    <script src="<?= media(); ?>/js/plugins/pace.min.js"></script>
    <script type="text/javascript" src="<?= media();?>/js/plugins/sweetalert.min.js"></script>
    <script src="<?= media(); ?>/js/functions_login.js"></script>
</body>

</html>