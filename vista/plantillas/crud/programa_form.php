<!-- ============================================================ -->
<!-- VISTA: Formulario de programa (Crear / Editar)          -->
<!-- Este formulario se usa tanto para CREAR como para EDITAR.    -->
<!-- La variable $accion ('crear' o 'editar') determina el modo.  -->
<!-- $programa es null al crear, o un objeto Programa al editar. -->
<!-- ============================================================ -->

<?php
// Operador ternario: condicion ? valor_si_true : valor_si_false
// Si $accion es 'crear', el título es "Crear Programa", sino "Editar Programa".
$titulo = ($accion === 'crear') ? 'Crear Programa' : 'Editar Programa';

// ?? es null coalescing: si $programa no existe, la dejamos como null.
$programa = $programa ?? null;
?>

<!-- row y col-md-6 mx-auto: centra el formulario en la mitad de la pantalla -->
<div class="row"><div class="col-md-6 mx-auto">
<div class="card">
    <div class="card-header"><?= $titulo ?></div>
    <div class="card-body">
        <form method="POST">

            <!-- Si estamos editando, incluimos un campo oculto con el ID -->
            <?php if ($accion === 'editar'): ?>
                <input type="hidden" name="id" value="<?= $programa ? $programa->getId() : null ?>">
            <?php endif; ?>




            <div class="row">
                <div class="col-md-6 mb-3">
                    <label class="form-label">Nombre</label>
                    <input type="text" class="form-control" name="nombre"
                           value="<?= $programa ? $programa->getNombre() : '' ?>" required>
                </div>
                <div class="col-md-6 mb-3">
                    <label class="form-label">Tipo</label>
                    <input type="text" class="form-control" name="tipo"
                           value="<?= $programa ? $programa->getTipo() : '' ?>" required>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6 mb-3">
                    <label class="form-label">Nivel</label>
                    <input type="text" class="form-control" name="nivel"
                           value="<?= $programa ? $programa->getNivel() : '' ?>" required>
                </div>
                <div class="col-md-6 mb-3">
                    <label class="form-label">Fecha de Cierre</label>
                    <input type="date" class="form-control" name="fecha_cierre"
                           value="<?= $programa && $programa->getFechaCierre() ? $programa->getFechaCierre()->format('Y-m-d') : '' ?>">
                </div>
            </div>
            <div class="row">
                <div class="col-md-6 mb-3">
                    <label class="form-label">Número de Cohortes</label>
                    <input type="number" class="form-control" name="numero_cohortes"
                           value="<?= $programa ? $programa->getNumeroCohortes() : '' ?>" required>
                </div>
                <div class="col-md-6 mb-3">
                    <label class="form-label">Cantidad de Graduados</label>
                    <input type="number" class="form-control" name="cant_graduados"
                           value="<?= $programa ? $programa->getCantGraduados() : '' ?>" required>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6 mb-3">
                    <label class="form-label">Ciudad</label>
                    <input type="text" class="form-control" name="ciudad"
                           value="<?= $programa ? $programa->getCiudad() : '' ?>" required>
                </div>
                <div class="col-md-6 mb-3">
                    <label class="form-label">Facultad (ID)</label>
                    <input type="number" class="form-control" name="facultad"
                           value="<?= $programa ? $programa->getFacultad() : '' ?>" required>
                </div>
            </div>

            <button type="submit" class="btn btn-primary">Guardar</button>
            <a href="index.php?ruta=Programa" class="btn btn-secondary">Cancelar</a>
        </form>
    </div>
</div>
</div></div>