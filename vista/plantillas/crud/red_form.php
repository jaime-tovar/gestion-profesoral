<!-- ============================================================ -->
<!-- VISTA: Formulario de red (Crear / Editar)          -->
<!-- Este formulario se usa tanto para CREAR como para EDITAR.    -->
<!-- La variable $accion ('crear' o 'editar') determina el modo.  -->
<!-- $red es null al crear, o un objeto Red al editar. -->
<!-- ============================================================ -->

<?php
// Operador ternario: condicion ? valor_si_true : valor_si_false
// Si $accion es 'crear', el título es "Crear red", sino "Editar red".
$titulo = ($accion === 'crear') ? 'Crear Red' : 'Editar Red';

// ?? es null coalescing: si $red no existe, la dejamos como null.
$red = $red ?? null;
?>

<!-- row y col-md-6 mx-auto: centra el formulario en la mitad de la pantalla -->
<div class="row"><div class="col-md-6 mx-auto">
<div class="card">
    <div class="card-header"><?= $titulo ?></div>
    <div class="card-body">
        <form method="POST">

            <!-- Si estamos editando, incluimos un campo oculto con el ID -->
            <?php if ($accion === 'editar'): ?>
                <input type="hidden" name="id" value="<?= $red ? $red->getId() : null ?>">
            <?php endif; ?>


            <div class="mb-3">
                <label class="form-label">Nombre</label>
                <input type="text" class="form-control" name="nombre"
                       value="<?= $red ? $red->getNombre() : '' ?>" required>
            </div>

            <div class="mb-3">
                <label class="form-label">URL</label>
                <input type="text" class="form-control" name="url"
                       value="<?= $red ? $red->getUrl() : '' ?>" required>
            </div>

            <div class="mb-3">
                <label class="form-label">País</label>
                <input type="text" class="form-control" name="pais"
                       value="<?= $red ? $red->getPais() : '' ?>" required>
            </div>

            <button type="submit" class="btn btn-primary">Guardar</button>
            <a href="index.php?ruta=red" class="btn btn-secondary">Cancelar</a>
        </form>
    </div>
</div>
</div></div>