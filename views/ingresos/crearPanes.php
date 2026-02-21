<?php
$data['page_title'] = 'Registrar Ingreso de Mercancía';
$data['content'] = ob_get_clean();
ob_start();
?>

<div class="row">
    <div class="col-12">
        <div class="card shadow-sm">
            <div class="card-header bg-primary text-white">
                <h5 class="mb-0">
                    <i class="bi bi-arrow-down-circle"></i> Nuevo Ingreso de Productos
                </h5>
            </div>
            
            <div class="card-body">
                <form method="post" action="<?= base_url('IngresosPanesControl/guardar') ?>" id="formIngreso">
                    <!-- Información del ingreso -->
                    <div class="row mb-4">
                        <div class="col-md-6">
                            <div class="card bg-light">
                                <div class="card-body">
                                    <h6 class="card-title">
                                        <i class="bi bi-info-circle text-primary"></i> Información del Ingreso
                                    </h6>
                                    <?php
                                        // Configura tu zona horaria (ejemplo para Colombia)
                                        date_default_timezone_set('America/Bogota');
                                        ?>
                                    <p class="mb-1"><strong>Fecha:</strong> <?= date('d/m/Y') ?></p>
                                    <p class="mb-1"><strong>Usuario:</strong> <?= $this->session->userdata('usuario') ?></p>
                                    <p class="mb-0"><strong>Estado:</strong> <span class="badge bg-success">Activo</span></p>
                                </div>
                            </div>
                        </div>
                        
                        <div class="col-md-6">
                            <label class="form-label">
                                <i class="bi bi-truck"></i> Proveedor
                            </label>

                            <!-- Visible pero bloqueado -->
                            <input type="text"
                                class="form-control bg-light"
                                value="PRODUCTOS PROPIOS"
                                readonly>

                            <!-- Valor real enviado al controlador -->
                            <input type="hidden" name="proveedor" id="proveedor" value="1">
                        </div>

                    </div>
                    
                    <hr>
                    
                    <!-- Sección agregar productos -->
                    <h6 class="mb-3">
                        <i class="bi bi-plus-circle text-success"></i> Agregar Productos al Ingreso
                    </h6>
                    
                    <div class="row mb-3">
                        <div class="col-md-4">
                            <label for="producto" class="form-label">Producto</label>
                            <select id="producto" class="form-select">
                                <option value="">Seleccione producto...</option>
                                <?php foreach($productos as $prod): ?>
                                    <option value="<?= $prod->id_producto ?>"><?= $prod->nombre_producto ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                        
                        <div class="col-md-3">
                            <label for="cantidad" class="form-label">Cantidad</label>
                            <input type="number" id="cantidad" class="form-control" placeholder="0" min="1">
                        </div>
                        
                        
                        
                        <div class="col-md-2">
                            <label class="form-label">&nbsp;</label>
                            <button type="button" class="btn btn-success w-100" onclick="agregarFila()">
                                <i class="bi bi-plus-lg"></i> Agregar
                            </button>
                        </div>
                    </div>
                    
                    <!-- Tabla de productos agregados -->
                    <div class="table-responsive">
                        <table class="table table-bordered table-hover">
                            <thead class="table-dark">
                                <tr>
                                    <th>Producto</th>
                                    <th width="120">Cantidad</th>
                                    <th width="100">Acción</th>
                                </tr>
                            </thead>
                            <tbody id="detalle">
                                <tr id="emptyRow">
                                    <td colspan="5" class="text-center text-muted py-4">
                                        <i class="bi bi-inbox display-4 d-block mb-2 opacity-50"></i>
                                        No hay productos agregados al ingreso
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    
                    <!-- Resumen del ingreso -->
                    <div class="row mt-4">
                        <div class="col-md-8"></div>
                        <div class="col-md-4">
                            <div class="card bg-light">
                                <div class="card-body">
                                    <h6 class="card-title">Resumen del Ingreso</h6>
                                    <div class="d-flex justify-content-between">
                                        <span>Total productos:</span>
                                        <strong id="totalProductos">0</strong>
                                    </div>
                                    <div class="d-flex justify-content-between">
                                        <span>Total unidades:</span>
                                        <strong id="totalUnidades">0</strong>
                                    </div>
                                    
                                    
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <!-- Botones de acción -->
                    <div class="d-flex gap-2 mt-4">
                        <button type="submit" class="btn btn-primary" id="btnGuardar" disabled>
                            <i class="bi bi-save"></i> Guardar Ingreso
                        </button>
                        <a href="<?= base_url('MenuControl') ?>" class="btn btn-secondary">
                            <i class="bi bi-arrow-left"></i> Volver al Menú
                        </a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<script>

let contadorFilas = 0;

/* ===============================
   AGREGAR PRODUCTO A LA TABLA
=================================*/
function agregarFila() {

    let productoSelect = document.getElementById("producto");
    let producto = productoSelect.value;
    let productoText = productoSelect.options[productoSelect.selectedIndex].text;
    let cantidad = document.getElementById("cantidad").value;

    // Validaciones
    if (!producto) {
        alert("Por favor seleccione un producto");
        return;
    }

    if (!cantidad || cantidad <= 0) {
        alert("Por favor ingrese una cantidad válida");
        return;
    }

    // Evitar productos repetidos
    let filas = document.querySelectorAll('#detalle tr');
    for (let i = 0; i < filas.length; i++) {
        let inputProducto = filas[i].querySelector('input[name="producto[]"]');
        if (inputProducto && inputProducto.value == producto) {
            alert("Este producto ya está agregado al ingreso");
            return;
        }
    }

    // Ocultar fila vacía
    document.getElementById('emptyRow').style.display = 'none';

    // Crear nueva fila
    let tabla = document.getElementById("detalle");
    let nuevaFila = tabla.insertRow();

    nuevaFila.innerHTML = `
        <td>
            <input type="hidden" name="producto[]" value="${producto}">
            <div class="d-flex align-items-center">
                <i class="bi bi-basket text-warning me-2"></i>
                ${productoText}
            </div>
        </td>

        <td class="text-center">
            <input type="hidden" name="cantidad[]" value="${cantidad}">
            <span class="badge bg-light text-dark border">${cantidad}</span>
        </td>

        <td class="text-center">
            <button type="button"
                class="btn btn-outline-danger btn-sm"
                onclick="eliminarFila(this)"
                title="Eliminar producto">
                <i class="bi bi-trash"></i>
            </button>
        </td>
    `;

    // Limpiar campos
    document.getElementById("producto").value = "";
    document.getElementById("cantidad").value = "";

    contadorFilas++;

    actualizarResumen();

    // Habilitar botón guardar
    document.getElementById('btnGuardar').disabled = false;
}


/* ===============================
   ELIMINAR FILA
=================================*/
function eliminarFila(btn) {

    let fila = btn.closest('tr');
    fila.remove();

    contadorFilas--;

    if (contadorFilas === 0) {
        document.getElementById('emptyRow').style.display = '';
        document.getElementById('btnGuardar').disabled = true;
    }

    actualizarResumen();
}


/* ===============================
   ACTUALIZAR RESUMEN
=================================*/
function actualizarResumen() {

    let filas = document.querySelectorAll('#detalle tr:not(#emptyRow)');
    let totalProductos = filas.length;
    let totalUnidades = 0;

    filas.forEach(fila => {
        let cantidadInput = fila.querySelector('input[name="cantidad[]"]');

        if (cantidadInput) {
            totalUnidades += parseInt(cantidadInput.value);
        }
    });

    document.getElementById('totalProductos').textContent = totalProductos;
    document.getElementById('totalUnidades').textContent = totalUnidades;
}


/* ===============================
   VALIDACIÓN ANTES DE GUARDAR
=================================*/
document.getElementById('formIngreso').addEventListener('submit', function(e) {

    let proveedor = document.getElementById('proveedor').value;

    if (!proveedor) {
        e.preventDefault();
        alert('Proveedor no válido');
        return;
    }

    if (contadorFilas === 0) {
        e.preventDefault();
        alert('Debe agregar al menos un producto');
        return;
    }

    if (!confirm('¿Registrar producción? Esto actualizará el inventario.')) {
        e.preventDefault();
    }
});


/* ===============================
   ENTER PARA AGREGAR RÁPIDO
=================================*/
document.addEventListener('keypress', function(e) {
    if (e.key === 'Enter' && e.target.id === 'cantidad') {
        e.preventDefault();
        agregarFila();
    }
});


/* ===============================
   AUTOFOCUS
=================================*/
document.getElementById('producto').addEventListener('change', function() {
    if (this.value) {
        document.getElementById('cantidad').focus();
    }
});

</script>


<?php
$data['content'] = ob_get_contents();
ob_end_clean();
$this->load->view('layouts/main', $data);
?>