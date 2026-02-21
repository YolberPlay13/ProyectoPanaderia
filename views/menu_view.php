<?php
$data['page_title'] = 'Dashboard - Panel Principal';
$data['content'] = $this->load->view('dashboard/dashboard_content', '', TRUE);
$this->load->view('layouts/main', $data);
?>

<!-- dashboard_content.php -->
<div class="row g-4">
    <!-- Tarjeta de bienvenida -->
    <div class="col-12">
        <div class="card bg-primary text-white">
            <div class="card-body">
                <div class="d-flex align-items-center">
                    <div class="flex-grow-1">
                        <h3 class="mb-2">¡Bienvenido, <?= $this->session->userdata('usuario') ?>!</h3>
                        <p class="mb-0">Sistema de Gestión de Inventarios</p>
                    </div>
                    <div class="flex-shrink-0">
                        <i class="bi bi-person-circle display-4"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Estadísticas rápidas -->
    <div class="col-12">
        <h4 class="mb-3">Resumen del Sistema</h4>
    </div>

    <div class="col-md-3 col-sm-6">
        <div class="card bg-success text-white h-100">
            <div class="card-body">
                <div class="d-flex align-items-center">
                    <div class="flex-grow-1">
                        <h5 class="card-title">Productos</h5>
                        <h3 class="mb-0">
                            <?php
                            $this->load->model('ProductosModel');
                            $productos_count = count($this->ProductosModel->getActive());
                            echo $productos_count;
                            ?>
                        </h3>
                    </div>
                    <div class="flex-shrink-0">
                        <i class="bi bi-box display-6"></i>
                    </div>
                </div>
            </div>
            <div class="card-footer">
                <a href="<?= base_url('ProductosControl') ?>" class="text-white text-decoration-none">
                    Ver todos <i class="bi bi-arrow-right"></i>
                </a>
            </div>
        </div>
    </div>

    <div class="col-md-3 col-sm-6">
        <div class="card bg-info text-white h-100">
            <div class="card-body">
                <div class="d-flex align-items-center">
                    <div class="flex-grow-1">
                        <h5 class="card-title">Proveedores</h5>
                        <h3 class="mb-0">
                            <?php
                            $this->load->model('ProveedorModel');
                            $proveedores_count = count($this->ProveedorModel->getAll());
                            echo $proveedores_count;
                            ?>
                        </h3>
                    </div>
                    <div class="flex-shrink-0">
                        <i class="bi bi-truck display-6"></i>
                    </div>
                </div>
            </div>
            <div class="card-footer">
                <a href="<?= base_url('ProveedoresControl') ?>" class="text-white text-decoration-none">
                    Ver todos <i class="bi bi-arrow-right"></i>
                </a>
            </div>
        </div>
    </div>

    <div class="col-md-3 col-sm-6">
        <div class="card bg-warning text-white h-100">
            <div class="card-body">
                <div class="d-flex align-items-center">
                    <div class="flex-grow-1">
                        <h5 class="card-title">Clientes</h5>
                        <h3 class="mb-0">
                            <?php
                            $this->load->model('ClientesModel');
                            $clientes_count = count($this->ClientesModel->getAll());
                            echo $clientes_count;
                            ?>
                        </h3>
                    </div>
                    <div class="flex-shrink-0">
                        <i class="bi bi-people display-6"></i>
                    </div>
                </div>
            </div>
            <div class="card-footer">
                <a href="<?= base_url('ClientesControl') ?>" class="text-white text-decoration-none">
                    Ver todos <i class="bi bi-arrow-right"></i>
                </a>
            </div>
        </div>
    </div>

    <div class="col-md-3 col-sm-6">
        <div class="card bg-secondary text-white h-100">
            <div class="card-body">
                <div class="d-flex align-items-center">
                    <div class="flex-grow-1">
                        <h5 class="card-title">Stock Bajo</h5>
                        <h3 class="mb-0">
                            <?php
                            // Contar productos con existencia <= 10
                            $this->db->where('existencia_producto <=', 10);
                            $this->db->where('estado_producto', 1);
                            $stock_bajo = $this->db->count_all_results('productos');
                            echo $stock_bajo;
                            ?>
                        </h3>
                    </div>
                    <div class="flex-shrink-0">
                        <i class="bi bi-exclamation-triangle display-6"></i>
                    </div>
                </div>
            </div>
            <div class="card-footer">
                <a href="<?= base_url('ProductosControl') ?>" class="text-white text-decoration-none">
                    Revisar <i class="bi bi-arrow-right"></i>
                </a>
            </div>
        </div>
    </div>

    <!-- Acciones rápidas -->
    <div class="col-12 mt-5">
        <h4 class="mb-3">Acciones Rápidas</h4>
    </div>

    <div class="col-md-6 col-lg-3">
        <div class="card h-100 shadow-sm">
            <div class="card-body text-center">
                <i class="bi bi-plus-circle text-success display-4 mb-3"></i>
                <h5 class="card-title">Nuevo Producto</h5>
                <p class="card-text text-muted">Agregar productos al inventario</p>
                <a href="<?= base_url('ProductosControl/crear') ?>" class="btn btn-success">
                    <i class="bi bi-plus-lg"></i> Crear
                </a>
            </div>
        </div>
    </div>

    <div class="col-md-6 col-lg-3">
        <div class="card h-100 shadow-sm">
            <div class="card-body text-center">
                <i class="bi bi-arrow-down-circle text-primary display-4 mb-3"></i>
                <h5 class="card-title">Registrar Ingreso</h5>
                <p class="card-text text-muted">Entrada de productos al stock</p>
                <a href="<?= base_url('IngresosControl/crear') ?>" class="btn btn-primary">
                    <i class="bi bi-arrow-down"></i> Ingresar
                </a>
            </div>
        </div>
    </div>

    <div class="col-md-6 col-lg-3">
        <div class="card h-100 shadow-sm">
            <div class="card-body text-center">
                <i class="bi bi-truck text-info display-4 mb-3"></i>
                <h5 class="card-title">Nuevo Proveedor</h5>
                <p class="card-text text-muted">Registrar proveedores</p>
                <a href="<?= base_url('ProveedoresControl/crear') ?>" class="btn btn-info">
                    <i class="bi bi-plus-lg"></i> Agregar
                </a>
            </div>
        </div>
    </div>

    <div class="col-md-6 col-lg-3">
        <div class="card h-100 shadow-sm">
            <div class="card-body text-center">
                <i class="bi bi-person-plus text-warning display-4 mb-3"></i>
                <h5 class="card-title">Nuevo Cliente</h5>
                <p class="card-text text-muted">Registrar clientes</p>
                <a href="<?= base_url('ClientesControl/crear') ?>" class="btn btn-warning">
                    <i class="bi bi-plus-lg"></i> Registrar
                </a>
            </div>
        </div>
    </div>
</div>