<?php
$data['page_title'] = 'Gestión de Productos';
$data['page_actions'] = '<a href="'.base_url('ProductosControl/crear').'" class="btn btn-primary"><i class="bi bi-plus-lg"></i> Nuevo Producto</a>';
$data['content'] = ob_get_clean();
ob_start();
?>

<div class="card shadow-sm">
    <div class="card-header bg-white">
        <div class="row align-items-center">
            <div class="col">
                <h5 class="mb-0">
                    <i class="bi bi-box text-primary"></i> Lista de Productos
                </h5>
            </div>
            <div class="col-auto">
                <span class="badge bg-primary"><?= count($productos) ?> productos</span>
            </div>
        </div>
    </div>
    
    <div class="card-body">

        <!-- Filtros -->
        <div class="row mb-4">
            <div class="col-md-3">
                <div class="input-group">
                    <span class="input-group-text">
                        <i class="bi bi-search"></i>
                    </span>
                    <input type="text" class="form-control" id="searchProduct" placeholder="Buscar producto por nombre...">
                </div>
            </div>

            <div class="col-md-3">
                <select class="form-select" id="filterStock">
                    <option value="">Todos los niveles</option>
                    <option value="bajo">Stock bajo (≤ 10)</option>
                    <option value="medio">Stock medio (11-50)</option>
                    <option value="alto">Stock alto (> 50)</option>
                </select>
            </div>

            <!-- ✅ FILTRO CATEGORIA CORREGIDO -->
            <div class="col-md-3">
                <select class="form-select" id="filterCategory"> 
                    <option value="">Todas las categorías</option>
                    <?php foreach($categoria as $cat): ?>
                        <option value="<?= $cat->id_categoria ?>">
                            <?= $cat->nombre ?>
                        </option>
                    <?php endforeach; ?>
                </select>
            </div>
            
            <div class="col-md-3">
                <button class="btn btn-outline-secondary w-100" onclick="clearFilters()">
                    <i class="bi bi-arrow-clockwise"></i> Limpiar filtros
                </button>
            </div>
        </div>

        <!-- Alertas de stock -->
        <?php 
        $productos_bajo_stock = array_filter($productos, function($p){ 
            return $p->existencia_producto <= 10; 
        });
        if (!empty($productos_bajo_stock)): 
        ?>
        <div class="alert alert-warning alert-dismissible fade show">
            <i class="bi bi-exclamation-triangle"></i>
            <strong>¡Atención!</strong> Tienes <?= count($productos_bajo_stock) ?> producto(s) con stock bajo.
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        </div>
        <?php endif; ?>

        <!-- Tabla -->
        <div class="table-responsive">
            <table class="table table-hover align-middle" id="productosTable">
                <thead class="table-dark">
                    <tr>
                        <th>ID</th>
                        <th>Nombre del Producto</th>
                        <th>Categoria</th>
                        <th>Existencia</th>
                        <th>Estado</th>
                        <th width="200">Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if(!empty($productos)): ?>
                        <?php foreach($productos as $producto): ?>
                            
                            <!-- ✅ SE AGREGA data-category -->
                            <tr 
                                data-product-name="<?= strtolower($producto->nombre_producto) ?>" 
                                data-stock="<?= $producto->existencia_producto ?>"
                                data-category="<?= $producto->categoria_id ?>"
                            >

                                <td>
                                    <span class="badge bg-light text-dark">#<?= $producto->id_producto ?></span>
                                </td>

                                <td>
                                    <div class="d-flex align-items-center">
                                        <div class="bg-primary rounded-circle d-flex align-items-center justify-content-center me-3" style="width:40px;height:40px;">
                                            <i class="bi bi-box text-white"></i>
                                        </div>
                                        <div>
                                            <h6 class="mb-0"><?= $producto->nombre_producto ?></h6>
                                            <small class="text-muted">
                                                Código: PRD-<?= str_pad($producto->id_producto,4,'0',STR_PAD_LEFT) ?>
                                            </small>
                                        </div>
                                    </div>
                                </td>

                                <td>
                                    <?php foreach($categoria as $cat): ?>
                                        <?php if ($cat->id_categoria == $producto->categoria_id): ?>
                                            <span class="badge bg-info text-dark"><?= $cat->nombre; ?></span>
                                        <?php endif; ?>
                                    <?php endforeach; ?>
                                </td>

                                <td>
                                    <?php if($producto->existencia_producto <= 10): ?>
                                        <span class="badge bg-danger fs-6"><?= $producto->existencia_producto ?></span>
                                        <br><small class="text-danger fw-bold">Stock crítico</small>
                                    <?php elseif($producto->existencia_producto <= 50): ?>
                                        <span class="badge bg-warning text-dark fs-6"><?= $producto->existencia_producto ?></span>
                                        <br><small class="text-warning">Stock medio</small>
                                    <?php else: ?>
                                        <span class="badge bg-success fs-6"><?= $producto->existencia_producto ?></span>
                                        <br><small class="text-success">Stock óptimo</small>
                                    <?php endif; ?>
                                </td>

                                <td>
                                    <?php if($producto->estado_producto == 1): ?>
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
                                    <div class="btn-group">
                                        <a href="<?= base_url('ProductosControl/editar/'.$producto->id_producto) ?>" 
                                           class="btn btn-outline-warning btn-sm">
                                            <i class="bi bi-pencil"></i>
                                        </a>
                                        <button class="btn btn-outline-danger btn-sm"
                                            onclick="confirmarEliminacion(<?= $producto->id_producto ?>,'<?= addslashes($producto->nombre_producto) ?>')">
                                            <i class="bi bi-trash"></i>
                                        </button>
                                    </div>
                                </td>

                            </tr>
                        <?php endforeach; ?>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<!-- MODAL -->
<div class="modal fade" id="confirmDeleteModal">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">
                    <i class="bi bi-exclamation-triangle text-warning"></i> Confirmar Eliminación
                </h5>
                <button class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body">
                <p>¿Eliminar producto?</p>
                <p class="fw-bold text-primary" id="productName"></p>
            </div>
            <div class="modal-footer">
                <button class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                <button class="btn btn-danger" id="confirmDeleteBtn">
                    <i class="bi bi-trash"></i> Eliminar
                </button>
            </div>
        </div>
    </div>
</div>

<script>

function confirmarEliminacion(id,nombre){
    const modal=new bootstrap.Modal(document.getElementById('confirmDeleteModal'));
    document.getElementById('productName').textContent=nombre;

    document.getElementById('confirmDeleteBtn').onclick=function(){
        window.location.href='<?= base_url("ProductosControl/eliminar/") ?>'+id;
    };

    modal.show();
}

function clearFilters(){
    document.getElementById('searchProduct').value='';
    document.getElementById('filterStock').value='';
    document.getElementById('filterCategory').value='';
    filterProducts();
}

function filterProducts(){

    const searchTerm=document.getElementById('searchProduct').value.toLowerCase();
    const stockFilter=document.getElementById('filterStock').value;
    const categoryFilter=document.getElementById('filterCategory').value;

    const rows=document.querySelectorAll('#productosTable tbody tr');

    rows.forEach(row=>{

        const productName=row.getAttribute('data-product-name')||'';
        const stock=parseInt(row.getAttribute('data-stock'))||0;
        const category=row.getAttribute('data-category')||'';

        let show=true;

        if(searchTerm && !productName.includes(searchTerm)) show=false;

        if(stockFilter){
            if(stockFilter==='bajo' && stock>10) show=false;
            if(stockFilter==='medio' && (stock<=10||stock>50)) show=false;
            if(stockFilter==='alto' && stock<=50) show=false;
        }

        if(categoryFilter && category!==categoryFilter) show=false;

        row.style.display=show?'':'none';
    });
}

// EVENTOS
document.getElementById('searchProduct').addEventListener('keyup',filterProducts);
document.getElementById('filterStock').addEventListener('change',filterProducts);
document.getElementById('filterCategory').addEventListener('change',filterProducts);

</script>

<?php
$data['content']=ob_get_contents();
ob_end_clean();
$this->load->view('layouts/main',$data);
?>
