<?php
// productos/crear.php
$data['page_title'] = 'Nuevo Producto';
$data['content'] = ob_get_clean();
ob_start();
?>

<div class="row justify-content-center">
    <div class="col-lg-8">
        <div class="card shadow-sm">
            <div class="card-header bg-primary text-white">
                <h5 class="mb-0">
                    <i class="bi bi-plus-circle"></i> Registrar Nuevo Producto
                </h5>
            </div>
            
            <div class="card-body">
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
                                   placeholder="Ingrese el nombre del producto"
                                   required>
                            <div class="invalid-feedback">
                                Por favor ingrese el nombre del producto
                            </div>
                        </div>
                        <!-- Categoría -->
                        <div class="col-md-12">
                            <label for="categoria_id" class="form-label fw-semibold">
                                <i class="bi bi-diagram-3 me-1"></i> Categoría *
                            </label>
                            <select class="form-select shadow-sm" name="categoria_id" id="categoria-id" required>
                                <option value="">-- Selecciona una Categoría --</option>
                                <?php foreach ($categoria as $cat): ?>
                                    <option value="<?= $cat->id_categoria ?>"><?= $cat->nombre ?></option>
                                <?php endforeach; ?>
                            </select>
                            <div class="invalid-feedback">
                                Por favor seleccione una categoría
                            </div>
                        </div>
                        
                        <div class="col-md-6 mb-3">
                            <label for="existencia_producto" class="form-label">
                                <i class="bi bi-hash"></i> Existencia Inicial *
                            </label>
                            <input type="number" 
                                   class="form-control" 
                                   id="existencia_producto" 
                                   name="existencia_producto" 
                                   placeholder="0"
                                   min="0"
                                   required>
                            <div class="invalid-feedback">
                                Por favor ingrese la existencia inicial
                            </div>
                        </div>
                        
                        <div class="col-md-6 mb-3">
                            <label for="estado_preview" class="form-label">
                                <i class="bi bi-check-circle"></i> Estado
                            </label>
                            <input type="text" 
                                   class="form-control" 
                                   value="Activo" 
                                   disabled>
                            <small class="form-text text-muted">Los productos nuevos se crean como activos por defecto</small>
                        </div>
                    </div>
                    
                    <div class="alert alert-info">
                        <i class="bi bi-info-circle"></i>
                        <strong>Nota:</strong> El producto se creará con estado activo. Podrás modificar el estado posteriormente desde la lista de productos.
                    </div>
                    
                    <div class="d-flex gap-2">
                        <button type="submit" class="btn btn-primary">
                            <i class="bi bi-save"></i> Guardar Producto
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