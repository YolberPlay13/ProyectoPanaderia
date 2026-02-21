<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid px-4">
            <h1 class="mt-4">Editar Proveedor</h1>

            <div class="card mb-4">
                <div class="card-body">
                    <form action="<?php echo base_url('proveedores/actualizar'); ?>" method="post">
                        <input type="hidden" name="id_proveedor" value="<?php echo $proveedor->id_proveedor; ?>">
                        <div class="mb-3">
                            <label class="form-label">NIT</label>
                            <input type="text" name="nit_proveedor" class="form-control" value="<?php echo $proveedor->nit_proveedor; ?>" required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Nombre</label>
                            <input type="text" name="nombre_proveedor" class="form-control" value="<?php echo $proveedor->nombre_proveedor; ?>" required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Teléfono</label>
                            <input type="text" name="telefono_proveedor" class="form-control" value="<?php echo $proveedor->telefono_proveedor; ?>">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Correo</label>
                            <input type="email" name="correo_proveedor" class="form-control" value="<?php echo $proveedor->correo_proveedor; ?>">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Estado</label>
                            <select name="estado_proveedor" class="form-control">
                                <option value="1" <?php echo ($proveedor->estado_proveedor == 1) ? 'selected' : ''; ?>>Activo</option>
                                <option value="0" <?php echo ($proveedor->estado_proveedor == 0) ? 'selected' : ''; ?>>Inactivo</option>
                            </select>
                        </div>
                        <button class="btn btn-success" type="submit">Actualizar</button>
                        <a href="<?php echo base_url('proveedores'); ?>" class="btn btn-secondary">Cancelar</a>
                    </form>
                </div>
            </div>
        </div>
    </main>
</div>
