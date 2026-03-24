<!-- ============================================================ -->
<!-- VISTA: Formulario de usuario (Crear / Editar)          -->
<!-- Este formulario se usa tanto para CREAR como para EDITAR.    -->
<!-- La variable $accion ('crear' o 'editar') determina el modo.  -->
<!-- $usuario es null al crear, o un objeto Usuario al editar. -->
<!-- ============================================================ -->

<?php
// Operador ternario: condicion ? valor_si_true : valor_si_false
// Si $accion es 'crear', el título es "Crear usuario", sino "Editar usuario".
$titulo = ($accion === 'crear') ? 'Crear Usuario' : 'Editar Usuario';

// ?? es null coalescing: si $usuario no existe, la dejamos como null.
$usuario = $usuario ?? null;
?>

<!-- row y col-md-6 mx-auto: centra el formulario en la mitad de la pantalla -->
<div class="row"><div class="col-md-6 mx-auto">
<div class="card">
    <div class="card-header"><?= $titulo ?></div>

    <?php if (!empty($error)): ?>
        <div class="alert alert-danger"><?= $error ?></div>
    <?php endif; ?>
    <div class="card-body">
        <form method="POST">

            <!-- Si estamos editando, incluimos un campo oculto con el ID -->
            <?php if ($accion === 'editar'): ?>
                <input type="hidden" name="id" value="<?= $usuario ? $usuario->getId() : null ?>">
            <?php endif; ?>


            <div class="mb-3">
                <label class="form-label">Cod_User</label>
                <input type="text" class="form-control" name="username"
                       value="<?= $usuario ? $usuario->getUsername() : '' ?>" required>
            </div>

            <div class="mb-3">
                <label class="form-label">Email</label>
                <input type="email" class="form-control" name="email"
                       value="<?= $usuario ? $usuario->getEmail() : '' ?>"
                       pattern="^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$" required
                       title="Ingrese un email válido (ejemplo@dominio.com)">
            </div>

            <div class="mb-3">
                <label class="form-label">Nombre Completo</label>
                <input type="text" class="form-control" name="nombre_completo"
                       value="<?= $usuario ? $usuario->getNombreCompleto() : '' ?>" required>
            </div>

            <div class="mb-3">
                <label class="form-label">Contraseña</label>
                <input type="password" class="form-control" name="password" <?= $accion === 'crear' ? 'required' : '' ?> placeholder="<?= $accion === 'editar' ? 'Dejar en blanco para no cambiar' : '' ?>">
            </div>


            <div class="mb-3">
                <label class="form-label">Activo</label>
                <select class="form-control" name="activo" required>
                    <option value="1" <?= ($usuario && $usuario->getActivo() == 1) ? 'selected' : '' ?>>Activo</option>
                    <option value="0" <?= ($usuario && $usuario->getActivo() == 0) ? 'selected' : '' ?>>Inactivo</option>
                </select>
            </div>

            <button type="submit" class="btn btn-primary">Guardar</button>
            <a href="index.php?ruta=areaConocimiento" class="btn btn-secondary">Cancelar</a>
        </form>
    </div>
</div>
</div></div>