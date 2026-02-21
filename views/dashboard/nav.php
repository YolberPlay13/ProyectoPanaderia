<nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
    <!-- Logo / título -->
    <a class="navbar-brand ps-3" href="<?php echo base_url(); ?>">Gestor</a>

    <!-- Botón para colapsar el menú -->
    <button class="btn btn-link btn-sm order-1 order-lg-0 me-4 me-lg-0"
        id="sidebarToggle" href="#!"><i class="fas fa-bars"></i></button>

    <!-- Menú superior a la derecha -->
    <ul class="navbar-nav ms-auto me-0 me-md-3 my-2 my-md-0">
        <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" id="navbarDropdown" href="#"
               role="button" data-bs-toggle="dropdown" aria-expanded="false">
               <i class="fas fa-user fa-fw"></i>
            </a>
            <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                <li><a class="dropdown-item" href="#!"><i class="fas fa-id-card"></i> Perfil</a></li>
                <li><a class="dropdown-item" href="#!"><i class="fas fa-cog"></i> Configuración</a></li>
                <li><hr class="dropdown-divider" /></li>
                <!-- 🔹 Aquí corregimos el enlace -->
                <li>
                    <a class="dropdown-item" href="<?php echo base_url('login/logout'); ?>">
                        <i class="fas fa-sign-out-alt"></i> Cerrar sesión
                    </a>
                </li>
            </ul>
        </li>
    </ul>
</nav>

<div id="layoutSidenav">
    <div id="layoutSidenav_nav">
        <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
            <div class="sb-sidenav-menu">
                <div class="nav">
                    <div class="sb-sidenav-menu-heading">Panel</div>
                    <a class="nav-link" href="<?php echo base_url('productos'); ?>">
                        <div class="sb-nav-link-icon"><i class="fas fa-box"></i></div>
                        Productos
                    </a>
                    <a class="nav-link" href="<?php echo base_url('clientes'); ?>">
                        <div class="sb-nav-link-icon"><i class="fas fa-users"></i></div>
                        Clientes
                    </a>
                    <a class="nav-link" href="<?php echo base_url('proveedores'); ?>">
                        <div class="sb-nav-link-icon"><i class="fas fa-truck"></i></div>
                        Proveedores
                    </a>
                    <a class="nav-link" href="<?php echo base_url('ventas'); ?>">
                        <div class="sb-nav-link-icon"><i class="fas fa-shopping-cart"></i></div>
                        Ventas
                    </a>
                    <a class="nav-link" href="<?php echo base_url('ingresos'); ?>">
                        <div class="sb-nav-link-icon"><i class="fas fa-cash-register"></i></div>
                        Ingresos
                    </a>
                </div>
            </div>
            <div class="sb-sidenav-footer">
                <div class="small">Conectado como:</div>
                Administrador
            </div>
        </nav>
    </div>
    <div id="layoutSidenav_content">
        <main>
