<?php
// ============================================================================
// CONTROLADOR DE USUARIO
// El controlador es el INTERMEDIARIO entre el modelo (Usuario) y la vista (
// El controlador es el INTERMEDIARIO entre el modelo (Programa) y la vista (programa_listar.php, programa_form.php).
// Aquí se procesan las solicitudes del usuario, se llaman a los métodos del modelo para obtener
// y la base de datos (ControlConexionPdo).
// ============================================================================

// Incluimos las clases que necesitamos.
require_once __DIR__ . '/ControlConexionPdo.php';  // Para conectarnos a la BD
require_once __DIR__ . '/../modelo/Usuario.php';   // El modelo Usuario

class ControlUsuario {

    // Objeto de conexión a la BD
    private ControlConexionPdo $conexion;

    // Constructor:
    public function __construct() {
        $this->conexion = new ControlConexionPdo();
    }

    // LISTAR: obtiene TODAS los usuarios de la tabla.
    // Retorna un array de objetos Usuario.
    // ": array" indica que retorna un array.
    public function listar(): array {
        $this->conexion->abrirBd();

        $sql = "SELECT * FROM usuario WHERE activo = 1";
        $resultado = $this->conexion->ejecutarSelect($sql);

        $this->conexion->cerrarBd();

        $usuario = []; // Array para almacenar los objetos Usuario
            foreach ($resultado as $fila) {
                $usuario[] = new Usuario(
                    $fila['id'],
                    $fila['username'],
                    $fila['password'],
                    $fila['email'],
                    $fila['nombre_completo'],
                    $fila['activo'],
                    $fila['fecha_creacion'] ? new DateTime($fila['fecha_creacion']) : null
                );
        }
        return $usuario;
    }

    public function buscarPorId(string $id): ?Usuario {
        $this->conexion->abrirBd();

        $sql = "SELECT * FROM usuario WHERE id = ?";
        $resultado = $this->conexion->ejecutarSelect($sql, [$id]);

        $this->conexion->cerrarBd();

        // Si encontró resultados, creamos el objeto con la primera fila.
        if (!empty($resultado)) {
            $p = $resultado[0]; // Primera (y única) fila del resultado
            return new Usuario(
                $p['id'],
                $p['username'],
                $p['password'],
                $p['email'],
                $p['nombre_completo'],
                $p['activo'],
                $p['fecha_creacion'] ? new DateTime($p['fecha_creacion']) : null
            );
        }
        return null; // Si no encontró nada, retornamos null.
    }

    public function guardar(Usuario $usuario): bool {
        // Validación de email en backend controlador
        if (!preg_match('/^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\\.[a-zA-Z]{2,}$/', $usuario->getEmail())) {
            return false;
        }
        $this->conexion->abrirBd();

        // Hashear la contraseña antes de guardar
        $passwordHash = password_hash($usuario->getPassword(), PASSWORD_DEFAULT);

        $sql = "INSERT INTO usuario (username, password, email, nombre_completo, activo) VALUES (?, ?, ?, ?, ?)";
        $ok = $this->conexion->ejecutarComandoSql(
            $sql,
            [
                $usuario->getUsername(),
                $passwordHash,
                $usuario->getEmail(),
                $usuario->getNombreCompleto(),
                $usuario->getActivo()
            ]
        );

        $this->conexion->cerrarBd();
        return $ok;
    }

    public function modificar(string $idOriginal, Usuario $usuario): bool {
        // Validación de email en backend controlador
        if (!preg_match('/^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\\.[a-zA-Z]{2,}$/', $usuario->getEmail())) {
            return false;
        }
        $this->conexion->abrirBd();
        // Hashear la contraseña antes de modificar
        $passwordHash = password_hash($usuario->getPassword(), PASSWORD_DEFAULT);
        $sql = "UPDATE usuario SET username = ?, password = ?, email = ?, nombre_completo = ?, activo = ? WHERE id = ?";
        $ok = $this->conexion->ejecutarComandoSql(
            $sql,
            [
                $usuario->getUsername(),
                $passwordHash,
                $usuario->getEmail(),
                $usuario->getNombreCompleto(),
                $usuario->getActivo(),
                $idOriginal
            ]
        );

        $this->conexion->cerrarBd();
        return $ok;
    }


    public function borrar(string $codigo): bool {
        $this->conexion->abrirBd();
        $sql = "UPDATE usuario SET activo = 0 WHERE id = ?";

        // UPDATE tabla SET fecha_borrado = CURRENT_TIMESTAMP WHERE clave = ?
        $ok = $this->conexion->ejecutarComandoSql($sql, [$codigo]);

        $this->conexion->cerrarBd();
        return $ok;
    }

    public function contar(): int {
        $this->conexion->abrirBd();
        $sql = "SELECT COUNT(*) as total FROM usuario WHERE activo = 0";
        // COUNT(*) cuenta todas las filas. "as total" le da un alias al resultado.
        $r = $this->conexion->ejecutarSelect($sql);

        $this->conexion->cerrarBd();
        return (int)($r[0]['total'] ?? 0);
    }
}
?>