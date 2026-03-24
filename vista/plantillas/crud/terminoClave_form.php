<!-- ============================================================ -->
<!-- VISTA: Formulario de Termino Clave (Crear / Editar)          -->
<!-- Este formulario se usa tanto para CREAR como para EDITAR.    -->
<!-- La variable $accion ('crear' o 'editar') determina el modo.  -->
<!-- $terminoClave es null al crear, o un objeto TerminoClave al editar. -->
<!-- ============================================================ -->

<?php
// Operador ternario: condicion ? valor_si_true : valor_si_false
// Si $accion es 'crear', el título es "Crear termino clave", sino "Editar termino clave".
$titulo = ($accion === 'crear') ? 'Crear Termino Clave' : 'Editar Termino Clave';

// ?? es null coalescing: si $terminoClave no existe, la dejamos como null.
$terminoClave = $terminoClave ?? null;
?>

<!-- row y col-md-6 mx-auto: centra el formulario en la mitad de la pantalla -->
<div class="row"><div class="col-md-6 mx-auto">
<div class="card">
    <div class="card-header"><?= $titulo ?></div>
    <div class="card-body">
        <form method="POST">

            <!-- Si estamos editando, incluimos un campo oculto con el ID -->
            <?php if ($accion === 'editar'): ?>
                <input type="hidden" name="id" value="<?= $terminoClave ? $terminoClave->getId() : null ?>">
            <?php endif; ?>


            <div class="mb-3">
                <label class="form-label">Término Clave</label>
                <input type="text" class="form-control" name="termino"
                       value="<?= $terminoClave ? $terminoClave->getTermino() : '' ?>" required>
            </div>

            <div class="mb-3">
                <label class="form-label">Término en Inglés</label>
                <input type="text" class="form-control" name="termino_ingles"
                       value="<?= $terminoClave ? $terminoClave->getTerminoIngles() : '' ?>" required>
            </div>

            <button type="submit" class="btn btn-primary">Guardar</button>
            <a href="index.php?ruta=terminoClave" class="btn btn-secondary">Cancelar</a>
        </form>
    </div>
</div>
</div></div>