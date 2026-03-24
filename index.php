<?php
// session_start() inicia las sesiones de PHP.
session_start();

// Controladores
require_once __DIR__ . '/controlador/ControlAreaConocimiento.php';
require_once __DIR__ . '/controlador/ControlTerminoClave.php';
require_once __DIR__ . '/controlador/ControlLineaInvestigacion.php';
require_once __DIR__ . '/controlador/ControlPrograma.php';
require_once __DIR__ . '/controlador/ControlRed.php';
require_once __DIR__ . '/controlador/ControlRol.php';
require_once __DIR__ . '/controlador/ControlUsuario.php';

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
            'areaConocimiento'  => (new ControlAreaConocimiento())->contar(),
            'terminoClave'      => (new ControlTerminoClave())->contar(),
            'lineaInvestigacion' => (new ControlLineaInvestigacion())->contar(),
            'Programa'          => (new ControlPrograma())->contar(),
            'red'               => (new ControlRed())->contar(),
            'rol'               => (new ControlRol())->contar()
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

         // ---- CRUD TÉRMINO CLAVE ----
    case 'terminoClave':
        $ctrl = new ControlTerminoClave();
        switch ($accion) {
            case 'listar':
                $terminos = $ctrl->listar();
                renderizar('crud/terminoClave_listar', ['terminos' => $terminos]);
                break;
            case 'crear':
                if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                    $t = new TerminoClave(null, $_POST['termino'], $_POST['termino_ingles']);
                    $ctrl->guardar($t);
                    redireccionar('terminoClave', ['tipo' => 'success', 'texto' => 'Término clave creado']);
                }
                renderizar('crud/terminoClave_form', ['accion' => 'crear']);
                break;
            case 'editar':
                if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                    $t = new TerminoClave($_POST['id'], $_POST['termino'], $_POST['termino_ingles']);
                    $ctrl->modificar($_POST['id'], $t);
                    redireccionar('terminoClave', ['tipo' => 'success', 'texto' => 'Término clave actualizado']);
                }
                $terminoClave = $ctrl->buscarPorId($id);
                renderizar('crud/terminoClave_form', ['terminoClave' => $terminoClave, 'accion' => 'editar']);
                break;
            case 'eliminar':
                $ctrl->borrar($id);
                redireccionar('terminoClave', ['tipo' => 'success', 'texto' => 'Término clave eliminado']);
                break;
        }
        break;

        // ---- CRUD LÍNEA DE INVESTIGACIÓN ----
    case 'lineaInvestigacion':
        $ctrl = new ControlLineaInvestigacion();
        switch ($accion) {
            case 'listar':
                $lineas = $ctrl->listar();
                renderizar('crud/lineaInvestigacion_listar', ['lineas' => $lineas]);
                break;
            case 'crear':
                if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                    $l = new LineaInvestigacion(null, $_POST['nombre'], $_POST['descripcion']);
                    $ctrl->guardar($l);
                    redireccionar('lineaInvestigacion', ['tipo' => 'success', 'texto' => 'Línea de investigación creada']);
                }
                renderizar('crud/lineaInvestigacion_form', ['accion' => 'crear']);
                break;
            case 'editar':
                if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                    $l = new LineaInvestigacion($_POST['id'], $_POST['nombre'], $_POST['descripcion']);
                    $ctrl->modificar($_POST['id'], $l);
                    redireccionar('lineaInvestigacion', ['tipo' => 'success', 'texto' => 'Línea de investigación actualizada']);
                }
                $lineaInvestigacion = $ctrl->buscarPorId($id);
                renderizar('crud/lineaInvestigacion_form', ['lineaInvestigacion' => $lineaInvestigacion, 'accion' => 'editar']);
                break;
            case 'eliminar':
                $ctrl->borrar($id);
                redireccionar('lineaInvestigacion', ['tipo' => 'success', 'texto' => 'Línea de investigación eliminada']);
                break;
        }
        break;

                // ---- CRUD PROGRAMA ----
    case 'Programa':
        $ctrl = new ControlPrograma();
        switch ($accion) {
            case 'listar':
                $programas = $ctrl->listar();
                renderizar('crud/programa_listar', ['programas' => $programas]);
                break;
            case 'crear':
                if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                    $fecha_cierre = !empty($_POST['fecha_cierre']) ? new DateTime($_POST['fecha_cierre']) : null;
                    $p = new Programa(
                        null,
                        $_POST['nombre'] ?? '',
                        $_POST['tipo'] ?? '',
                        $_POST['nivel'] ?? '',
                        $fecha_cierre,
                        $_POST['numero_cohortes'] ?? '',
                        $_POST['cant_graduados'] ?? '',
                        $_POST['ciudad'] ?? '',
                        isset($_POST['facultad']) ? (int)$_POST['facultad'] : 0
                    );
                    $ctrl->guardar($p);
                    redireccionar('Programa', ['tipo' => 'success', 'texto' => 'Programa creado']);
                }
                renderizar('crud/programa_form', ['accion' => 'crear']);
                break;
            case 'editar':
                if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                    $fecha_cierre = !empty($_POST['fecha_cierre']) ? new DateTime($_POST['fecha_cierre']) : null;
                    $p = new Programa(
                        $_POST['id'] ?? null,
                        $_POST['nombre'] ?? '',
                        $_POST['tipo'] ?? '',
                        $_POST['nivel'] ?? '',
                        $fecha_cierre,
                        $_POST['numero_cohortes'] ?? '',
                        $_POST['cant_graduados'] ?? '',
                        $_POST['ciudad'] ?? '',
                        isset($_POST['facultad']) ? (int)$_POST['facultad'] : 0
                    );
                    $ctrl->modificar($_POST['id'], $p);
                    redireccionar('Programa', ['tipo' => 'success', 'texto' => 'Programa actualizado']);
                }
                $programa = $ctrl->buscarPorId($id);
                renderizar('crud/programa_form', ['programa' => $programa, 'accion' => 'editar']);
                break;
            case 'eliminar':
                $ctrl->borrar($id);
                redireccionar('Programa', ['tipo' => 'success', 'texto' => 'Programa eliminado']);
                break;
        }
        break;

      // ---- CRUD RED ----
    case 'red':
        $ctrl = new ControlRed();
        switch ($accion) {
            case 'listar':
                $redes = $ctrl->listar();
                renderizar('crud/red_listar', ['terminos' => $redes]);
                break;
            case 'crear':
                if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                    $r = new Red(
                        null,
                        $_POST['nombre'] ?? '',
                        $_POST['url'] ?? '',
                        $_POST['pais'] ?? ''
                    );
                    $ctrl->guardar($r);
                    redireccionar('red', ['tipo' => 'success', 'texto' => 'Red creada']);
                }
                renderizar('crud/red_form', ['accion' => 'crear']);
                break;
            case 'editar':
                if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                    $r = new Red(
                        $_POST['id'] ?? null,
                        $_POST['nombre'] ?? '',
                        $_POST['url'] ?? '',
                        $_POST['pais'] ?? ''
                    );
                    $ctrl->modificar($_POST['id'], $r);
                    redireccionar('red', ['tipo' => 'success', 'texto' => 'Red actualizada']);
                }
                $red = $ctrl->buscarPorId($id);
                renderizar('crud/red_form', ['red' => $red, 'accion' => 'editar']);
                break;
            case 'eliminar':
                $ctrl->borrar($id);
                redireccionar('red', ['tipo' => 'success', 'texto' => 'Red eliminada']);
                break;
        }
        break;

              // ---- CRUD ROL ----
    case 'rol':
        $ctrl = new ControlRol();
        switch ($accion) {
            case 'listar':
                $roles = $ctrl->listar();
                renderizar('crud/rol_listar', ['terminos' => $roles]);
                break;
            case 'crear':
                if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                    $r = new Rol(
                        null,
                        $_POST['nombre'] ?? '',
                        $_POST['descripcion'] ?? '',
                        $_POST['activo'] ?? ''
                    );
                    $ctrl->guardar($r);
                    redireccionar('rol', ['tipo' => 'success', 'texto' => 'Rol creado']);
                }
                renderizar('crud/rol_form', ['accion' => 'crear']);
                break;
            case 'editar':
                if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                    $r = new Rol(
                        $_POST['id'] ?? null,
                        $_POST['nombre'] ?? '',
                        $_POST['descripcion'] ?? '',
                        $_POST['activo'] ?? ''
                    );
                    $ctrl->modificar($_POST['id'], $r);
                    redireccionar('rol', ['tipo' => 'success', 'texto' => 'Rol actualizado']);
                }
                $rol = $ctrl->buscarPorId($id);
                renderizar('crud/rol_form', ['rol' => $rol, 'accion' => 'editar']);
                break;
            case 'eliminar':
                $ctrl->borrar($id);
                redireccionar('rol', ['tipo' => 'success', 'texto' => 'Rol eliminado']);
                break;
        }
        break;

                     // ---- CRUD USUARIO ----
    case 'usuario':
        $ctrl = new ControlUsuario();
        switch ($accion) {
            case 'listar':
                $usuarios = $ctrl->listar();
                renderizar('crud/usuario_listar', ['usuarios' => $usuarios]);
                break;
            case 'crear':
                if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                    $email = $_POST['email'] ?? '';
                    // Validación regex backend
                    if (!preg_match('/^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/', $email)) {
                        renderizar('crud/usuario_form', [
                            'accion' => 'crear',
                            'error' => 'El email ingresado no es válido. Debe tener el formato ejemplo@dominio.com',
                        ]);
                        break;
                    }
                    $r = new Usuario(
                        null,
                        $_POST['username'] ?? '',
                        $_POST['password'] ?? '',
                        $email,
                        $_POST['nombre_completo'] ?? '',
                        isset($_POST['activo']) ? (int)$_POST['activo'] : 1
                    );
                    if (!$ctrl->guardar($r)) {
                        renderizar('crud/usuario_form', [
                            'accion' => 'crear',
                            'usuario' => $r,
                            'error' => 'No fue posible crear el usuario. Verifique los datos e intente nuevamente. nombre de usuario o correo duplicados',
                        ]);
                        break;
                    }
                    redireccionar('usuario', ['tipo' => 'success', 'texto' => 'Usuario creado']);
                }
                renderizar('crud/usuario_form', ['accion' => 'crear']);
                break;
            case 'editar':
                if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                    $email = $_POST['email'] ?? '';
                    // Validación regex backend
                    if (!preg_match('/^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\\.[a-zA-Z]{2,}$/', $email)) {
                        $usuario = $ctrl->buscarPorId($_POST['id']);
                        renderizar('crud/usuario_form', [
                            'usuario' => $usuario,
                            'accion' => 'editar',
                            'error' => 'El email ingresado no es válido.',
                        ]);
                        break;
                    }
                    $r = new Usuario(
                        $_POST['id'] ?? null,
                        $_POST['username'] ?? '',
                        $_POST['password'] ?? '',
                        $email,
                        $_POST['nombre_completo'] ?? '',
                        isset($_POST['activo']) ? (int)$_POST['activo'] : 1
                    );
                    if (!$ctrl->modificar($_POST['id'], $r)) {
                        renderizar('crud/usuario_form', [
                            'usuario' => $r,
                            'accion' => 'editar',
                            'error' => 'No fue posible actualizar el usuario. Verifique los datos e intente nuevamente. nombre de usuario o correo duplicados',
                        ]);
                        break;
                    }
                    redireccionar('usuario', ['tipo' => 'success', 'texto' => 'Usuario actualizado']);
                }
                $usuario = $ctrl->buscarPorId($id);
                renderizar('crud/usuario_form', ['usuario' => $usuario, 'accion' => 'editar']);
                break;
            case 'eliminar':
                $ctrl->borrar($id);
                redireccionar('usuario', ['tipo' => 'success', 'texto' => 'Usuario eliminado']);
                break;
        }
        break;

    // Si la ruta no existe, mostramos el dashboard por defecto
    default:
        renderizar('dashboard', ['stats' => ['areaConocimiento' => 0]]);
        break;
}
?>