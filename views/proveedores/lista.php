<?php
$data['page_title'] = 'Gestión de Proveedores';
$data['page_actions'] = '<a href="'.base_url('ProveedoresControl/crear').'" class="btn btn-primary"><i class="bi bi-plus-lg"></i> Nuevo Proveedor</a>';
$data['content'] = ob_get_clean();
ob_start();
?>

<div class="card shadow-sm">
    <div class="card-header bg-white">
        <div class="row align-items-center">
            <div class="col">
                <h5 class="mb-0">
                    <i class="bi bi-truck text-primary"></i> Lista de Proveedores
                </h5>
            </div>
            <div class="col-auto">
                <span class="badge bg-info"><?= count($proveedores) ?> proveedores</span>
            </div>
        </div>
    </div>
    
    <div class="card-body">
        <!-- Filtro de búsqueda -->
        <div class="row mb-4">
            <div class="col-md-8">
                <div class="input-group">
                    <span class="input-group-text">
                        <i class="bi bi-search"></i>
                    </span>
                    <input type="text" class="form-control" id="searchProveedor" placeholder="Buscar por nombre, NIT o contacto...">
                </div>
            </div>
            <div class="col-md-4">
                <button class="btn btn-outline-secondary w-100" onclick="clearSearch()">
                    <i class="bi bi-arrow-clockwise"></i> Limpiar búsqueda
                </button>
            </div>
        </div>

        <!-- Tabla responsive -->
        <div class="table-responsive">
            <table class="table table-hover align-middle" id="proveedoresTable">
                <thead class="table-dark">
                    <tr>
                        <th>Proveedor</th>
                        <th>Contacto</th>
                        <th>NIT</th>
                        <th>Estado</th>
                        <th width="180">Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if(!empty($proveedores)): ?>
                        <?php foreach($proveedores as $prov): ?>
                            <tr data-search="<?= strtolower($prov->nombre_proveedor . ' ' . $prov->nit_proveedor . ' ' . $prov->telefono_proveedor . ' ' . $prov->correo_proveedor) ?>">
                                <td>
                                    <div class="d-flex align-items-center">
                                        <div class="bg-info rounded-circle d-flex align-items-center justify-content-center me-3" style="width: 45px; height: 45px;">
                                            <i class="bi bi-building text-white"></i>
                                        </div>
                                        <div>
                                            <h6 class="mb-0"><?= $prov->nombre_proveedor ?></h6>
                                            <small class="text-muted">ID: <?= str_pad($prov->id_proveedor, 4, '0', STR_PAD_LEFT) ?></small>
                                        </div>
                                    </div>
                                </td>
                                <td>
                                    <div class="small">
                                        <?php if(!empty($prov->telefono_proveedor)): ?>
                                            <div class="mb-1">
                                                <i class="bi bi-telephone text-success"></i>
                                                <a href="tel:<?= $prov->telefono_proveedor ?>" class="text-decoration-none">
                                                    <?= $prov->telefono_proveedor ?>
                                                </a>
                                            </div>
                                        <?php endif; ?>
                                        <?php if(!empty($prov->correo_proveedor)): ?>
                                            <div>
                                                <i class="bi bi-envelope text-primary"></i>
                                                <a href="mailto:<?= $prov->correo_proveedor ?>" class="text-decoration-none">
                                                    <?= $prov->correo_proveedor ?>
                                                </a>
                                            </div>
                                        <?php else: ?>
                                            <small class="text-muted">Sin información de contacto</small>
                                        <?php endif; ?>
                                    </div>
                                </td>
                                <td>
                                    <span class="badge bg-light text-dark border">
                                        <?= $prov->nit_proveedor ?>
                                    </span>
                                </td>
                                <td>
                                    <?php if($prov->estado_proveedor == 1): ?>
                                        <span class="badge bg-success">
                                            <i class="bi bi-check-circle"></i> Activo
                                        </span>
                                    <?php else: ?>
                                        <span class="badge bg-secondary">
                                            <i class="bi bi-x-circle"></i> Inactivo
                                        </span>
                                    <?php endif; ?>
                                </td>
                                <td>
                                    <div class="btn-group" role="group">
                                        <a href="<?= base_url('ProveedoresControl/editar/'.$prov->id_proveedor) ?>" 
                                           class="btn btn-outline-warning btn-sm" 
                                           title="Editar proveedor">
                                            <i class="bi bi-pencil"></i>
                                        </a>
                                        <?php if($prov->estado_proveedor == 1): ?>
                                            <button type="button" 
                                                    class="btn btn-outline-danger btn-sm" 
                                                    onclick="confirmarInactivacion(<?= $prov->id_proveedor ?>, '<?= addslashes($prov->nombre_proveedor) ?>')" 
                                                    title="Inactivar proveedor">
                                                <i class="bi bi-x-circle"></i>
                                            </button>
                                        <?php else: ?>
                                            <button type="button" 
                                                    class="btn btn-outline-success btn-sm" 
                                                    onclick="confirmarActivacion(<?= $prov->id_proveedor ?>, '<?= addslashes($prov->nombre_proveedor) ?>')" 
                                                    title="Activar proveedor">
                                                <i class="bi bi-check-circle"></i>
                                            </button>
                                        <?php endif; ?>
                                    </div>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    <?php else: ?>
                        <tr>
                            <td colspan="5" class="text-center py-5">
                                <div class="text-muted">
                                    <i class="bi bi-truck display-1 d-block mb-3 opacity-50"></i>
                                    <h5>No hay proveedores registrados</h5>
                                    <p>Comienza agregando tu primer proveedor.</p>
                                    <a href="<?= base_url('ProveedoresControl/crear') ?>" class="btn btn-primary">
                                        <i class="bi bi-plus-lg"></i> Agregar Primer Proveedor
                                    </a>
                                </div>
                            </td>
                        </tr>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>

        <!-- Resumen -->
        <?php if(!empty($proveedores)): ?>
        <div class="row mt-4">
            <div class="col-md-4">
                <div class="card text-center bg-light">
                    <div class="card-body">
                        <h5 class="text-info"><?= count($proveedores) ?></h5>
                        <small class="text-muted">Total Proveedores Activos</small>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card text-center bg-light">
                    <div class="card-body">
                        <h5 class="text-success">
                            <?= count(array_filter($proveedores, function($p) { return !empty($p->telefono_proveedor); })) ?>
                        </h5>
                        <small class="text-muted">Con Teléfono</small>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card text-center bg-light">
                    <div class="card-body">
                        <h5 class="text-primary">
                            <?= count(array_filter($proveedores, function($p) { return !empty($p->correo_proveedor); })) ?>
                        </h5>
                        <small class="text-muted">Con Email</small>
                    </div>
                </div>
            </div>
        </div>
        <?php endif; ?>
    </div>
</div>

<!-- Modal de confirmación -->
<div class="modal fade" id="confirmActionModal" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalTitle">Confirmar Acción</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body">
                <p id="modalMessage"></p>
                <p class="fw-bold text-primary" id="proveedorName"></p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
                    <i class="bi bi-x-lg"></i> Cancelar
                </button>
                <button type="button" class="btn" id="confirmActionBtn">
                    Confirmar
                </button>
            </div>
        </div>
    </div>
</div>

<script>
function confirmarInactivacion(id, nombre) {
    const modal = new bootstrap.Modal(document.getElementById('confirmActionModal'));
    const confirmBtn = document.getElementById('confirmActionBtn');
    const modalTitle = document.getElementById('modalTitle');
    const modalMessage = document.getElementById('modalMessage');
    const proveedorNameElement = document.getElementById('proveedorName');
    
    modalTitle.innerHTML = '<i class="bi bi-exclamation-triangle text-warning"></i> Inactivar Proveedor';
    modalMessage.textContent = '¿Estás seguro de que deseas inactivar el proveedor:';
    proveedorNameElement.textContent = nombre;
    
    confirmBtn.className = 'btn btn-danger';
    confirmBtn.innerHTML = '<i class="bi bi-x-circle"></i> Inactivar';
    
    confirmBtn.onclick = function() {
        window.location.href = '<?= base_url("ProveedoresControl/cambiar_estado/") ?>' + id;
    };
    
    modal.show();
}

function confirmarActivacion(id, nombre) {
    const modal = new bootstrap.Modal(document.getElementById('confirmActionModal'));
    const confirmBtn = document.getElementById('confirmActionBtn');
    const modalTitle = document.getElementById('modalTitle');
    const modalMessage = document.getElementById('modalMessage');
    const proveedorNameElement = document.getElementById('proveedorName');
    
    modalTitle.innerHTML = '<i class="bi bi-check-circle text-success"></i> Activar Proveedor';
    modalMessage.textContent = '¿Estás seguro de que deseas activar el proveedor:';
    proveedorNameElement.textContent = nombre;
    
    confirmBtn.className = 'btn btn-success';
    confirmBtn.innerHTML = '<i class="bi bi-check-circle"></i> Activar';
    
    confirmBtn.onclick = function() {
        // Aquí necesitarías crear un método para activar en tu controlador
        alert('Función de activar pendiente de implementar en el controlador');
    };
    
    modal.show();
}

function clearSearch() {
    document.getElementById('searchProveedor').value = '';
    filterProveedores();
}

function filterProveedores() {
    const searchTerm = document.getElementById('searchProveedor').value.toLowerCase();
    const tableRows = document.querySelectorAll('#proveedoresTable tbody tr');
    
    tableRows.forEach(row => {
        const searchData = row.getAttribute('data-search') || '';
        
        if (searchTerm === '' || searchData.includes(searchTerm)) {
            row.style.display = '';
        } else {
            row.style.display = 'none';
        }
    });
}

// Event listener para búsqueda
document.getElementById('searchProveedor').addEventListener('keyup', filterProveedores);
</script>

<?php
$data['content'] = ob_get_contents();
ob_end_clean();
$this->load->view('layouts/main', $data);
?>
