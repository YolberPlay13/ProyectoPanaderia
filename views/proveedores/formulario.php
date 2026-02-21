<?php
$data['page_title'] = isset($proveedor) ? 'Editar Proveedor' : 'Nuevo Proveedor';
$data['content'] = ob_get_clean();
ob_start();
?>

<div class="row justify-content-center">
    <div class="col-lg-8">
        <div class="card shadow-sm">
            <div class="card-header <?= isset($proveedor) ? 'bg-warning text-dark' : 'bg-info text-white' ?>">
                <h5 class="mb-0">
                    <?php if(isset($proveedor)): ?>
                        <i class="bi bi-pencil-square"></i> Editar Proveedor
                    <?php else: ?>
                        <i class="bi bi-truck"></i> Registrar Nuevo Proveedor
                    <?php endif; ?>
                </h5>
            </div>
            
            <div class="card-body">
                <?php if(isset($proveedor)): ?>
                <!-- Información actual del proveedor -->
                <div class="alert alert-light border mb-4">
                    <div class="d-flex align-items-center">
                        <div class="bg-info rounded-circle d-flex align-items-center justify-content-center me-3" style="width: 50px; height: 50px;">
                            <i class="bi bi-building text-white"></i>
                        </div>
                        <div>
                            <h6 class="mb-1">Proveedor Actual</h6>
                            <p class="mb-0">ID: #<?= $proveedor->id_proveedor ?> | Estado: 
                                <span class="badge <?= $proveedor->estado_proveedor ? 'bg-success' : 'bg-secondary' ?>">
                                    <?= $proveedor->estado_proveedor ? 'Activo' : 'Inactivo' ?>
                                </span>
                            </p>
                        </div>
                    </div>
                </div>
                <?php endif; ?>
                
                <form method="post" 
                      action="<?= isset($proveedor) ? base_url('ProveedoresControl/actualizar/'.$proveedor->id_proveedor) : base_url('ProveedoresControl/guardar') ?>" 
                      class="needs-validation" 
                      novalidate>
                    
                    <div class="row">
                        <!-- NIT -->
                        <div class="col-md-6 mb-3">
                            <label for="nit_proveedor" class="form-label">
                                <i class="bi bi-card-text"></i> NIT *
                            </label>
                            <input type="text" 
                                   class="form-control" 
                                   id="nit_proveedor" 
                                   name="nit_proveedor" 
                                   value="<?= isset($proveedor) ? $proveedor->nit_proveedor : '' ?>"
                                   placeholder="Número de identificación tributaria"
                                   required>
                            <div class="invalid-feedback">
                                Por favor ingrese el NIT del proveedor
                            </div>
                        </div>
                        
                        <!-- Nombre -->
                        <div class="col-md-6 mb-3">
                            <label for="nombre_proveedor" class="form-label">
                                <i class="bi bi-building"></i> Nombre de la Empresa *
                            </label>
                            <input type="text" 
                                   class="form-control" 
                                   id="nombre_proveedor" 
                                   name="nombre_proveedor" 
                                   value="<?= isset($proveedor) ? $proveedor->nombre_proveedor : '' ?>"
                                   placeholder="Razón social o nombre comercial"
                                   required>
                            <div class="invalid-feedback">
                                Por favor ingrese el nombre del proveedor
                            </div>
                        </div>
                        
                        <!-- Teléfono -->
                        <div class="col-md-6 mb-3">
                            <label for="telefono_proveedor" class="form-label">
                                <i class="bi bi-telephone"></i> Teléfono
                            </label>
                            <input type="tel" 
                                   class="form-control" 
                                   id="telefono_proveedor" 
                                   name="telefono_proveedor" 
                                   value="<?= isset($proveedor) ? $proveedor->telefono_proveedor : '' ?>"
                                   placeholder="Número de contacto">
                            <div class="form-text">
                                Opcional: Número principal de contacto
                            </div>
                        </div>
                        
                        <!-- Correo -->
                        <div class="col-md-6 mb-3">
                            <label for="correo_proveedor" class="form-label">
                                <i class="bi bi-envelope"></i> Correo Electrónico
                            </label>
                            <input type="email" 
                                   class="form-control" 
                                   id="correo_proveedor" 
                                   name="correo_proveedor" 
                                   value="<?= isset($proveedor) ? $proveedor->correo_proveedor : '' ?>"
                                   placeholder="correo@empresa.com">
                            <div class="form-text">
                                Opcional: Email para comunicaciones comerciales
                            </div>
                        </div>
                        
                        <?php if(isset($proveedor)): ?>
                        <!-- Estado (solo para editar) -->
                        <div class="col-md-12 mb-3">
                            <label for="estado_proveedor" class="form-label">
                                <i class="bi bi-toggle-on"></i> Estado del Proveedor
                            </label>
                            <select class="form-select" name="estado_proveedor" id="estado_proveedor">
                                <option value="1" <?= $proveedor->estado_proveedor ? 'selected' : '' ?>>
                                    Activo - Puede recibir órdenes de compra
                                </option>
                                <option value="0" <?= !$proveedor->estado_proveedor ? 'selected' : '' ?>>
                                    Inactivo - Suspendido temporalmente
                                </option>
                            </select>
                        </div>
                        <?php endif; ?>
                    </div>
                    
                    <!-- Vista previa de la información -->
                    <div class="card bg-light mb-3">
                        <div class="card-header">
                            <h6 class="mb-0"><i class="bi bi-eye"></i> Vista Previa</h6>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-6">
                                    <p class="mb-1"><strong>Empresa:</strong> <span id="preview_nombre">-</span></p>
                                    <p class="mb-0"><strong>NIT:</strong> <span id="preview_nit">-</span></p>
                                </div>
                                <div class="col-md-6">
                                    <p class="mb-1"><strong>Teléfono:</strong> <span id="preview_telefono">-</span></p>
                                    <p class="mb-0"><strong>Email:</strong> <span id="preview_correo">-</span></p>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <!-- Información adicional -->
                    <div class="alert alert-info">
                        <i class="bi bi-info-circle"></i>
                        <strong>Información:</strong>
                        <?php if(isset($proveedor)): ?>
                            Los cambios se aplicarán inmediatamente al actualizar el proveedor. Los ingresos anteriores no se verán afectados.
                        <?php else: ?>
                            El proveedor se creará con estado activo por defecto. Los campos de contacto son opcionales pero recomendados para futuras comunicaciones.
                        <?php endif; ?>
                    </div>
                    
                    <!-- Botones -->
                    <div class="d-flex gap-2">
                        <button type="submit" class="btn <?= isset($proveedor) ? 'btn-warning' : 'btn-info' ?>">
                            <i class="bi bi-save"></i> 
                            <?= isset($proveedor) ? 'Actualizar Proveedor' : 'Guardar Proveedor' ?>
                        </button>
                        <a href="<?= base_url('ProveedoresControl') ?>" class="btn btn-secondary">
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

// Actualizar vista previa en tiempo real
function actualizarVistaPrevia() {
    document.getElementById('preview_nombre').textContent = 
        document.getElementById('nombre_proveedor').value || '-';
    document.getElementById('preview_nit').textContent = 
        document.getElementById('nit_proveedor').value || '-';
    document.getElementById('preview_telefono').textContent = 
        document.getElementById('telefono_proveedor').value || '-';
    document.getElementById('preview_correo').textContent = 
        document.getElementById('correo_proveedor').value || '-';
}

// Event listeners para actualizar vista previa
document.getElementById('nombre_proveedor').addEventListener('input', actualizarVistaPrevia);
document.getElementById('nit_proveedor').addEventListener('input', actualizarVistaPrevia);
document.getElementById('telefono_proveedor').addEventListener('input', actualizarVistaPrevia);
document.getElementById('correo_proveedor').addEventListener('input', actualizarVistaPrevia);

// Formatear NIT mientras se escribe
document.getElementById('nit_proveedor').addEventListener('input', function(e) {
    // Solo permitir números y guiones
    this.value = this.value.replace(/[^0-9\-]/g, '');
});

// Formatear teléfono mientras se escribe
document.getElementById('telefono_proveedor').addEventListener('input', function(e) {
    // Solo permitir números, espacios, guiones y paréntesis
    this.value = this.value.replace(/[^0-9\s\-\(\)]/g, '');
});

// Convertir nombre a formato título
document.getElementById('nombre_proveedor').addEventListener('blur', function(e) {
    this.value = this.value.toLowerCase().replace(/\b\w/g, function(char) {
        return char.toUpperCase();
    });
    actualizarVistaPrevia();
});

// Inicializar vista previa si estamos editando
document.addEventListener('DOMContentLoaded', function() {
    actualizarVistaPrevia();
});
</script>

<?php
$data['content'] = ob_get_contents();
ob_end_clean();
$this->load->view('layouts/main', $data);
?>