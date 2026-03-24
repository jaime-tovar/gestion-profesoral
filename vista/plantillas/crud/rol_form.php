<!-- ============================================================ -->
<!-- VISTA: Formulario de rol (Crear / Editar)          -->
<!-- Este formulario se usa tanto para CREAR como para EDITAR.    -->
<!-- La variable $accion ('crear' o 'editar') determina el modo.  -->
<!-- $rol es null al crear, o un objeto Rol al editar. -->
<!-- ============================================================ -->

<?php
// Operador ternario: condicion ? valor_si_true : valor_si_false
// Si $accion es 'crear', el título es "Crear rol", sino "Editar rol".
$titulo = ($accion === 'crear') ? 'Crear Rol' : 'Editar Rol';

// ?? es null coalescing: si $rol no existe, la dejamos como null.
$rol = $rol ?? null;
?>

<!-- row y col-md-6 mx-auto: centra el formulario en la mitad de la pantalla -->
<div class="row"><div class="col-md-6 mx-auto">
<div class="card">
    <div class="card-header"><?= $titulo ?></div>
    <div class="card-body">
        <form method="POST">

            <!-- Si estamos editando, incluimos un campo oculto con el ID -->
            <?php if ($accion === 'editar'): ?>
                <input type="hidden" name="id" value="<?= $rol ? $rol->getId() : null ?>">
            <?php endif; ?>


            <div class="mb-3">
                <label class="form-label">Nombre</label>
                <input type="text" class="form-control" name="nombre"
                       value="<?= $rol ? $rol->getNombre() : '' ?>" required>
            </div>

            <div class="mb-3">
                <label class="form-label">Descripción</label>
                <input type="text" class="form-control" name="descripcion"
                       value="<?= $rol ? $rol->getDescripcion() : '' ?>" required>
            </div>


            <div class="mb-3">
                <label class="form-label">Activo</label>
                <select class="form-control" name="activo" required>
                    <option value="1" <?= ($rol && $rol->getActivo() == 1) ? 'selected' : '' ?>>Activo</option>
                    <option value="0" <?= ($rol && $rol->getActivo() == 0) ? 'selected' : '' ?>>Inactivo</option>
                </select>
            </div>

            <button type="submit" class="btn btn-primary">Guardar</button>
            <a href="index.php?ruta=areaConocimiento" class="btn btn-secondary">Cancelar</a>
        </form>
    </div>
</div>
</div></div>