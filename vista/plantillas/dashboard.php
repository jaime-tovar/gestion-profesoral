<?php
$titulo = 'Inicio';
?>

<div class="row g-4 mb-4">
    <div class="col-md-4">
        <div class="card text-center p-4">
            <div class="display-4 text-primary mb-2"><i class="bi bi-geo-alt"></i></div>
            <h3><?= $stats['areaConocimiento'] ?></h3>
            <p class="text-muted mb-2">Áreas de Conocimiento</p>
            <a href="index.php?ruta=areaConocimiento" class="btn btn-outline-primary btn-sm">Ver más</a>
        </div>
    </div>
    <div class="col-md-4">
        <div class="card text-center p-4">
            <div class="display-4 text-primary mb-2"><i class="bi bi-key"></i></div>
            <h3><?= $stats['terminoClave'] ?? 0 ?></h3>
            <p class="text-muted mb-2">Términos Clave</p>
            <a href="index.php?ruta=terminoClave" class="btn btn-outline-primary btn-sm">Ver más</a>
        </div>
    </div>
    <div class="col-md-4">
        <div class="card text-center p-4">
            <div class="display-4 text-primary mb-2"><i class="bi bi-key"></i></div>
            <h3><?= $stats['lineaInvestigacion'] ?? 0 ?></h3>
            <p class="text-muted mb-2">Líneas de Investigación</p>
            <a href="index.php?ruta=lineaInvestigacion" class="btn btn-outline-primary btn-sm">Ver más</a>
        </div>
    </div>
    <div class="col-md-4">
        <div class="card text-center p-4">
            <div class="display-4 text-primary mb-2"><i class="bi bi-journal-bookmark"></i></div>
            <h3><?= $stats['Programa'] ?? 0 ?></h3>
            <p class="text-muted mb-2">Programas</p>
            <a href="index.php?ruta=Programa" class="btn btn-outline-primary btn-sm">Ver más</a>
        </div>
    </div>
        <div class="col-md-4">
        <div class="card text-center p-4">
            <div class="display-4 text-primary mb-2"><i class="bi bi-hdd-network"></i></div>
            <h3><?= $stats['red'] ?? 0 ?></h3>
            <p class="text-muted mb-2">Redes</p>
            <a href="index.php?ruta=red" class="btn btn-outline-primary btn-sm">Ver más</a>
        </div>
    </div>
        <div class="col-md-4">
        <div class="card text-center p-4">
            <div class="display-4 text-primary mb-2"><i class="bi bi-person-badge"></i></div>
            <h3><?= $stats['rol'] ?? 0 ?></h3>
            <p class="text-muted mb-2">Roles</p>
            <a href="index.php?ruta=rol" class="btn btn-outline-primary btn-sm">Ver más</a>
        </div>
    </div>

    <div class="col-md-4">
        <div class="card text-center p-4">
            <div class="display-4 text-primary mb-2"><i class="bi bi-person"></i></div>
            <h3><?= $stats['usuario'] ?? 0 ?></h3>
            <p class="text-muted mb-2">Usuarios</p>
            <a href="index.php?ruta=usuario" class="btn btn-outline-primary btn-sm">Ver más</a>
        </div>



</div>