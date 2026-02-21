<div class="container-fluid px-4">

    <!-- Título -->
    <div class="d-flex justify-content-between align-items-center my-4">
        <h1 class="h3 text-primary">
            <i class="fas fa-truck"></i> Proveedores
        </h1>
        <a href="<?php echo base_url('proveedores/nuevo');?>" class="btn btn-info text-white">
            <i class="fas fa-plus-circle"></i> Nuevo proveedor
        </a>
    </div>

    <!-- Tabla -->
    <div class="card shadow-sm border-0">
        <div class="card-header bg-info text-white">
            <i class="fas fa-list"></i> Lista de Proveedores
        </div>
        <div class="card-body">
            <table id="datatablesSimple" class="table table-hover table-bordered text-center align-middle">
                <thead class="table-info">
                    <tr>
                        <th>ID</th>
                        <th>NIT</th>
                        <th>Nombre</th>
                        <th>Teléfono</th>
                        <th>Correo</th>
                        <th>Estado</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if (!empty($proveedores)): ?>
                        <?php foreach ($proveedores as $prov): ?>
                            <tr>
                                <td><?php echo $prov->id_proveedor; ?></td>
                                <td><?php echo $prov->nit_proveedor; ?></td>
                                <td><?php echo $prov->nombre_proveedor; ?></td>
                                <td><?php echo $prov->telefono_proveedor; ?></td>
                                <td><?php echo $prov->correo_proveedor; ?></td>
                                <td>
                                    <?php if ($prov->estado_proveedor == 1): ?>
                                        <span class="badge bg-success">
                                            <i class="fas fa-check-circle"></i> Activo
                                        </span>
                                    <?php else: ?>
                                        <span class="badge bg-danger">
                                            <i class="fas fa-times-circle"></i> Inactivo
                                        </span>
                                    <?php endif; ?>
                                </td>
                                <td>
                                    <!-- Editar -->
                                    <a href="<?php echo base_url('proveedores/editar/'.$prov->id_proveedor);?>" 
                                       class="btn btn-warning btn-sm text-white" title="Editar">
                                        <i class="fas fa-edit"></i>
                                    </a>

                                    <!-- Eliminar -->
                                    <a href="<?php echo base_url('proveedores/eliminar/'.$prov->id_proveedor);?>" 
                                       class="btn btn-danger btn-sm" title="Eliminar"
                                       onclick="return confirm('¿Seguro de eliminar este proveedor?');">
                                        <i class="fas fa-trash"></i>
                                    </a>

                                    <!-- Activar/Inactivar -->
                                    <?php if ($prov->estado_proveedor == 1): ?>
                                        <a href="<?php echo base_url('proveedores/cambiar_estado/'.$prov->id_proveedor.'/0');?>" 
                                           class="btn btn-secondary btn-sm" title="Inactivar">
                                            <i class="fas fa-ban"></i>
                                        </a>
                                    <?php else: ?>
                                        <a href="<?php echo base_url('proveedores/cambiar_estado/'.$prov->id_proveedor.'/1');?>" 
                                           class="btn btn-success btn-sm" title="Activar">
                                            <i class="fas fa-check"></i>
                                        </a>
                                    <?php endif; ?>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    <?php else: ?>
                        <tr><td colspan="7">No hay proveedores</td></tr>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>
    </div>

</div>
