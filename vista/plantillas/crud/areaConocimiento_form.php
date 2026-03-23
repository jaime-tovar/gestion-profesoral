<!-- ============================================================ -->
<!-- VISTA: Formulario de Area de Conocimiento (Crear / Editar)                -->
<!-- Este formulario se usa tanto para CREAR como para EDITAR.    -->
<!-- La variable $accion ('crear' o 'editar') determina el modo.  -->
<!-- $area es null al crear, o un objeto AreaConocimiento al editar.    -->
<!-- ============================================================ -->

<?php
// Operador ternario: condicion ? valor_si_true : valor_si_false
// Si $accion es 'crear', el título es "Crear Área de Conocimiento", sino "Editar Área de Conocimiento".
$titulo = ($accion === 'crear') ? 'Crear Área de Conocimiento' : 'Editar Área de Conocimiento';

// ?? es null coalescing: si $area no existe, la dejamos como null.
$area = $area ?? null;
?>

<!-- row y col-md-6 mx-auto: centra el formulario en la mitad de la pantalla -->
<div class="row"><div class="col-md-6 mx-auto">
<div class="card">
    <div class="card-header"><?= $titulo ?></div>
    <div class="card-body">
        <form method="POST">

            <!-- Si estamos editando, incluimos un campo oculto con el ID -->
            <?php if ($accion === 'editar'): ?>
                <input type="hidden" name="id" value="<?= $area ? $area->getId() : null ?>">
            <?php endif; ?>

            <div class="mb-3">
                <label class="form-label">Gran Area</label>
                <input type="text" class="form-control" name="gran_area"
                       value="<?= $area ? $area->getGranArea() : '' ?>" required>
            </div>

            <div class="mb-3">
                <label class="form-label">Area</label>
                <input type="text" class="form-control" name="area"
                       value="<?= $area ? $area->getArea() : '' ?>" required>
            </div>

            <div class="mb-3">
                <label class="form-label">Disciplina</label>
                <input type="text" class="form-control" name="disciplina"
                       value="<?= $area ? $area->getDisciplina() : '' ?>" required>
            </div>

            <button type="submit" class="btn btn-primary">Guardar</button>
            <a href="index.php?ruta=areaConocimiento" class="btn btn-secondary">Cancelar</a>
        </form>
    </div>
</div>
</div></div>