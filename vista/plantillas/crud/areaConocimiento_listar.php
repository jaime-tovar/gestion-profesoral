<!-- ============================================================ -->
<!-- VISTA: Listado de Areas de Conocimiento                                   -->
<!-- Muestra una tabla con todas las áreas de conocimiento de la BD.           -->
<!-- $areas es un array de objetos AreaConocimiento que viene de index. -->
<!-- ============================================================ -->

<?php $titulo = 'Áreas de Conocimiento'; // Título que aparece en la barra superior ?>

<!-- card: componente "tarjeta" de Bootstrap -->
<div class="card">

    <!-- card-header: cabecera de la tarjeta -->
    <!-- d-flex justify-content-between: pone el título a la izquierda y el botón a la derecha -->
    <div class="card-header d-flex justify-content-between align-items-center">
        <span><i class="bi bi-geo-alt"></i> Listado de Áreas de Conocimiento</span>
        <!-- Botón para ir al formulario de crear nueva área de conocimiento -->
        <a href="index.php?ruta=areaConocimiento&accion=crear" class="btn btn-light btn-sm">
            <i class="bi bi-plus-circle"></i> Agregar
        </a>
    </div>

    <!-- card-body: cuerpo de la tarjeta -->
    <div class="card-body">

        <!-- Si el array $areas está vacío, mostramos un mensaje -->
        <?php if (empty($areas)): ?>
            <p class="text-muted text-center py-3">No hay áreas de conocimiento registradas.</p>
        <?php else: ?>

        <!-- table: tabla HTML con estilos de Bootstrap -->
        <!-- table-hover: las filas cambian de color al pasar el mouse -->
        <table class="table table-hover">
            <thead> <!-- Cabecera de la tabla -->
                <tr><th>Gran Área</th><th>Área</th><th>Disciplina</th><th>Acciones</th></tr>
            </thead>
            <tbody> <!-- Cuerpo de la tabla -->

            <!-- foreach recorre cada objeto AreaConocimiento del array $areas -->
            <!-- $a es un objeto AreaConocimiento, accedemos a sus datos con getters -->
            <?php foreach ($areas as $a): ?>
            <tr>
                <td><?= $a->getGranArea() ?></td>   <!-- Imprime la gran área -->
                <td><?= $a->getArea() ?></td>      <!-- Imprime el área -->
                <td><?= $a->getDisciplina() ?></td> <!-- Imprime la disciplina -->
                <td>
                    <!-- Botón Editar: lleva al formulario con los datos cargados -->
                    <!-- &id= envía el código del área de conocimiento a editar -->
                    <a href="index.php?ruta=areaConocimiento&accion=editar&id=<?= $a->getId() ?>" class="btn btn-sm btn-warning">Editar</a>

                    <!-- Botón Eliminar: lleva a la acción eliminar -->
                    <!-- onclick="return confirm(...)" muestra un cuadro de confirmación -->
                    <a href="index.php?ruta=areaConocimiento&accion=eliminar&id=<?= $a->getId() ?>" class="btn btn-sm btn-danger" onclick="return confirm('¿Está seguro de que desea eliminar esta área de conocimiento?')">Eliminar</a>
                </td>
            </tr>
            <?php endforeach; ?>

            </tbody>
        </table>
        <?php endif; ?>
    </div>
</div>