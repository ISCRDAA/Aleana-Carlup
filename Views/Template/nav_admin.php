        <!-- Sidebar menu-->
        <div class="app-sidebar__overlay" data-toggle="sidebar"></div>
        <aside class="app-sidebar">

            <div class="app-sidebar__user">
                <img class="app-sidebar__user-avatar" src="<?= media(); ?>/images/avatar.png" alt="User Image">
                <div>
                    <p class="app-sidebar__user-name">Nombre</p>
                    <p class="app-sidebar__user-designation">Rol</p>
                </div>
            </div>

            <ul class="app-menu">

                <li>
                    <a class="app-menu__item" href="<?= base_url(); ?>/dashboard">
                        <i class="app-menu__icon fa fa-dashboard"></i>
                        <span class="app-menu__label">Dashboard</span>
                    </a>
                </li>

                <li class="treeview">
                    <a class="app-menu__item" href="#" data-toggle="treeview">
                        <i class="app-menu__icon fa fa-tags" aria-hidden="true"></i>
                        <span class="app-menu__label">Modelos</span>
                        <i class="treeview-indicator fa fa-angle-right"></i>
                    </a>
                    <ul class="treeview-menu">
                        <li><a class="treeview-item" href="<?= base_url(); ?>/modelos"><i class="icon fa fa-circle-o"></i> Modelos</a></li>
                        <li><a class="treeview-item" href="<?= base_url(); ?>/tipos"><i class="icon fa fa-circle-o"></i> Tipos</a></li>
                        <li><a class="treeview-item" href="<?= base_url(); ?>/coloresmodelos"><i class="icon fa fa-circle-o"></i> Colores de los Modelos</a></li>
                        <li><a class="treeview-item" href="<?= base_url(); ?>/colores"><i class="icon fa fa-circle-o"></i> Colores</a></li>
                    </ul>
                </li>

                <li class="treeview">
                    <a class="app-menu__item" href="#" data-toggle="treeview">
                        <i class="app-menu__icon fa fa-th" aria-hidden="true"></i>
                        <span class="app-menu__label"> Hilos</span>
                        <i class="treeview-indicator fa fa-angle-right"></i>
                    </a>
                    <ul class="treeview-menu">
                        <li><a class="treeview-item" href="<?= base_url(); ?>/hiloscaja"><i class="icon fa fa-circle-o"></i> Hilos por Caja</a></li>
                        <li><a class="treeview-item" href="<?= base_url(); ?>/hiloscostal"><i class="icon fa fa-circle-o"></i> Hilos por Costal</a></li>
                    </ul>
                </li>

                <li>
                    <a class="app-menu__item" href="<?= base_url(); ?>/produccion">
                    <i class="app-menu__icon fa fa-bar-chart" aria-hidden="true"></i>
                        <span class="app-menu__label">Producción</span>
                    </a>
                </li>

                <li>
                    <a class="app-menu__item" href="<?= base_url(); ?>/orden">
                    <i class="app-menu__icon fa fa-check-square-o" aria-hidden="true"></i>
                        <span class="app-menu__label">Orden</span>
                    </a>
                </li>

                <li class="treeview">
                    <a class="app-menu__item" href="#" data-toggle="treeview">
                        <i class="app-menu__icon fa fa-users" aria-hidden="true"></i>
                        <span class="app-menu__label">Usuarios</span>
                        <i class="treeview-indicator fa fa-angle-right"></i>
                    </a>
                    <ul class="treeview-menu">
                        <li><a class="treeview-item" href="<?= base_url(); ?>/usuarios"><i class="icon fa fa-circle-o"></i> Usuarios</a></li>
                        <li><a class="treeview-item" href="<?= base_url(); ?>/roles"><i class="icon fa fa-circle-o"></i> Roles</a></li>
                        <li><a class="treeview-item" href="<?= base_url(); ?>/permisos"><i class="icon fa fa-circle-o"></i> Permisos</a></li>
                    </ul>
                </li>

                <li>
                    <a class="app-menu__item" href="<?= base_url(); ?>/clientes">
                    <i class="app-menu__icon fa fa-id-card-o" aria-hidden="true"></i>
                        <span class="app-menu__label">Clientes</span>
                    </a>
                </li>

                <li>
                    <a class="app-menu__item" href="<?= base_url(); ?>/productos">
                    <i class="app-menu__icon fa fa-shopping-basket" aria-hidden="true"></i>
                        <span class="app-menu__label">Productos</span>
                    </a>
                </li>

                <li>
                    <a class="app-menu__item" href="<?= base_url(); ?>/pedidos">
                    <i class="app-menu__icon fa fa-cubes" aria-hidden="true"></i>
                        <span class="app-menu__label">Pedidos</span>
                    </a>
                </li>

                <li>
                    <a class="app-menu__item" href="<?= base_url(); ?>/logout">
                        <i class="app-menu__icon fa fa-sign-out" aria-hidden="true"></i>
                        <span class="app-menu__label">Logout</span>
                    </a>
                </li>

            </ul>

        </aside>