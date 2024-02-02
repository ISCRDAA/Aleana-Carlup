<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!--icono de la pagina en las pestaña del navegador -->
    <link rel="shortcut icon" href="../assets/iconoblanco.ico" />
    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Dancing+Script|Raleway:500,600&display=swap" rel="stylesheet">
    <!--Link para los iconos-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" integrity="sha512-...." crossorigin="anonymous" />
    <!-- Materialize.css -->
    <link rel="stylesheet" href="<?= media(); ?>/css/materialize.min.css">
    <!-- CSS Estilos -->
    <link rel="stylesheet" href="<?= media(); ?>/css/cssCarrusel.css">
    <!--Link para bootstrap-->
    <link rel="stylesheet" href="<?= media(); ?>/css/bootstrap.min.css">
    <title><?= $data['page_tag']; ?></title>
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
                                    <li><hr class="dropdown-divider"></li>
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
                <h1 class="center-align_AC titulo_AC">¿Que se te antoja hoy?</h1>

                <div class="carousel center-align_AC">

                    <div class="carousel-item">
                        <h2 class="subtitulo_AC">Donas</h2>
                        <div class="linea-division_AC"></div>
                        <p class="sabor_AC">Glasseadas</p>
                        <img src="<?= media(); ?>/images/uploads/Modelo31frente.jpeg" alt="">
                    </div>

                    <div class="carousel-item">
                        <h2 class="subtitulo_AC">Pastel</h2>
                        <div class="linea-division_AC"></div>
                        <p class="sabor_AC">Chocolate</p>
                        <img src="<?= media(); ?>/images/uploads/Modelo32frente2.jpeg" alt="">
                    </div>

                    <div class="carousel-item">
                        <h2 class="subtitulo_AC">Pastel2</h2>
                        <div class="linea-division_AC"></div>
                        <p class="sabor_AC">Chocolate</p>
                        <img src="<?= media(); ?>/images/uploads/Modelo35frente.jpeg" alt="">
                    </div>

                    <div class="carousel-item">
                        <h2 class="subtitulo_AC">Pastel3</h2>
                        <div class="linea-division_AC"></div>
                        <p class="sabor_AC">Chocolate</p>
                        <img src="<?= media(); ?>/images/uploads/Modelo95frente2.jpeg" alt="">
                    </div>

                    <div class="carousel-item">
                        <h2 class="subtitulo_AC">Pastel4</h2>
                        <div class="linea-division_AC"></div>
                        <p class="sabor_AC">Chocolate</p>
                        <img src="<?= media(); ?>/images/uploads/Modelo201frente.jpeg" alt="">
                    </div>

                </div>

            </div>
        </div>
    </div>

    <section  <?= $data['page_id']; ?>>
        <h1>Hola buenos</h1>
    </section>
    <br><br>
    <br>
    <br>

    <footer class="container mt-5 text-center"> <!-- Agrega la clase 'mt-5' al footer para un margen superior de 5 unidades (puedes ajustar el valor según sea necesario) -->
        <p>&copy; 2024 Aleana & Carlup</p>
    </footer>
    <!-- Materialize.js -->
    <script src="<?= media(); ?>/js/materialize.min.js"></script>
    <!-- Materialize.js -->
    <script src="<?= media(); ?>/js/jsCarrusel.js"></script>
    <!--Link de bootstrap para javaScript-->
    <script src="<?= media(); ?>/js/bootstrap.bundle.min.js"></script>
</body>
</html>