<!-- ============================================================ -->
<!-- VISTA: Formulario de Termino Clave (Crear / Editar)          -->
<!-- Este formulario se usa tanto para CREAR como para EDITAR.    -->
<!-- La variable $accion ('crear' o 'editar') determina el modo.  -->
<!-- $terminoClave es null al crear, o un objeto TerminoClave al editar. -->
<!-- ============================================================ -->

<?php
// Operador ternario: condicion ? valor_si_true : valor_si_false
// Si $accion es 'crear', el título es "Crear Linea Investigacion", sino "Editar Linea Investigacion".
$titulo = ($accion === 'crear') ? 'Crear Linea Investigacion' : 'Editar Linea Investigacion';

// ?? es null coalescing: si $lineaInvestigacion no existe, la dejamos como null.
$lineaInvestigacion = $lineaInvestigacion ?? null;
?>

<!-- row y col-md-6 mx-auto: centra el formulario en la mitad de la pantalla -->
<div class="row"><div class="col-md-6 mx-auto">
<div class="card">
    <div class="card-header"><?= $titulo ?></div>
    <div class="card-body">
        <form method="POST">

            <!-- Si estamos editando, incluimos un campo oculto con el ID -->
            <?php if ($accion === 'editar'): ?>
                <input type="hidden" name="id" value="<?= $lineaInvestigacion ? $lineaInvestigacion->getId() : null ?>">
            <?php endif; ?>


            <div class="mb-3">
                <label class="form-label">Nombre</label>
                <input type="text" class="form-control" name="nombre"
                       value="<?= $lineaInvestigacion ? $lineaInvestigacion->getNombre() : '' ?>" required>
            </div>

            <div class="mb-3">
                <label class="form-label">Descripción</label>
                <input type="text" class="form-control" name="descripcion"
                       value="<?= $lineaInvestigacion ? $lineaInvestigacion->getDescripcion() : '' ?>" required>
            </div>

            <button type="submit" class="btn btn-primary">Guardar</button>
            <a href="index.php?ruta=lineaInvestigacion" class="btn btn-secondary">Cancelar</a>
        </form>
    </div>
</div>
</div></div>