<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= isset($title) ? $title . ' - ' : '' ?>Sistema de Inventarios</title>
    
    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Bootstrap Icons -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css" rel="stylesheet">
    
    <style>
        .sidebar {
            position: fixed;
            top: 0;
            bottom: 0;
            left: 0;
            z-index: 100;
            padding: 78px 0 0;
            box-shadow: inset -1px 0 0 rgba(0, 0, 0, .1);
        }
        .sidebar-sticky {
            height: calc(100vh - 78px);
            overflow-x: hidden;
            overflow-y: auto;
        }
        .main-content {
            margin-left: 240px;
            padding-top: 78px;
        }
        @media (max-width: 767.98px) {
            .sidebar {
                top: 5rem;
            }
            .main-content {
                margin-left: 0;
            }
        }
    </style>
</head>
<body>
    <!-- Header/Navbar -->
    <nav class="navbar navbar-expand-md navbar-dark bg-primary fixed-top">
        <div class="container-fluid">
            <a class="navbar-brand" href="<?= base_url('MenuControl') ?>">
                <i class="bi bi-box-seam"></i> Sistema Inventarios
            </a>
            
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#sidebarMenu">
                <span class="navbar-toggler-icon"></span>
            </button>
            
            <div class="navbar-nav ms-auto">
                <div class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle text-white" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown">
                        <i class="bi bi-person-circle"></i> <?= $this->session->userdata('usuario') ?>
                    </a>
                    <ul class="dropdown-menu dropdown-menu-end">
                        <li><a class="dropdown-item" href="<?= base_url('LoginControl/logout') ?>"><i class="bi bi-box-arrow-right"></i> Cerrar Sesión</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </nav>

    <!-- Sidebar -->
    <nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-light sidebar collapse">
        <div class="sidebar-sticky pt-3">
            <ul class="nav flex-column">
                <li class="nav-item">
                    <a class="nav-link <?= ($this->router->class == 'MenuControl') ? 'active text-primary fw-bold' : 'text-dark' ?>" href="<?= base_url('MenuControl') ?>">
                        <i class="bi bi-house"></i> Inicio
                    </a>
                </li>
                
                <li class="nav-item">
                    <a class="nav-link <?= ($this->router->class == 'ProductosControl') ? 'active text-primary fw-bold' : 'text-dark' ?>" href="<?= base_url('ProductosControl') ?>">
                        <i class="bi bi-box"></i> Productos
                    </a>
                </li>
                
                <li class="nav-item">
                    <a class="nav-link <?= ($this->router->class == 'ProveedoresControl') ? 'active text-primary fw-bold' : 'text-dark' ?>" href="<?= base_url('ProveedoresControl') ?>">
                        <i class="bi bi-truck"></i> Proveedores
                    </a>
                </li>
                
                <li class="nav-item">
                    <a class="nav-link <?= ($this->router->class == 'ClientesControl') ? 'active text-primary fw-bold' : 'text-dark' ?>" href="<?= base_url('ClientesControl') ?>">
                        <i class="bi bi-people"></i> Clientes
                    </a>
                </li>
                
                <li class="nav-item">
                    <a class="nav-link <?= ($this->router->class == 'IngresosControl') ? 'active text-primary fw-bold' : 'text-dark' ?>" href="<?= base_url('IngresosControl/crear') ?>">
                        <i class="bi bi-arrow-down-circle"></i> Ingresos de Mercancia
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link <?= ($this->router->class == 'IngresosPanesControl') ? 'active text-primary fw-bold' : 'text-dark' ?>" href="<?= base_url('IngresosPanesControl/crearPanes') ?>">
                        <i class="bi bi-arrow-down-circle"></i> Ingresos de Panes
                    </a>
                </li>
                
                <li class="nav-item">
                    <a class="nav-link text-dark" href="#" onclick="alert('Módulo en desarrollo')">
                        <i class="bi bi-cart"></i> Ventas
                    </a>
                </li>
            </ul>
        </div>
    </nav>

    <!-- Main content -->
    <main class="main-content">
        <div class="container-fluid px-4">
            <?php if($this->session->flashdata('success')): ?>
                <div class="alert alert-success alert-dismissible fade show mt-3" role="alert">
                    <i class="bi bi-check-circle"></i> <?= $this->session->flashdata('success') ?>
                    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                </div>
            <?php endif; ?>
            
            <?php if($this->session->flashdata('error')): ?>
                <div class="alert alert-danger alert-dismissible fade show mt-3" role="alert">
                    <i class="bi bi-exclamation-triangle"></i> <?= $this->session->flashdata('error') ?>
                    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                </div>
            <?php endif; ?>

            <!-- Page Title -->
            <?php if(isset($page_title)): ?>
                <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
                    <h1 class="h2"><?= $page_title ?></h1>
                    <?php if(isset($page_actions)): ?>
                        <div class="btn-toolbar mb-2 mb-md-0">
                            <?= $page_actions ?>
                        </div>
                    <?php endif; ?>
                </div>
            <?php endif; ?>

            <!-- Content -->
            <?= isset($content) ? $content : '' ?>
        </div>
    </main>

    <!-- Bootstrap 5 JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    
    <!-- Page specific scripts -->
    <?php if(isset($scripts)): ?>
        <?= $scripts ?>
    <?php endif; ?>
</body>
</html>