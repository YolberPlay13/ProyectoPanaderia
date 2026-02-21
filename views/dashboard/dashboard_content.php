<div class="row g-4">
    <!-- Tarjeta de bienvenida -->
    <div class="col-12">
        <div class="card bg-gradient" style="background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);">
            <div class="card-body text-white">
                <div class="d-flex align-items-center">
                    <div class="flex-grow-1">
                        <h3 class="mb-2">¡Bienvenido, <?= $this->session->userdata('usuario') ?>!</h3>
                        <p class="mb-0 opacity-75">Sistema de Gestión de Inventarios - Panel de Control</p>
                        <?php
                        // Configura tu zona horaria (ejemplo para Colombia)
                        date_default_timezone_set('America/Bogota');
                        ?>
                        <small class="opacity-75">Último acceso: <?= date('d/m/Y H:i') ?></small>
                    </div>
                    <div class="flex-shrink-0">
                        <i class="bi bi-person-circle display-4"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Título de estadísticas -->
    <div class="col-12">
        <div class="d-flex align-items-center justify-content-between">
            <h4 class="mb-0">
                <i class="bi bi-graph-up text-primary"></i> Resumen del Sistema
            </h4>
            <small class="text-muted">Actualizado en tiempo real</small>
        </div>
        <hr class="mt-2">
    </div>

    <!-- Estadísticas rápidas -->
    <div class="col-md-3 col-sm-6">
        <div class="card bg-success text-white h-100 shadow-sm">
            <div class="card-body">
                <div class="d-flex align-items-center">
                    <div class="flex-grow-1">
                        <h6 class="card-title mb-1">Total Productos</h6>
                        <h2 class="mb-0 fw-bold">
                            <?= isset($total_productos) ? $total_productos : 0 ?>
                        </h2>
                        <small class="opacity-75">Productos activos</small>
                    </div>
                    <div class="flex-shrink-0">
                        <i class="bi bi-box display-5"></i>
                    </div>
                </div>
            </div>
            <div class="card-footer bg-dark bg-opacity-25">
                <a href="<?= base_url('ProductosControl') ?>" class="text-white text-decoration-none d-flex align-items-center">
                    <span class="flex-grow-1">Ver inventario</span>
                    <i class="bi bi-arrow-right"></i>
                </a>
            </div>
        </div>
    </div>

    <div class="col-md-3 col-sm-6">
        <div class="card bg-info text-white h-100 shadow-sm">
            <div class="card-body">
                <div class="d-flex align-items-center">
                    <div class="flex-grow-1">
                        <h6 class="card-title mb-1">Proveedores</h6>
                        <h2 class="mb-0 fw-bold">
                            <?= isset($total_proveedores) ? $total_proveedores : 0 ?>
                        </h2>
                        <small class="opacity-75">Proveedores activos</small>
                    </div>
                    <div class="flex-shrink-0">
                        <i class="bi bi-truck display-5"></i>
                    </div>
                </div>
            </div>
            <div class="card-footer bg-dark bg-opacity-25">
                <a href="<?= base_url('ProveedoresControl') ?>" class="text-white text-decoration-none d-flex align-items-center">
                    <span class="flex-grow-1">Gestionar</span>
                    <i class="bi bi-arrow-right"></i>
                </a>
            </div>
        </div>
    </div>

    <div class="col-md-3 col-sm-6">
        <div class="card bg-warning text-white h-100 shadow-sm">
            <div class="card-body">
                <div class="d-flex align-items-center">
                    <div class="flex-grow-1">
                        <h6 class="card-title mb-1">Clientes</h6>
                        <h2 class="mb-0 fw-bold">
                            <?= isset($total_clientes) ? $total_clientes : 0 ?>
                        </h2>
                        <small class="opacity-75">Clientes registrados</small>
                    </div>
                    <div class="flex-shrink-0">
                        <i class="bi bi-people display-5"></i>
                    </div>
                </div>
            </div>
            <div class="card-footer bg-dark bg-opacity-25">
                <a href="<?= base_url('ClientesControl') ?>" class="text-white text-decoration-none d-flex align-items-center">
                    <span class="flex-grow-1">Ver clientes</span>
                    <i class="bi bi-arrow-right"></i>
                </a>
            </div>
        </div>
    </div>

    <div class="col-md-3 col-sm-6">
        <div class="card bg-danger text-white h-100 shadow-sm">
            <div class="card-body">
                <div class="d-flex align-items-center">
                    <div class="flex-grow-1">
                        <h6 class="card-title mb-1">Stock Bajo</h6>
                        <h2 class="mb-0 fw-bold">
                            <?= isset($productos_stock_bajo) ? $productos_stock_bajo : 0 ?>
                        </h2>
                        <small class="opacity-75">Requieren atención</small>
                    </div>
                    <div class="flex-shrink-0">
                        <i class="bi bi-exclamation-triangle display-5"></i>
                    </div>
                </div>
            </div>
            <div class="card-footer bg-dark bg-opacity-25">
                <a href="<?= base_url('ProductosControl') ?>" class="text-white text-decoration-none d-flex align-items-center">
                    <span class="flex-grow-1">Revisar stock</span>
                    <i class="bi bi-arrow-right"></i>
                </a>
            </div>
        </div>
    </div>

    <!-- Acciones rápidas -->
    <div class="col-12 mt-5">
        <h4 class="mb-3">
            <i class="bi bi-lightning-charge text-warning"></i> Acciones Rápidas
        </h4>
    </div>

    <div class="col-lg-3 col-md-6">
        <div class="card h-100 shadow-sm border-0 hover-card">
            <div class="card-body text-center p-4">
                <div class="mb-3">
                    <div class="bg-success rounded-circle d-inline-flex align-items-center justify-content-center" style="width: 60px; height: 60px;">
                        <i class="bi bi-plus-circle text-white fs-3"></i>
                    </div>
                </div>
                <h5 class="card-title">Nuevo Producto</h5>
                <p class="card-text text-muted small">Agregar productos al inventario y gestionar el catálogo</p>
                <a href="<?= base_url('ProductosControl/crear') ?>" class="btn btn-success btn-sm">
                    <i class="bi bi-plus-lg"></i> Crear Producto
                </a>
            </div>
        </div>
    </div>

    <div class="col-lg-3 col-md-6">
        <div class="card h-100 shadow-sm border-0 hover-card">
            <div class="card-body text-center p-4">
                <div class="mb-3">
                    <div class="bg-primary rounded-circle d-inline-flex align-items-center justify-content-center" style="width: 60px; height: 60px;">
                        <i class="bi bi-arrow-down-circle text-white fs-3"></i>
                    </div>
                </div>
                <h5 class="card-title">Registrar Ingreso</h5>
                <p class="card-text text-muted small">Entrada de mercancía y actualización de inventario</p>
                <a href="<?= base_url('IngresosControl/crear') ?>" class="btn btn-primary btn-sm">
                    <i class="bi bi-arrow-down"></i> Hacer Ingreso
                </a>
            </div>
        </div>
    </div>

    <div class="col-lg-3 col-md-6">
        <div class="card h-100 shadow-sm border-0 hover-card">
            <div class="card-body text-center p-4">
                <div class="mb-3">
                    <div class="bg-info rounded-circle d-inline-flex align-items-center justify-content-center" style="width: 60px; height: 60px;">
                        <i class="bi bi-truck text-white fs-3"></i>
                    </div>
                </div>
                <h5 class="card-title">Nuevo Proveedor</h5>
                <p class="card-text text-muted small">Registrar proveedores y gestionar información de contacto</p>
                <a href="<?= base_url('ProveedoresControl/crear') ?>" class="btn btn-info btn-sm">
                    <i class="bi bi-plus-lg"></i> Agregar
                </a>
            </div>
        </div>
    </div>

    <div class="col-lg-3 col-md-6">
        <div class="card h-100 shadow-sm border-0 hover-card">
            <div class="card-body text-center p-4">
                <div class="mb-3">
                    <div class="bg-warning rounded-circle d-inline-flex align-items-center justify-content-center" style="width: 60px; height: 60px;">
                        <i class="bi bi-person-plus text-white fs-3"></i>
                    </div>
                </div>
                <h5 class="card-title">Nuevo Cliente</h5>
                <p class="card-text text-muted small">Registrar clientes y mantener base de datos actualizada</p>
                <a href="<?= base_url('ClientesControl/crear') ?>" class="btn btn-warning btn-sm">
                    <i class="bi bi-plus-lg"></i> Registrar
                </a>
            </div>
        </div>
    </div>

    <!-- Alertas importantes -->
    <?php if(isset($productos_stock_bajo) && $productos_stock_bajo > 0): ?>
    <div class="col-12 mt-4">
        <div class="alert alert-warning shadow-sm" role="alert">
            <div class="d-flex align-items-center">
                <i class="bi bi-exclamation-triangle fs-4 me-3"></i>
                <div class="flex-grow-1">
                    <h6 class="alert-heading mb-1">¡Atención: Stock Bajo!</h6>
                    <p class="mb-0">
                        Tienes <strong><?= $productos_stock_bajo ?></strong> producto(s) con stock crítico (≤ 10 unidades). 
                        <a href="<?= base_url('ProductosControl') ?>" class="alert-link">Revisar inventario</a>
                    </p>
                </div>
                <a href="<?= base_url('IngresosControl/crear') ?>" class="btn btn-warning btn-sm">
                    <i class="bi bi-arrow-down-circle"></i> Hacer Ingreso
                </a>
            </div>
        </div>
    </div>
    <?php endif; ?>
</div>

<style>
.hover-card {
    transition: transform 0.2s, box-shadow 0.2s;
}

.hover-card:hover {
    transform: translateY(-5px);
    box-shadow: 0 8px 25px rgba(0,0,0,0.15) !important;
}

.bg-gradient {
    background: linear-gradient(135deg, #667eea 0%, #764ba2 100%) !important;
}
</style>