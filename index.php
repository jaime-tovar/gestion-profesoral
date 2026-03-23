<?php
// session_start() inicia las sesiones de PHP.
session_start();

// Controladores
require_once __DIR__ . '/controlador/ControlAreaConocimiento.php';

// Leemos los parámetros de la URL ($_GET).
// $_GET['ruta'] contiene el valor de ?ruta=XXXX en la URL.
// ?? (null coalescing) proporciona un valor por defecto si no existe.
$ruta   = $_GET['ruta'] ?? 'home';      // Si no hay ruta, va al dashboard
$accion = $_GET['accion'] ?? 'listar';  // Si no hay acción, lista
$id     = $_GET['id'] ?? null;          // ID para editar/eliminar (puede ser null)

// ============================================================
// FUNCIÓN RENDERIZAR
// Carga una vista (por ejemplo 'crud/persona_listar') y la
// inyecta dentro del layout base (base.php).
//
// ¿Cómo funciona?
// 1. extract($datos) convierte el array en variables individuales
//    Ejemplo: ['personas' => [...]] se convierte en $personas = [...]
// 2. ob_start() activa el "buffer de salida": captura todo el HTML
// 3. require carga la vista (genera HTML pero no lo imprime aún)
// 4. ob_get_clean() obtiene el HTML capturado y lo guarda en $contenido
// 5. require base.php imprime el layout completo con $contenido adentro
// ============================================================
function renderizar($vista, $datos = []) {
    global $ruta;       // Necesitamos $ruta para marcar el menú activo en base.php
    extract($datos);    // Convierte array en variables
    ob_start();         // Inicia captura de HTML
    require __DIR__ . "/vista/plantillas/{$vista}.php";  // Carga la vista
    $contenido = ob_get_clean();  // Obtiene el HTML capturado
    require __DIR__ . '/vista/plantillas/base.php';      // Lo inyecta en el layout
}

// ============================================================
// FUNCIÓN REDIRECCIONAR
// Redirige al usuario a otra ruta, opcionalmente con un mensaje.
// El mensaje se guarda en $_SESSION para mostrarlo después (mensaje flash).
// ============================================================
function redireccionar($ruta, $mensaje = null) {
    if ($mensaje) {
        $_SESSION['mensaje'] = $mensaje;  // Guardamos el mensaje en la sesión
    }
    // header('Location: ...') le dice al navegador que vaya a otra URL.
    header("Location: index.php?ruta={$ruta}");
    exit();  // IMPORTANTE: siempre hacer exit() después de un header Location.
}

// ============================================================
// ENRUTADOR PRINCIPAL
// switch($ruta) decide qué controlador y acción ejecutar
// según lo que dice la URL.
// ============================================================
switch ($ruta) {

    // ---- DASHBOARD (PÁGINA DE INICIO) ----
    case 'home':
        // Contamos registros de cada tabla para mostrar estadísticas
        $stats = [
            'areaConocimiento'  => (new ControlAreaConocimiento())->contar()
        ];
        renderizar('dashboard', ['stats' => $stats]);
        break;

    // ---- CRUD ÁREA DE CONOCIMIENTO ----
    case 'areaConocimiento':
        $ctrl = new ControlAreaConocimiento();  // Creamos el controlador

        // Switch interno: decide qué acción CRUD ejecutar
        switch ($accion) {

            case 'listar':
                // Obtenemos todas las áreas de conocimiento y las enviamos a la vista
                $areas = $ctrl->listar();
                renderizar('crud/areaConocimiento_listar', ['areas' => $areas]);
                break;

            case 'crear':
                // Si el formulario fue enviado (POST), procesamos los datos
                if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                    $a = new AreaConocimiento($_POST['id'], $_POST['gran_area'], $_POST['area'], $_POST['disciplina']);
                    $ctrl->guardar($a);  // Insertamos en la BD
                    redireccionar('areaConocimiento', ['tipo' => 'success', 'texto' => 'Área de conocimiento creada']);
                }
                // Si es GET (primera visita), solo mostramos el formulario vacío
                renderizar('crud/areaConocimiento_form', ['accion' => 'crear']);
                break;

            case 'editar':
                // Si el formulario fue enviado (POST), actualizamos
                if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                    $a = new AreaConocimiento($_POST['id'], $_POST['gran_area'], $_POST['area'], $_POST['disciplina']);
                    $ctrl->modificar($_POST['id'], $a);  // Actualizamos en la BD
                    redireccionar('areaConocimiento', ['tipo' => 'success', 'texto' => 'Área de conocimiento actualizada']);
                }
                // Si es GET, buscamos la área de conocimiento y mostramos el formulario con sus datos
                $area = $ctrl->buscarPorId($id);
                renderizar('crud/areaConocimiento_form', ['area' => $area, 'accion' => 'editar']);
                break;

            case 'eliminar':
                // Eliminamos directamente y redireccionamos
                $ctrl->borrar($id);
                redireccionar('areaConocimiento', ['tipo' => 'success', 'texto' => 'Área de conocimiento eliminada']);
                break;
        }
        break;

    // Si la ruta no existe, mostramos el dashboard por defecto
    default:
        renderizar('dashboard', ['stats' => ['areaConocimiento' => 0]]);
        break;
}
?>