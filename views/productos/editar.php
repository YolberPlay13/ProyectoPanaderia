<!-- ARCHIVO SEPARADO: productos/editar.php -->
<?php
$data['page_title'] = 'Editar Producto';
$data['content'] = ob_get_clean();
ob_start();
?>

<div class="row justify-content-center">
    <div class="col-lg-8">
        <div class="card shadow-sm">
            <div class="card-header bg-warning text-dark">
                <h5 class="mb-0">
                    <i class="bi bi-pencil-square"></i> Editar Producto
                </h5>
            </div>
            
            <div class="card-body">
                <!-- Información actual -->
                <div class="row mb-4">
                    <div class="col-md-12">
                        <div class="alert alert-light border">
                            <div class="d-flex align-items-center">
                                <div class="bg-primary rounded-circle d-flex align-items-center justify-content-center me-3" style="width: 50px; height: 50px;">
                                    <i class="bi bi-box text-white"></i>
                                </div>
                                <div>
                                    <h6 class="mb-1">Producto Actual</h6>
                                    <p class="mb-0">ID: #<?= $producto->id_producto ?> | Stock: <?= $producto->existencia_producto ?> unidades</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                
                <form method="post" class="needs-validation" novalidate>
                    <div class="row">
                        <div class="col-md-12 mb-3">
                            <label for="nombre_producto" class="form-label">
                                <i class="bi bi-box"></i> Nombre del Producto *
                            </label>
                            <input type="text" 
                                   class="form-control" 
                                   id="nombre_producto" 
                                   name="nombre_producto" 
                                   value="<?= $producto->nombre_producto ?>"
                                   placeholder="Ingrese el nombre del producto"
                                   required>
                            <div class="invalid-feedback">
                                Por favor ingrese el nombre del producto
                            </div>
                        </div>
                        
                        <div class="col-md-6 mb-3">
                            <label for="existencia_producto" class="form-label">
                                <i class="bi bi-hash"></i> Existencia Actual *
                            </label>
                            <input type="number" 
                                   class="form-control" 
                                   id="existencia_producto" 
                                   name="existencia_producto" 
                                   value="<?= $producto->existencia_producto ?>"
                                   placeholder="0"
                                   min="0"
                                   required>
                            <div class="invalid-feedback">
                                Por favor ingrese la existencia del producto
                            </div>
                        </div>
                        
                        <div class="col-md-6 mb-3">
                            <label for="estado_info" class="form-label">
                                <i class="bi bi-info-circle"></i> Estado Actual
                            </label>
                            <div class="form-control d-flex align-items-center" style="background-color: #f8f9fa;">
                                <?php if($producto->estado_producto == 1): ?>
                                    <span class="badge bg-success me-2">Activo</span>
                                    <small class="text-muted">El producto está disponible</small>
                                <?php else: ?>
                                    <span class="badge bg-secondary me-2">Inactivo</span>
                                    <small class="text-muted">El producto está desactivado</small>
                                <?php endif; ?>
                            </div>
                            <small class="form-text text-muted">
                                Para cambiar el estado, usa el botón "Eliminar" en la lista de productos
                            </small>
                        </div>
                    </div>
                    
                    <div class="alert alert-warning">
                        <i class="bi bi-exclamation-triangle"></i>
                        <strong>Importante:</strong> Al modificar la existencia aquí, estás ajustando el inventario manualmente. 
                        Para ingresos de mercancía, utiliza el módulo de "Ingresos".
                    </div>
                    
                    <div class="d-flex gap-2">
                        <button type="submit" class="btn btn-warning">
                            <i class="bi bi-save"></i> Actualizar Producto
                        </button>
                        <a href="<?= base_url('ProductosControl') ?>" class="btn btn-secondary">
                            <i class="bi bi-arrow-left"></i> Volver
                        </a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<script>
// Validación del formulario
(function() {
    'use strict';
    window.addEventListener('load', function() {
        var forms = document.getElementsByClassName('needs-validation');
        var validation = Array.prototype.filter.call(forms, function(form) {
            form.addEventListener('submit', function(event) {
                if (form.checkValidity() === false) {
                    event.preventDefault();
                    event.stopPropagation();
                }
                form.classList.add('was-validated');
            }, false);
        });
    }, false);
})();
</script>

<?php
$data['content'] = ob_get_contents();
ob_end_clean();
$this->load->view('layouts/main', $data);
?>