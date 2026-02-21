<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="utf-8">
    <title>Login - Gestor</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light d-flex align-items-center justify-content-center vh-100">

<div class="card shadow p-4" style="width: 400px;">
    <h4 class="text-center mb-4 text-primary">
        <i class="fas fa-user-circle"></i> Iniciar sesión
    </h4>

    <?php if($this->session->flashdata('error')): ?>
        <div class="alert alert-danger text-center">
            <?php echo $this->session->flashdata('error'); ?>
        </div>
    <?php endif; ?>

    <form method="post" action="<?php echo base_url('login/autenticar'); ?>">
        <div class="mb-3">
            <label for="usuario" class="form-label">Usuario</label>
            <input type="text" class="form-control" id="usuario" name="usuario" required>
        </div>
        <div class="mb-3">
            <label for="contrasena" class="form-label">Contraseña</label>
            <input type="password" class="form-control" id="contrasena" name="contrasena" required>
        </div>
        <button type="submit" class="btn btn-primary w-100">Ingresar</button>
    </form>
</div>

<script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>
</body>
</html>
