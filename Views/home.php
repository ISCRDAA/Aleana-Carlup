<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="Aleana&Carlup">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="author" content="Angel - Roberto">
    <link rel="shortcut icon" href="<?= media(); ?>/images/icono.ico">
    <title><?= $data['page_tag']; ?></title>
    <!-- Fonts -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Dancing+Script|Raleway:500,600&display=swap">
    <!--Link para los iconos-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" />
    <!--Link para bootstrap-->
    <link rel="stylesheet" href="<?= media(); ?>/css/bootstrap.min.css">
    <!-- Materialize.css -->
    <link rel="stylesheet" href="<?= media(); ?>/css/materialize.min.css">
    <!-- CSS Estilos -->
    <link rel="stylesheet" href="<?= media(); ?>/css/stiles.css">
</head>

<body>
    <header class="mb-5"> <!-- Agrega la clase 'mb-5' al body para un margen inferior de 5 unidades (puedes ajustar el valor según sea necesario) -->
        <nav class="navbar  bg-body-tertiary fixed-top">
            <div class="container-fluid bg-body">
                <a class="mx-auto d-block" href="<?php base_url(); ?>"><img width="200px" class="mx-auto d-block" src="<?= media(); ?>/images/logo3.jpeg" alt="Imagen logo"></a>
                <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasNavbar" aria-controls="offcanvasNavbar" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasNavbar" aria-labelledby="offcanvasNavbarLabel">
                    <div class="offcanvas-header">
                        <h5 class="offcanvas-title" id="offcanvasNavbarLabel"><?= $data['page_title']; ?></h5>
                        <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
                    </div>
                    <div class="offcanvas-body">
                        <ul class="navbar-nav justify-content-end flex-grow-1 pe-3">
                            <li class="nav-item">
                                <a class="nav-link active" aria-current="page" href="<?php base_url(); ?>">Inicio</a>
                                <a class="nav-link active" aria-current="page" href="<?php base_url(); ?>login">Entrar(temporal)</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="<?php base_url(); ?>productos">Productos</a>
                            </li>
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">Dropdown</a>
                                <ul class="dropdown-menu">
                                    <li><a class="dropdown-item" href="<?php base_url(); ?>action">Action</a></li>
                                    <li><a class="dropdown-item" href="<?php base_url(); ?>otraaccion">Another action</a></li>
                                    <li>
                                        <hr class="dropdown-divider">
                                    </li>
                                    <li><a class="dropdown-item" href="<?php base_url(); ?>otramas">Something else here</a></li>
                                </ul>
                            </li>
                        </ul>
                        <form class="d-flex mt-3" role="search">
                            <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                            <button class="btn btn-outline-success" type="submit">Search</button>
                        </form>
                    </div>
                </div>
            </div>
        </nav>
    </header>

    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>

    <div class="container_AC">
        <div class="row_AC">
            <div class="col_AC s12_AC">
                <h1 class="center-align_AC titulo_AC">Titulo_Principal</h1>

                <div class="carousel center-align_AC">

                    <div class="carousel-item">
                        <h2 class="subtitulo_AC">Titulo_Prenda</h2>
                        <div class="linea-division_AC"></div>
                        <p class="sabor_AC">Modelo_Caracteristica</p>
<<<<<<< HEAD
                        <img loading="lazy" src="<?= media(); ?>/images/uploads/Modelo31frente.jpeg" alt="">
=======
                        <img src="<?= media(); ?>/images/uploads/Modelo31frente.jpeg" alt="">
>>>>>>> 45e8a8e9cd8c7cbe03b790179cd98c0c3229fc9f
                    </div>

                    <div class="carousel-item">
                        <h2 class="subtitulo_AC">Titulo_Prenda</h2>
                        <div class="linea-division_AC"></div>
                        <p class="sabor_AC">Modelo_Caracteristica</p>
                        <img loading="lazy" src="<?= media(); ?>/images/uploads/Modelo32frente2.jpeg" alt="">
                    </div>

                    <div class="carousel-item">
                        <h2 class="subtitulo_AC">Titulo_Prenda</h2>
                        <div class="linea-division_AC"></div>
                        <p class="sabor_AC">Modelo_Caracteristica</p>
                        <img loading="lazy" src="<?= media(); ?>/images/uploads/Modelo35frente.jpeg" alt="">
                    </div>

                    <div class="carousel-item">
                        <h2 class="subtitulo_AC">Titulo_Prenda</h2>
                        <div class="linea-division_AC"></div>
                        <p class="sabor_AC">Modelo_Caracteristica</p>
                        <img loading="lazy" src="<?= media(); ?>/images/uploads/Modelo95frente2.jpeg" alt="">
                    </div>

                    <div class="carousel-item">
                        <h2 class="subtitulo_AC">Titulo_Prenda</h2>
                        <div class="linea-division_AC"></div>
                        <p class="sabor_AC">Modelo_Caracteristica</p>
                        <img loading="lazy" src="<?= media(); ?>/images/uploads/Modelo201frente.jpeg" alt="">
                    </div>

                </div>

            </div>
        </div>
    </div>

    <section <?= $data['page_id']; ?> class="container">
        <h1 class="titulo_AC">Hola buenos dias</h1>
    </section>

    <br>
    <br>
    <br>
    <br>

    <footer class="bg-body-tertiary text-center">
        <!--Grid container -->
    <div class="container p-4 pb-0">
        <!-- Section: Social media -->
        <section class="mb-4">

            <!-- Facebook -->
            <a data-mdb-ripple-init class="btn text-white btn-floating m-1" style="background-color: #3b5998;" href="#!" role="button"><i class="fab fa-facebook-f rounded-circle"></i>
            </a>

            <!-- Instagram -->
            <a data-mdb-ripple-init class="btn text-white btn-floating m-1" style="background-color: #ac2bac;" href="#!" role="button"><i class="fab fa-instagram"></i>
            </a>

            <!-- Twitter -->
            <a data-mdb-ripple-init class="btn text-white btn-floating m-1" style="background-color: #55acee;" href="#!" role="button"><i class="fab fa-twitter"></i>
            </a>

        </section>
        <!-- Section: Social media -->
    </div>
    <!-- Grid container -->


    <!-- Copyright -->
    <div class="text-center p-3" style="background-color: rgba(0, 0, 0, 0.05);">
        © 2023 Copyright: Aleana&Carlup
    </div>
    <!-- Copyright -->
    </footer>

    <!-- Materialize.js -->
    <script src="<?= media(); ?>/js/materialize.min.js"></script>
    <!-- Materialize.js -->
    <script src="<?= media(); ?>/js/jsCarrusel.js"></script>
    <!--Link de bootstrap para javaScript-->
    <script src="<?= media(); ?>/js/bootstrap.bundle.min.js"></script>
</body>

</html>