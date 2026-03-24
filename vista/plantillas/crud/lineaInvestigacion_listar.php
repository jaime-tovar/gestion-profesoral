<!-- ============================================================ -->
<!-- VISTA: Listado de Términos Clave                                         -->
<!-- Muestra una tabla con todos los términos clave de la BD.                  -->
<!-- $terminos es un array de objetos TerminoClave que viene de index.         -->
<!-- ============================================================ -->

<?php $titulo = 'Linea Investigacion'; // Título que aparece en la barra superior ?>

<!-- card: componente "tarjeta" de Bootstrap -->
<div class="card">

    <!-- card-header: cabecera de la tarjeta -->
    <!-- d-flex justify-content-between: pone el título a la izquierda y el botón a la derecha -->
    <div class="card-header d-flex justify-content-between align-items-center">
        <span><i class="bi bi-diagram-3"></i> Listado de Lineas de Investigacion</span>
        <!-- Botón para ir al formulario de crear nueva línea de investigación -->
        <a href="index.php?ruta=lineaInvestigacion&accion=crear" class="btn btn-light btn-sm">
            <i class="bi bi-plus-circle"></i> Agregar
        </a>
    </div>

    <!-- card-body: cuerpo de la tarjeta -->
    <div class="card-body">

        <!-- Si el array $lineas está vacío, mostramos un mensaje -->
        <?php if (empty($lineas)): ?>
            <p class="text-muted text-center py-3">No hay lineas de investigación registradas.</p>
        <?php else: ?>

        <!-- table: tabla HTML con estilos de Bootstrap -->
        <!-- table-hover: las filas cambian de color al pasar el mouse -->
        <table class="table table-hover">
            <thead>
                <tr><th>Nombre</th><th>Descripción</th><th>Fecha de Creación</th><th>Acciones</th></tr>
            </thead>
            <tbody>
            <?php foreach ($lineas as $l): ?>
            <tr>
                <td><?= $l->getNombre() ?></td>
                <td><?= $l->getDescripcion() ?></td>
                <td><?= $l->getFechaCreacion() ? $l->getFechaCreacion()->format('d/m/Y') : 'N/A' ?></td>
                <td>
                    <a href="index.php?ruta=lineaInvestigacion&accion=editar&id=<?= $l->getId() ?>" class="btn btn-sm btn-warning">Editar</a>
                    <a href="index.php?ruta=lineaInvestigacion&accion=eliminar&id=<?= $l->getId() ?>" class="btn btn-sm btn-danger" onclick="return confirm('¿Está seguro de que desea eliminar esta línea de investigación?')">Eliminar</a>
                </td>
            </tr>
            <?php endforeach; ?>
            </tbody>
        </table>
        <?php endif; ?>
    </div>
</div>