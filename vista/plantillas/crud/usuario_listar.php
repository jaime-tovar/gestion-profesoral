<!-- ============================================================ -->
<!-- VISTA: Listado de usuario                                       -->
<!-- Muestra una tabla con todos los usuarios de la BD.                  -->
<!-- $usuarios es un array de objetos Usuario que viene de index.         -->
<!-- ============================================================ -->

<?php $titulo = 'Usuarios'; // Título que aparece en la barra superior ?>

<!-- card: componente "tarjeta" de Bootstrap -->
<div class="card">

    <!-- card-header: cabecera de la tarjeta -->
    <!-- d-flex justify-content-between: pone el título a la izquierda y el botón a la derecha -->
    <div class="card-header d-flex justify-content-between align-items-center">
        <span><i class="bi bi-hdd-network"></i> Listado de Usuarios</span>
        <!-- Botón para ir al formulario de crear nuevo usuario -->
        <a href="index.php?ruta=usuario&accion=crear" class="btn btn-light btn-sm">
            <i class="bi bi-plus-circle"></i> Agregar
        </a>
    </div>

    <!-- card-body: cuerpo de la tarjeta -->
    <div class="card-body">

        <!-- Si el array $usuarios está vacío, mostramos un mensaje -->
        <?php if (empty($usuarios)): ?>
            <p class="text-muted text-center py-3">No hay usuarios registrados.</p>
        <?php else: ?>

        <!-- table: tabla HTML con estilos de Bootstrap -->
        <!-- table-hover: las filas cambian de color al pasar el mouse -->
        <table class="table table-hover">
            <thead>
                <tr><th>Nombre de Usuario</th><th>Nombre Completo</th><th>Email</th><th>Activo</th><th>Fecha de Creación</th><th>Acciones</th></tr>
            </thead>
            <tbody>
            <?php foreach ($usuarios as $u): ?>
            <tr>
                <td><?= $u->getUsername() ?></td>
                <td><?= $u->getNombreCompleto() ?></td>
                <td><?= $u->getEmail() ?></td>
                <td><?= $u->getActivo() == 1 ? 'Activo' : 'Inactivo' ?></td>
                <td><?= $u->getFechaCreacion() ? $u->getFechaCreacion()->format('d/m/Y') : 'N/A' ?></td>
                <td>
                    <a href="index.php?ruta=usuario&accion=editar&id=<?= $u->getId() ?>" class="btn btn-sm btn-warning">Editar</a>
                    <a href="index.php?ruta=usuario&accion=eliminar&id=<?= $u->getId() ?>" class="btn btn-sm btn-danger" onclick="return confirm('¿Está seguro de que desea eliminar este usuario?')">Eliminar</a>
                </td>
            </tr>
            <?php endforeach; ?>
            </tbody>
        </table>
        <?php endif; ?>
    </div>
</div>  