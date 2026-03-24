<?php
// ============================================================================
// CONTROLADOR DE RED
// El controlador es el INTERMEDIARIO entre el modelo (Programa) y la vista (programa_listar.php, programa_form.php).
// Aquí se procesan las solicitudes del usuario, se llaman a los métodos del modelo para obtener
// y la base de datos (ControlConexionPdo).
// ============================================================================

// Incluimos las clases que necesitamos.
require_once __DIR__ . '/ControlConexionPdo.php';  // Para conectarnos a la BD
require_once __DIR__ . '/../modelo/Red.php';   // El modelo Programa

class ControlRed {

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

        $sql = "SELECT * FROM red WHERE fecha_borrado IS NULL";
        $resultado = $this->conexion->ejecutarSelect($sql);

        $this->conexion->cerrarBd();

        $red = []; // Array para almacenar los objetos Red
        foreach ($resultado as $fila) {
            $red[] = new Red(
                $fila['id'], 
                $fila['nombre'], 
                $fila['url'],
                $fila['pais']);
        }
        return $red;
    }

    public function buscarPorId(string $id): ?Red {
        $this->conexion->abrirBd();

        $sql = "SELECT * FROM red WHERE id = ?";
        $resultado = $this->conexion->ejecutarSelect($sql, [$id]);

        $this->conexion->cerrarBd();

        // Si encontró resultados, creamos el objeto con la primera fila.
        if (!empty($resultado)) {
            $p = $resultado[0]; // Primera (y única) fila del resultado
            return new Red(
                $p['id'],
                $p['nombre'],
                $p['url'],
                $p['pais']
            );
        }
        return null; // Si no encontró nada, retornamos null.
    }

    public function guardar(Red $red): bool {
        $this->conexion->abrirBd();

        $sql = "INSERT INTO red (nombre, url, pais) VALUES (?, ?, ?)";
        $ok = $this->conexion->ejecutarComandoSql(
            $sql,
            [
                $red->getNombre(),
                $red->getUrl(),
                $red->getPais()
            ]
        );

        $this->conexion->cerrarBd();
        return $ok;
    }

    public function modificar(string $idOriginal, Red $red): bool {
        $this->conexion->abrirBd();
        $sql = "UPDATE red SET nombre = ?, url = ?, pais = ? WHERE id = ?";
        $ok = $this->conexion->ejecutarComandoSql(
            $sql,
            [
                $red->getNombre(),
                $red->getUrl(),
                $red->getPais(),
                $idOriginal
            ]
        );

        $this->conexion->cerrarBd();
        return $ok;
    }

    // BORRAR: se hace un soft delete, es decir, se marca con fecha_borrado en lugar de eliminar físicamente la fila.
    public function borrar(string $codigo): bool {
        $this->conexion->abrirBd();
        $sql = "UPDATE red SET fecha_borrado = CURRENT_TIMESTAMP WHERE id = ?";

        // UPDATE tabla SET fecha_borrado = CURRENT_TIMESTAMP WHERE clave = ?
        $ok = $this->conexion->ejecutarComandoSql($sql, [$codigo]);

        $this->conexion->cerrarBd();
        return $ok;
    }

    public function contar(): int {
        $this->conexion->abrirBd();
        $sql = "SELECT COUNT(*) as total FROM red WHERE fecha_borrado IS NULL";
        // COUNT(*) cuenta todas las filas. "as total" le da un alias al resultado.
        $r = $this->conexion->ejecutarSelect($sql);

        $this->conexion->cerrarBd();
        return (int)($r[0]['total'] ?? 0);
    }
}
?>