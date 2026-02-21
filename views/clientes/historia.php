<?php
$data['page_title'] = 'Gestión de Clientes';
$data['page_actions'] = '<a href="'.base_url('ClientesControl/crear').'" class="btn btn-primary"><i class="bi bi-plus-lg"></i> Nuevo Cliente</a>';
$data['content'] = ob_get_clean();
ob_start();
?>

<div class="card shadow-sm">
    <div class="card-header bg-white">
        <div class="row align-items-center">
            <div class="col">
                <h5 class="mb-0">
                    <i class="bi bi-people text-primary"></i> Lista de Clientes
                </h5>
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
                    <input type="text" class="form-control" id="searchCliente" placeholder="Buscar por nombre, cédula o contacto...">
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
            <table class="table table-hover align-middle" id="clientesTable">
                <thead class="table-dark">
                    <tr>
                        <th>Cliente</th>
                        <th>Contacto</th>
                        <th>Deuda</th>
                        <th>Estado</th>
                        <th width="180">Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if(!empty($clientes)): ?>
                        <?php foreach($clientes as $cli): ?>
                            <tr data-search="<?= strtolower($cli->nombres_apellidos_cliente . ' ' . $cli->cedula_cliente . ' ' . $cli->fecha_deuda . ' ' . $cli->deuda) ?>">
                                <td>
                                    <div class="d-flex align-items-center">
                                        <div class="bg-warning rounded-circle d-flex align-items-center justify-content-center me-3" style="width: 45px; height: 45px;">
                                            <i class="bi bi-person text-white"></i>
                                        </div>
                                        <div>
                                            <h6 class="mb-0"><?= $cli->nombres_apellidos_cliente ?></h6>
                                            <small class="text-muted">ID: <?= str_pad($cli->id_cliente, 4, '0', STR_PAD_LEFT) ?></small>
                                        </div>
                                    </div>
                                </td>
                                <td>
                                    <span class="badge bg-light text-dark border fs-6">
                                        <?= $cli->cedula_cliente ?>
                                    </span>
                                </td>
                                <td>
                                    <div class="small">
                                        <?php if(!empty($cli->telefono_cliente)): ?>
                                            <div class="mb-1">
                                                <i class="bi bi-telephone text-success"></i>
                                                <a href="tel:<?= $cli->telefono_cliente ?>" class="text-decoration-none">
                                                    <?= $cli->telefono_cliente ?>
                                                </a>
                                            </div>
                                        <?php endif; ?>
                                        <?php if(!empty($cli->correo_cliente)): ?>
                                            <div>
                                                <i class="bi bi-envelope text-primary"></i>
                                                <a href="mailto:<?= $cli->correo_cliente ?>" class="text-decoration-none">
                                                    <?= $cli->correo_cliente ?>
                                                </a>
                                            </div>
                                        <?php endif; ?>
                                        <?php if(empty($cli->telefono_cliente) && empty($cli->correo_cliente)): ?>
                                            <small class="text-muted">Sin deuda</small>
                                        <?php endif; ?>
                                    </div>
                                </td>
                                <td>
                                    <?php if($cli->estado_cliente == 1): ?>
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
                                        <a href="<?= base_url('ClientesControl/editar/'.$cli->id_cliente) ?>" 
                                           class="btn btn-outline-warning btn-sm" 
                                           title="Editar cliente">
                                            <i class="bi bi-pencil"></i>
                                        </a>
                                        <?php if($cli->estado_cliente == 1): ?>
                                            <button type="button" 
                                                    class="btn btn-outline-danger btn-sm" 
                                                    onclick="confirmarCambioEstado(<?= $cli->id_cliente ?>, '<?= addslashes($cli->nombres_apellidos_cliente) ?>', 'inactivar')" 
                                                    title="Inactivar cliente">
                                                <i class="bi bi-x-circle"></i>
                                            </button>
                                        <?php else: ?>
                                            <button type="button" 
                                                    class="btn btn-outline-success btn-sm" 
                                                    onclick="confirmarCambioEstado(<?= $cli->id_cliente ?>, '<?= addslashes($cli->nombres_apellidos_cliente) ?>', 'activar')" 
                                                    title="Activar cliente">
                                                <i class="bi bi-check-circle"></i>
                                            </button>
                                        <?php endif; ?>
                                        <a href="<?= base_url('ClientesControl/historia/'.$cli->id_cliente) ?>" 
                                           class="btn btn-outline-warning btn-sm" 
                                           title="Ver historico de deudas">
                                            <i class="bi bi-envelope text-primary"></i>
                                        </a>
                                        
                                    </div>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    <?php else: ?>
                        <tr>
                            <td colspan="5" class="text-center py-5">
                                <div class="text-muted">
                                    <i class="bi bi-people display-1 d-block mb-3 opacity-50"></i>
                                    <h5>No hay clientes registrados</h5>
                                    <p>Comienza agregando tu primer cliente.</p>
                                    <a href="<?= base_url('ClientesControl/crear') ?>" class="btn btn-primary">
                                        <i class="bi bi-plus-lg"></i> Agregar Primer Cliente
                                    </a>
                                </div>
                            </td>
                        </tr>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>

        <!-- Resumen -->
        <?php if(!empty($clientes)): ?>
        <div class="row mt-4">
            <div class="col-md-3">
                <div class="card text-center bg-light">
                    <div class="card-body">
                        <h5 class="text-warning"><?= count($clientes) ?></h5>
                        <small class="text-muted">Total Clientes</small>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card text-center bg-light">
                    <div class="card-body">
                        <h5 class="text-success">
                            <?= count(array_filter($clientes, function($c) { return $c->estado_cliente == 1; })) ?>
                        </h5>
                        <small class="text-muted">Activos</small>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card text-center bg-light">
                    <div class="card-body">
                        <h5 class="text-primary">
                            <?= count(array_filter($clientes, function($c) { return !empty($c->telefono_cliente); })) ?>
                        </h5>
                        <small class="text-muted">Con Teléfono</small>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card text-center bg-light">
                    <div class="card-body">
                        <h5 class="text-info">
                            <?= count(array_filter($clientes, function($c) { return !empty($c->correo_cliente); })) ?>
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
                <p class="fw-bold text-primary" id="clienteName"></p>
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
function confirmarCambioEstado(id, nombre, accion) {
    const modal = new bootstrap.Modal(document.getElementById('confirmActionModal'));
    const confirmBtn = document.getElementById('confirmActionBtn');
    const modalTitle = document.getElementById('modalTitle');
    const modalMessage = document.getElementById('modalMessage');
    const clienteNameElement = document.getElementById('clienteName');
    
    if(accion === 'inactivar') {
        modalTitle.innerHTML = '<i class="bi bi-exclamation-triangle text-warning"></i> Inactivar Cliente';
        modalMessage.textContent = '¿Estás seguro de que deseas inactivar el cliente:';
        confirmBtn.className = 'btn btn-danger';
        confirmBtn.innerHTML = '<i class="bi bi-x-circle"></i> Inactivar';
        
        confirmBtn.onclick = function() {
            window.location.href = '<?= base_url("ClientesControl/cambiar_estado/") ?>' + id + '/1';
        };
    } else {
        modalTitle.innerHTML = '<i class="bi bi-check-circle text-success"></i> Activar Cliente';
        modalMessage.textContent = '¿Estás seguro de que deseas activar el cliente:';
        confirmBtn.className = 'btn btn-success';
        confirmBtn.innerHTML = '<i class="bi bi-check-circle"></i> Activar';
        
        confirmBtn.onclick = function() {
            window.location.href = '<?= base_url("ClientesControl/cambiar_estado/") ?>' + id + '/0';
        };
    }
    
    clienteNameElement.textContent = nombre;
    modal.show();
}

function clearSearch() {
    document.getElementById('searchCliente').value = '';
    filterClientes();
}

function filterClientes() {
    const searchTerm = document.getElementById('searchCliente').value.toLowerCase();
    const tableRows = document.querySelectorAll('#clientesTable tbody tr');
    
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
document.getElementById('searchCliente').addEventListener('keyup', filterClientes);
</script>

<?php
$data['content'] = ob_get_contents();
ob_end_clean();
$this->load->view('layouts/main', $data);
?>