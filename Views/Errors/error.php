<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?= media(); ?>/css/cssErrorPage.css">
    <title>Document</title>
</head>

<body>

    <header class="top-header"></header>

    <!--dust particel-->
    <div>
        <div class="starsec"></div>
        <div class="starthird"></div>
        <div class="starfourth"></div>
        <div class="starfifth"></div>
    </div>

    <!--Dust particle end--->
    <div class="lamp__wrap">
        <div class="lamp">
            <div class="cable"></div>
            <div class="cover"></div>
            <div class="in-cover">
                <div class="bulb"></div>
            </div>
            <div class="light"></div>
        </div>
    </div>

    <!-- END Lamp -->
    <section class="error">

        <!-- Content -->
        <div class="error__content">
            <div class="error__message message">
                <h1 class="message__title">Página no encontrada</h1>
                <p class="message__text">Lo sentimos, la página que estabas buscando no se encuentra aquí.
                    Es posible que el enlace que siguió esté roto o ya no exista.
                    
                </p>
            </div>
            <div class="error__nav e-nav">
                <a href="<?php base_url(); ?>" class="e-nav__link"></a>
            </div>
        </div>

        <!-- END Content -->
    </section>

    </a>
</body>
</html>