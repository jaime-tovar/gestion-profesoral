<!-- ============================================================ -->
<!-- VISTA: Listado de red                                        -->
<!-- Muestra una tabla con todos los términos clave de la BD.                  -->
<!-- $terminos es un array de objetos TerminoClave que viene de index.         -->
<!-- ============================================================ -->

<?php $titulo = 'Redes'; // Título que aparece en la barra superior ?>

<!-- card: componente "tarjeta" de Bootstrap -->
<div class="card">

    <!-- card-header: cabecera de la tarjeta -->
    <!-- d-flex justify-content-between: pone el título a la izquierda y el botón a la derecha -->
    <div class="card-header d-flex justify-content-between align-items-center">
        <span><i class="bi bi-hdd-network"></i> Listado de Redes</span>
        <!-- Botón para ir al formulario de crear nueva red -->
        <a href="index.php?ruta=red&accion=crear" class="btn btn-light btn-sm">
            <i class="bi bi-plus-circle"></i> Agregar
        </a>
    </div>

    <!-- card-body: cuerpo de la tarjeta -->
    <div class="card-body">

        <!-- Si el array $terminos está vacío, mostramos un mensaje -->
        <?php if (empty($terminos)): ?>
            <p class="text-muted text-center py-3">No hay redes registradas.</p>
        <?php else: ?>

        <!-- table: tabla HTML con estilos de Bootstrap -->
        <!-- table-hover: las filas cambian de color al pasar el mouse -->
        <table class="table table-hover">
            <thead>
                <tr><th>Nombre</th><th>URL</th><th>País</th><th>Acciones</th></tr>
            </thead>
            <tbody>
            <?php foreach ($terminos as $t): ?>
            <tr>
                <td><?= $t->getNombre() ?></td>
                <td><?= $t->getUrl() ?></td>
                <td><?= $t->getPais() ?></td>
                <td>
                    <a href="index.php?ruta=red&accion=editar&id=<?= $t->getId() ?>" class="btn btn-sm btn-warning">Editar</a>
                    <a href="index.php?ruta=red&accion=eliminar&id=<?= $t->getId() ?>" class="btn btn-sm btn-danger" onclick="return confirm('¿Está seguro de que desea eliminar esta red?')">Eliminar</a>
                </td>
            </tr>
            <?php endforeach; ?>
            </tbody>
        </table>
        <?php endif; ?>
    </div>
</div>