<?php
// ============================================================================
// CONTROLADOR DE ROL
// El controlador es el INTERMEDIARIO entre el modelo (Programa) y la vista (programa_listar.php, programa_form.php).
// Aquí se procesan las solicitudes del usuario, se llaman a los métodos del modelo para obtener
// y la base de datos (ControlConexionPdo).
// ============================================================================

// Incluimos las clases que necesitamos.
require_once __DIR__ . '/ControlConexionPdo.php';  // Para conectarnos a la BD
require_once __DIR__ . '/../modelo/Rol.php';   // El modelo Programa

class ControlRol {

    // Objeto de conexión a la BD
    private ControlConexionPdo $conexion;

    // Constructor:
    public function __construct() {
        $this->conexion = new ControlConexionPdo();
    }

    // LISTAR: obtiene TODAS las áreas de conocimiento de la tabla.
    // Retorna un array de objetos AreaConocimiento.
    // ": array" indica que retorna un array.
    public function listar(): array {
        $this->conexion->abrirBd();

        $sql = "SELECT * FROM rol WHERE fecha_borrado IS NULL";
        $resultado = $this->conexion->ejecutarSelect($sql);

        $this->conexion->cerrarBd();

        $rol = []; // Array para almacenar los objetos Rol
        foreach ($resultado as $fila) {
            $rol[] = new Rol(
                $fila['id'], 
                $fila['nombre'], 
                $fila['descripcion'],
                $fila['activo'],
                $fila['fecha_borrado'],
            );
        }
        return $rol;
    }

    public function buscarPorId(string $id): ?Rol {
        $this->conexion->abrirBd();

        $sql = "SELECT * FROM rol WHERE id = ?";
        $resultado = $this->conexion->ejecutarSelect($sql, [$id]);

        $this->conexion->cerrarBd();

        // Si encontró resultados, creamos el objeto con la primera fila.
        if (!empty($resultado)) {
            $p = $resultado[0]; // Primera (y única) fila del resultado
            return new Rol(
                $p['id'],
                $p['nombre'],
                $p['descripcion'],
                $p['activo'],
                $p['fecha_borrado'],
            );
        }
        return null; // Si no encontró nada, retornamos null.
    }

    public function guardar(Rol $rol): bool {
        $this->conexion->abrirBd();

        // Deja que la base de datos asigne la fecha de creación automáticamente
        $sql = "INSERT INTO rol (nombre, descripcion, activo) VALUES (?, ?, ?)";
        $ok = $this->conexion->ejecutarComandoSql(
            $sql,
            [
                $rol->getNombre(),
                $rol->getDescripcion(),
               $rol->getActivo()
            ]
        );

        $this->conexion->cerrarBd();
        return $ok;
    }

    public function modificar(string $idOriginal, Rol $rol): bool {
        $this->conexion->abrirBd();
        $sql = "UPDATE rol SET nombre = ?, descripcion = ?, activo = ? WHERE id = ?";
        $ok = $this->conexion->ejecutarComandoSql(
            $sql,
            [
                $rol->getNombre(),
                $rol->getDescripcion(),
                $rol->getActivo(),
                $idOriginal
            ]
        );

        $this->conexion->cerrarBd();
        return $ok;
    }


    public function borrar(string $codigo): bool {
        $this->conexion->abrirBd();
        $sql = "UPDATE rol SET fecha_borrado = CURRENT_TIMESTAMP, activo = 0 WHERE id = ?";

        // UPDATE tabla SET fecha_borrado = CURRENT_TIMESTAMP WHERE clave = ?
        $ok = $this->conexion->ejecutarComandoSql($sql, [$codigo]);

        $this->conexion->cerrarBd();
        return $ok;
    }

    public function contar(): int {
        $this->conexion->abrirBd();
        $sql = "SELECT COUNT(*) as total FROM rol WHERE fecha_borrado IS NULL";
        // COUNT(*) cuenta todas las filas. "as total" le da un alias al resultado.
        $r = $this->conexion->ejecutarSelect($sql);

        $this->conexion->cerrarBd();
        return (int)($r[0]['total'] ?? 0);
    }
}
?>