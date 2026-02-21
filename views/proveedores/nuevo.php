<div id="layoutSidenav_content">
    <main>
        <div class="container px-4">
            <h1 class="mt-4 text-center">Nuevo Proveedor</h1>
            <ol class="breadcrumb mb-4 justify-content-center">
                <li class="breadcrumb-item"><a href="<?php echo base_url('welcome'); ?>">Dashboard</a></li>
                <li class="breadcrumb-item"><a href="<?php echo base_url('proveedores'); ?>">Proveedores</a></li>
                <li class="breadcrumb-item active">Nuevo</li>
            </ol>

            <div class="row justify-content-center">
                <div class="col-lg-6 col-md-8"> <!-- centrado y ancho reducido -->
                    <div class="card shadow">
                        <div class="card-header">
                            <i class="fas fa-plus-circle me-1"></i> Registrar proveedor
                        </div>
                        <div class="card-body">
                            <form action="<?php echo base_url('proveedores/guardar'); ?>" method="post">
                                <div class="mb-3">
                                    <label class="form-label">NIT</label>
                                    <input type="text" name="nit_proveedor" class="form-control" required>
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Nombre</label>
                                    <input type="text" name="nombre_proveedor" class="form-control" required>
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Teléfono</label>
                                    <input type="text" name="telefono_proveedor" class="form-control">
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Correo</label>
                                    <input type="email" name="correo_proveedor" class="form-control">
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Estado</label>
                                    <select name="estado_proveedor" class="form-select">
                                        <option value="1">Activo</option>
                                        <option value="0">Inactivo</option>
                                    </select>
                                </div>
                                <div class="d-flex justify-content-between">
                                    <button class="btn btn-primary" type="submit">
                                        <i class="fas fa-save"></i> Guardar
                                    </button>
                                    <a href="<?php echo base_url('proveedores'); ?>" class="btn btn-secondary">
                                        <i class="fas fa-arrow-left"></i> Cancelar
                                    </a>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
</div>
