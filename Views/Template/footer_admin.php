        <script>
            const base_url = "<?= base_url(); ?>";
            const media_url = "<?= media(); ?>";
        </script>
        <!-- Essential javascripts for application to work-->
        <script src="<?= media(); ?>/js/jquery-3.3.1.min.js"></script>
        <script src="<?= media(); ?>/js/popper.min.js"></script>
        <script src="<?= media(); ?>/js/bootstrap.min.js"></script>
        <script src="<?= media(); ?>/js/main.js"></script>
        <script src="<?= media(); ?>/js/fontawesome.js"></script>
        <script src="<?= media(); ?>/js/functions_admin.js"></script>
        <!-- The javascript plugin to display page loading on top-->
        <script src="<?= media(); ?>/js/plugins/pace.min.js"></script>
        <!-- Page specific javascripts-->
        <script type="text/javascript" src="<?= media(); ?>/js/plugins/sweetalert.min.js"></script>

        <!-- Data table plugin-->
        <script type="text/javascript" src="<?= media(); ?>/js/plugins/jquery.dataTables.min.js"></script>
        <script type="text/javascript" src="<?= media(); ?>/js/plugins/dataTables.bootstrap.min.js"></script>
        <script type="text/javascript" src="<?= media(); ?>/js/plugins/bootstrap-select.min.js"></script>

        <?php if ($data['page_name'] == "rol_usuario") { ?>
        <script src="<?= media(); ?>/js/functions_roles.js"></script>
        <?php } ?>
        <?php if ($data['page_name'] == "usuarios") { ?>
        <script src="<?= media(); ?>/js/functions_usuarios.js"></script>
        <?php } ?>
        <?php if ($data['page_name'] == "modelo_prendas") { ?>
        <script src="<?= media(); ?>/js/functions_modelosprendas.js"></script>
        <?php } ?>
        <?php if ($data['page_name'] == "tipos") { ?>
        <script src="<?= media(); ?>/js/functions_tipos.js"></script>
        <?php } ?>
        <?php if ($data['page_name'] == "colores_modelos") { ?>
        <script src="<?= media(); ?>/js/functions_coloresmodelos.js"></script>
        <?php } ?>
        <?php if ($data['page_name'] == "colores") { ?>
        <script src="<?= media(); ?>/js/functions_colores.js"></script>
        <?php } ?>
        <?php if ($data['page_name'] == "hiloscaja") { ?>
        <script src="<?= media(); ?>/js/functions_hiloscaja.js"></script>
        <?php } ?>
        <?php if ($data['page_name'] == "hiloscostal") { ?>
        <script src="<?= media(); ?>/js/functions_hiloscostal.js"></script>
        <?php } ?>
    </body>
</html>