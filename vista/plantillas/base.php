<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <!-- viewport: hace que la página se adapte a dispositivos móviles -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Título de la pestaña del navegador. -->
    <title><?= $titulo ?? 'Gestión Profesoral' ?></title>

    <!-- Bootstrap CSS: framework de estilos (nos da clases como btn, card, table, etc.) -->
    <!-- Se carga desde un CDN (servidor externo), no necesitamos descargar nada. -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Bootstrap Icons: librería de íconos (bi bi-people, bi bi-house, etc.) -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.0/font/bootstrap-icons.css">

    <!-- CSS personalizado para el sidebar y estilos adicionales -->
    <style>
        /* Variable CSS: define el ancho del sidebar, reutilizable en varios lugares */
        :root { --sidebar-width: 240px; }

        body { font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif; }

        /* Sidebar: menú lateral fijo a la izquierda */
        .sidebar {
            position: fixed; top: 0; left: 0; height: 100vh; /* 100vh = 100% alto de la ventana */
            width: var(--sidebar-width); /* Usa la variable definida arriba */
            background: linear-gradient(180deg, #0f2027 0%, #203a43 50%, #2c5364 100%); /* Degradado */
            padding-top: 20px; color: white; overflow-y: auto; /* Scroll si hay muchos items */
        }

        /* Links del menú lateral */
        .sidebar .nav-link {
            color: rgba(255,255,255,0.75); padding: 10px 20px;
            transition: all 0.3s; /* Animación suave al hacer hover */
            border-left: 3px solid transparent;
        }

        /* Estilo cuando pasas el mouse (hover) o está activo */
        .sidebar .nav-link:hover, .sidebar .nav-link.active {
            color: #fff; background: rgba(255,255,255,0.1);
            border-left-color: #17a2b8; /* Línea azul a la izquierda */
        }

        .sidebar .nav-link i { width: 24px; margin-right: 8px; }

        /* Contenido principal: se desplaza a la derecha del sidebar */
        .main-content {
            margin-left: var(--sidebar-width); padding: 20px;
            min-height: 100vh; background: #f0f2f5;
        }

        /* Barra superior dentro del contenido */
        .navbar-top {
            background: #fff; box-shadow: 0 1px 4px rgba(0,0,0,0.08);
            padding: 14px 24px; margin-bottom: 24px; border-radius: 8px;
        }

        /* Personalización de cards y botones */
        .card { border: none; border-radius: 10px; box-shadow: 0 2px 8px rgba(0,0,0,0.08); }
        .card-header {
            background: linear-gradient(135deg, #0f2027, #2c5364);
            color: #fff; font-weight: 600; border-radius: 10px 10px 0 0 !important;
        }
        .btn-primary {
            background: linear-gradient(135deg, #203a43, #2c5364); border: none;
        }
        .btn-primary:hover { background: linear-gradient(135deg, #2c5364, #203a43); }
    </style>
</head>
<body>

    <div class="sidebar">
        <div class="text-center mb-4">
            <h5 class="fw-bold"><i class="bi bi-receipt"></i> Gestión Profesoral</h5>
        </div>

        <!-- Links de navegación -->
        <!-- nav flex-column: menú vertical de Bootstrap -->
        <nav class="nav flex-column">
            <!-- Cada link va a index.php?ruta=XXXX -->
            <!-- La clase 'active' se agrega si la ruta actual coincide -->
            <!-- ($ruta ?? '') === 'home' compara la ruta actual con 'home' -->
            <a class="nav-link <?= ($ruta ?? '') === 'home' ? 'active' : '' ?>" href="index.php?ruta=home">
                <i class="bi bi-house-door"></i> Inicio
            </a>

            <!-- Separador de sección -->
            <div class="px-3 mt-3 mb-1"><small class="text-uppercase opacity-50">Tablas</small></div>

            <a class="nav-link <?= ($ruta ?? '') === 'areaConocimiento' ? 'active' : '' ?>" href="index.php?ruta=areaConocimiento">
                <i class="bi bi-geo-alt"></i> Áreas de Conocimiento
            </a>
            <a class="nav-link <?= ($ruta ?? '') === 'terminoClave' ? 'active' : '' ?>" href="index.php?ruta=terminoClave">
                <i class="bi bi-key"></i> Términos Clave
            </a>
            <a class="nav-link <?= ($ruta ?? '') === 'lineaInvestigacion' ? 'active' : '' ?>" href="index.php?ruta=lineaInvestigacion">
                <i class="bi bi-diagram-3"></i> Líneas de Investigación
            </a>
            <a class="nav-link <?= ($ruta ?? '') === 'Programa' ? 'active' : '' ?>" href="index.php?ruta=Programa">
                <i class="bi bi-journal-bookmark"></i> Programas
            </a>
            <a class="nav-link <?= ($ruta ?? '') === 'red' ? 'active' : '' ?>" href="index.php?ruta=red">
                <i class="bi bi-hdd-network"></i> Redes
            </a>
            <a class="nav-link <?= ($ruta ?? '') === 'rol' ? 'active' : '' ?>" href="index.php?ruta=rol">
                <i class="bi bi-person-badge"></i> Roles
            </a>
            <a class="nav-link <?= ($ruta ?? '') === 'usuario' ? 'active' : '' ?>" href="index.php?ruta=usuario">
                <i class="bi bi-person"></i> Usuarios
            </a>
        </nav>
    </div>

    <!-- ============================================================ -->
    <!-- CONTENIDO PRINCIPAL                                          -->
    <!-- ============================================================ -->
    <div class="main-content">

        <!-- Barra superior con el título de la página -->
        <div class="navbar-top d-flex justify-content-between align-items-center">
            <h5 class="mb-0"><?= $titulo ?? 'Panel' ?></h5>
            <span class="text-muted small">Gestión Profesoral</span>
        </div>

        <!-- MENSAJES FLASH: alertas que aparecen una sola vez después de una acción -->
        <!-- Por ejemplo: "Persona creada exitosamente" -->
        <?php if (isset($_SESSION['mensaje'])): ?>
        <!-- alert-dismissible: permite cerrar la alerta con la X -->
        <!-- El tipo (success, danger, info) cambia el color de la alerta -->
        <div class="alert alert-<?= $_SESSION['mensaje']['tipo'] ?? 'info' ?> alert-dismissible fade show">
            <?= $_SESSION['mensaje']['texto'] ?? '' ?>
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        </div>
        <!-- unset() elimina el mensaje de la sesión para que no aparezca de nuevo -->
        <?php unset($_SESSION['mensaje']); endif; ?>
        <?= $contenido ?? '' ?>
    </div>

    <!-- Bootstrap JS: necesario para que funcionen los componentes interactivos -->
    <!-- (como cerrar alertas, dropdowns, etc.) -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>