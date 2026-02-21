<div class="container-fluid px-4">
    <h1 class="mt-4">Nuevo Producto</h1>
    <div class="card mb-4">
        <div class="card-body">
            <form action="<?php echo base_url('productos/guardar'); ?>" method="post">
                <div class="mb-3">
                    <label class="form-label">Nombre del producto</label>
                    <input type="text" class="form-control" name="nombre_producto" required>
                </div>
                <div class="mb-3">
                    <label class="form-label">Existencia</label>
                    <input type="number" class="form-control" name="existencia_producto" required>
                </div>
                <div class="mb-3">
                    <label class="form-label">Estado</label>
                    <select class="form-control" name="estado_producto">
                        <option value="1">Activo</option>
                        <option value="0">Inactivo</option>
                    </select>
                </div>
                <button type="submit" class="btn btn-primary">Guardar</button>
            </form>
        </div>
    </div>
</div>
