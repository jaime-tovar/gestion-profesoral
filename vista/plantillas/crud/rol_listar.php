<!-- ============================================================ -->
<!-- VISTA: Listado de rol                                       -->
<!-- Muestra una tabla con todos los términos clave de la BD.                  -->
<!-- $terminos es un array de objetos TerminoClave que viene de index.         -->
<!-- ============================================================ -->

<?php $titulo = 'Roles'; // Título que aparece en la barra superior ?>

<!-- card: componente "tarjeta" de Bootstrap -->
<div class="card">

    <!-- card-header: cabecera de la tarjeta -->
    <!-- d-flex justify-content-between: pone el título a la izquierda y el botón a la derecha -->
    <div class="card-header d-flex justify-content-between align-items-center">
        <span><i class="bi bi-hdd-network"></i> Listado de Roles</span>
        <!-- Botón para ir al formulario de crear nuevo rol -->
        <a href="index.php?ruta=rol&accion=crear" class="btn btn-light btn-sm">
            <i class="bi bi-plus-circle"></i> Agregar
        </a>
    </div>

    <!-- card-body: cuerpo de la tarjeta -->
    <div class="card-body">

        <!-- Si el array $terminos está vacío, mostramos un mensaje -->
        <?php if (empty($terminos)): ?>
            <p class="text-muted text-center py-3">No hay roles registrados.</p>
        <?php else: ?>

        <!-- table: tabla HTML con estilos de Bootstrap -->
        <!-- table-hover: las filas cambian de color al pasar el mouse -->
        <table class="table table-hover">
            <thead>
                <tr><th>Nombre</th><th>Descripción</th><th>Activo</th><th>Acciones</th></tr>
            </thead>
            <tbody>
            <?php foreach ($terminos as $t): ?>
            <tr>
                <td><?= $t->getNombre() ?></td>
                <td><?= $t->getDescripcion() ?></td>
                <td><?= $t->getActivo() == 1 ? 'Activo' : 'Inactivo' ?></td>
                <td>
                    <a href="index.php?ruta=rol&accion=editar&id=<?= $t->getId() ?>" class="btn btn-sm btn-warning">Editar</a>
                    <a href="index.php?ruta=rol&accion=eliminar&id=<?= $t->getId() ?>" class="btn btn-sm btn-danger" onclick="return confirm('¿Está seguro de que desea eliminar este rol?')">Eliminar</a>
                </td>
            </tr>
            <?php endforeach; ?>
            </tbody>
        </table>
        <?php endif; ?>
    </div>
</div>