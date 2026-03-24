<!-- ============================================================ -->
<!-- VISTA: Listado de Programas                                 -->
<!-- Muestra una tabla con todos los programas de la BD.         -->
<!-- $programas es un array de objetos Programa que viene de index. -->
<!-- ============================================================ -->

<?php $titulo = 'Programas'; // Título que aparece en la barra superior ?>

<!-- card: componente "tarjeta" de Bootstrap -->
<div class="card">

    <!-- card-header: cabecera de la tarjeta -->
    <!-- d-flex justify-content-between: pone el título a la izquierda y el botón a la derecha -->
    <div class="card-header d-flex justify-content-between align-items-center">
        <span><i class="bi bi-journal-bookmark"></i> Listado de Programas</span>
        <!-- Botón para ir al formulario de crear nuevo programa -->
        <a href="index.php?ruta=Programa&accion=crear" class="btn btn-light btn-sm">
            <i class="bi bi-plus-circle"></i> Agregar
        </a>
    </div>

    <!-- card-body: cuerpo de la tarjeta -->
    <div class="card-body">

        <!-- Si el array $programas está vacío, mostramos un mensaje -->
        <?php if (empty($programas)): ?>
            <p class="text-muted text-center py-3">No hay programas registrados.</p>
        <?php else: ?>

        <table class="table table-hover">
            <thead>
                <tr>
                    <th>Nombre</th>
                    <th>Tipo</th>
                    <th>Nivel</th>
                    <th>Fecha de Cierre</th>
                    <th>N° Cohortes</th>
                    <th>Cant. Graduados</th>
                    <th>Ciudad</th>
                    <th>Facultad</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
            <?php foreach ($programas as $p): ?>
            <tr>
                <td><?= $p->getNombre() ?></td>
                <td><?= $p->getTipo() ?></td>
                <td><?= $p->getNivel() ?></td>
                <td><?= $p->getFechaCierre() ? $p->getFechaCierre()->format('d/m/Y') : 'N/A' ?></td>
                <td><?= $p->getNumeroCohortes() ?></td>
                <td><?= $p->getCantGraduados() ?></td>
                <td><?= $p->getCiudad() ?></td>
                <td><?= $p->getFacultad() ?></td>
                <td>
                    <a href="index.php?ruta=Programa&accion=editar&id=<?= $p->getId() ?>" class="btn btn-sm btn-warning">Editar</a>
                    <a href="index.php?ruta=Programa&accion=eliminar&id=<?= $p->getId() ?>" class="btn btn-sm btn-danger" onclick="return confirm('¿Está seguro de que desea eliminar este programa?')">Eliminar</a>
                </td>
            </tr>
            <?php endforeach; ?>
            </tbody>
        </table>
        <?php endif; ?>
    </div>
</div>