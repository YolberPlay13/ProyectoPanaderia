<div class="container-fluid px-4">

    <!-- Título -->
    <div class="d-flex justify-content-between align-items-center my-4">
        <h1 class="h3 text-primary">
            <i class="fas fa-shopping-cart"></i> Ventas
        </h1>
        <a href="<?php echo base_url('ventas/nuevo');?>" class="btn btn-info text-white">
            <i class="fas fa-plus-circle"></i> Nueva venta
        </a>
    </div>

    <!-- Tabla -->
    <div class="card shadow-sm border-0">
        <div class="card-header bg-info text-white">
            <i class="fas fa-list"></i> Lista de Ventas
        </div>
        <div class="card-body">
            <table id="datatablesSimple" class="table table-hover table-bordered text-center align-middle">
                <thead class="table-info">
                    <tr>
                        <th>ID</th>
                        <th>Fecha</th>
                        <th>Cliente</th>
                        <th>Total</th>
                        <th>Estado</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if(!empty($ventas)): ?>
                        <?php foreach($ventas as $v): ?>
                            <tr>
                                <td><?php echo $v->id_venta; ?></td>
                                <td><?php echo $v->fecha_venta; ?></td>
                                <td><?php echo $v->nombre_cliente; ?></td>
                                <td><?php echo number_format($v->total_venta, 2); ?></td>
                                <td>
                                    <?php if ($v->estado_venta == 1): ?>
                                        <span class="badge bg-success"><i class="fas fa-check-circle"></i> Activa</span>
                                    <?php else: ?>
                                        <span class="badge bg-danger"><i class="fas fa-times-circle"></i> Anulada</span>
                                    <?php endif; ?>
                                </td>
                                <td>
                                    <a href="<?php echo base_url('ventas/eliminar/'.$v->id_venta);?>" 
                                       class="btn btn-danger btn-sm" onclick="return confirm('¿Eliminar venta?');">
                                        <i class="fas fa-trash"></i>
                                    </a>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    <?php else: ?>
                        <tr><td colspan="6">No hay ventas registradas</td></tr>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
