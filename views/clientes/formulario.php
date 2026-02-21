<?php
$data['page_title'] = isset($cliente) ? 'Editar Cliente' : 'Nuevo Cliente';
$data['content'] = ob_get_clean();
ob_start();
?>

<div class="row justify-content-center">
    <div class="col-lg-8">
        <div class="card shadow-sm">
            <div class="card-header <?= isset($cliente) ? 'bg-warning text-dark' : 'bg-primary text-white' ?>">
                <h5 class="mb-0">
                    <?php if(isset($cliente)): ?>
                        <i class="bi bi-pencil-square"></i> Editar Cliente
                    <?php else: ?>
                        <i class="bi bi-person-plus"></i> Registrar Nuevo Cliente
                    <?php endif; ?>
                </h5>
            </div>
            
            <div class="card-body">
                <?php if(isset($cliente)): ?>
                <!-- Información actual del cliente -->
                <div class="alert alert-light border mb-4">
                    <div class="d-flex align-items-center">
                        <div class="bg-warning rounded-circle d-flex align-items-center justify-content-center me-3" style="width: 50px; height: 50px;">
                            <i class="bi bi-person text-white"></i>
                        </div>
                        <div>
                            <h6 class="mb-1">Cliente Actual</h6>
                            <p class="mb-0">ID: #<?= $cliente->id_cliente ?> | Estado: 
                                <span class="badge <?= $cliente->estado_cliente ? 'bg-success' : 'bg-secondary' ?>">
                                    <?= $cliente->estado_cliente ? 'Activo' : 'Inactivo' ?>
                                </span>
                            </p>
                        </div>
                    </div>
                </div>
                <?php endif; ?>
                
                <form method="post" 
                      action="<?= isset($cliente) ? base_url('ClientesControl/actualizar/'.$cliente->id_cliente) : base_url('ClientesControl/guardar') ?>" 
                      class="needs-validation" 
                      novalidate>
                    
                    <div class="row">
                        <!-- Cédula -->
                        <div class="col-md-6 mb-3">
                            <label for="cedula_cliente" class="form-label">
                                <i class="bi bi-card-text"></i> Cédula *
                            </label>
                            <input type="text" 
                                   class="form-control" 
                                   id="cedula_cliente" 
                                   name="cedula_cliente" 
                                   value="<?= isset($cliente) ? $cliente->cedula_cliente : '' ?>"
                                   placeholder="Número de cédula"
                                   required>
                            <div class="invalid-feedback">
                                Por favor ingrese la cédula del cliente
                            </div>
                        </div>
                        
                        <!-- Nombres y Apellidos -->
                        <div class="col-md-6 mb-3">
                            <label for="nombres_apellidos_cliente" class="form-label">
                                <i class="bi bi-person"></i> Nombres y Apellidos *
                            </label>
                            <input type="text" 
                                   class="form-control" 
                                   id="nombres_apellidos_cliente" 
                                   name="nombres_apellidos_cliente" 
                                   value="<?= isset($cliente) ? $cliente->nombres_apellidos_cliente : '' ?>"
                                   placeholder="Nombres y apellidos completos"
                                   required>
                            <div class="invalid-feedback">
                                Por favor ingrese los nombres y apellidos
                            </div>
                        </div>
                        
                        <!-- Teléfono -->
                        <div class="col-md-6 mb-3">
                            <label for="telefono_cliente" class="form-label">
                                <i class="bi bi-telephone"></i> Teléfono
                            </label>
                            <input type="tel" 
                                   class="form-control" 
                                   id="telefono_cliente" 
                                   name="telefono_cliente" 
                                   value="<?= isset($cliente) ? $cliente->telefono_cliente : '' ?>"
                                   placeholder="Número de teléfono">
                            <div class="form-text">
                                Opcional: Número de contacto del cliente
                            </div>
                        </div>
                        
                        <!-- Correo -->
                        <div class="col-md-6 mb-3">
                            <label for="correo_cliente" class="form-label">
                                <i class="bi bi-envelope"></i> Correo Electrónico
                            </label>
                            <input type="email" 
                                   class="form-control" 
                                   id="correo_cliente" 
                                   name="correo_cliente" 
                                   value="<?= isset($cliente) ? $cliente->correo_cliente : '' ?>"
                                   placeholder="correo@ejemplo.com">
                            <div class="form-text">
                                Opcional: Email para comunicaciones
                            </div>
                        </div>
                        
                        <?php if(isset($cliente)): ?>
                        <!-- Estado (solo para editar) -->
                        <div class="col-md-12 mb-3">
                            <label for="estado_cliente" class="form-label">
                                <i class="bi bi-toggle-on"></i> Estado del Cliente
                            </label>
                            <select class="form-select" name="estado_cliente" id="estado_cliente">
                                <option value="1" <?= $cliente->estado_cliente ? 'selected' : '' ?>>
                                    Activo - El cliente puede realizar transacciones
                                </option>
                                <option value="0" <?= !$cliente->estado_cliente ? 'selected' : '' ?>>
                                    Inactivo - El cliente está deshabilitado
                                </option>
                            </select>
                        </div>
                        <?php endif; ?>
                    </div>
                    
                    <!-- Información adicional -->
                    <div class="alert alert-info">
                        <i class="bi bi-info-circle"></i>
                        <strong>Información:</strong>
                        <?php if(isset($cliente)): ?>
                            Los cambios se aplicarán inmediatamente al actualizar el cliente.
                        <?php else: ?>
                            El cliente se creará con estado activo por defecto. Los campos de teléfono y correo son opcionales pero recomendados para futuras comunicaciones.
                        <?php endif; ?>
                    </div>
                    
                    <!-- Botones -->
                    <div class="d-flex gap-2">
                        <button type="submit" class="btn <?= isset($cliente) ? 'btn-warning' : 'btn-primary' ?>">
                            <i class="bi bi-save"></i> 
                            <?= isset($cliente) ? 'Actualizar Cliente' : 'Guardar Cliente' ?>
                        </button>
                        <a href="<?= base_url('ClientesControl') ?>" class="btn btn-secondary">
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

// Formatear cédula mientras se escribe
document.getElementById('cedula_cliente').addEventListener('input', function(e) {
    // Solo permitir números
    this.value = this.value.replace(/[^0-9]/g, '');
});

// Formatear teléfono mientras se escribe
document.getElementById('telefono_cliente').addEventListener('input', function(e) {
    // Solo permitir números, espacios, guiones y paréntesis
    this.value = this.value.replace(/[^0-9\s\-\(\)]/g, '');
});

// Convertir nombres a formato título
document.getElementById('nombres_apellidos_cliente').addEventListener('blur', function(e) {
    this.value = this.value.toLowerCase().replace(/\b\w/g, function(char) {
        return char.toUpperCase();
    });
});
</script>

<?php
$data['content'] = ob_get_contents();
ob_end_clean();
$this->load->view('layouts/main', $data);
?>