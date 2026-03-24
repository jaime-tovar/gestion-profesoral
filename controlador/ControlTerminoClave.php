<?php
// ============================================================================
// CONTROLADOR DE TERMINO CLAVE
// El controlador es el INTERMEDIARIO entre el modelo (TerminoClave) y la vista (terminoClave_listar.php, terminoClave_form.php).
// Aquí se procesan las solicitudes del usuario, se llaman a los métodos del modelo para obtener
// y la base de datos (ControlConexionPdo).
// ============================================================================

// Incluimos las clases que necesitamos.
require_once __DIR__ . '/ControlConexionPdo.php';  // Para conectarnos a la BD
require_once __DIR__ . '/../modelo/TerminoClave.php';   // El modelo TerminoClave

class ControlTerminoClave {

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

        $sql = "SELECT * FROM termino_clave WHERE fecha_borrado IS NULL";
        $resultado = $this->conexion->ejecutarSelect($sql);

        $this->conexion->cerrarBd();

        $terminos = []; // Array para almacenar los objetos TerminoClave
        foreach ($resultado as $fila) {
            $terminos[] = new TerminoClave($fila['id'], $fila['termino'], $fila['termino_ingles']);
        }
        return $terminos;
    }

    public function buscarPorId(string $id): ?TerminoClave {
        $this->conexion->abrirBd();

        $sql = "SELECT * FROM termino_clave WHERE id = ?";
        $resultado = $this->conexion->ejecutarSelect($sql, [$id]);

        $this->conexion->cerrarBd();

        // Si encontró resultados, creamos el objeto con la primera fila.
        if (!empty($resultado)) {
            $f = $resultado[0]; // Primera (y única) fila del resultado
            return new TerminoClave($f['id'], $f['termino'], $f['termino_ingles'], $f['fecha_creacion'] ? new DateTime($f['fecha_creacion']) : null);
        }
        return null; // Si no encontró nada, retornamos null.
    }

    public function guardar(TerminoClave $t): bool {
        $this->conexion->abrirBd();

        $sql = "INSERT INTO termino_clave (termino, termino_ingles) VALUES (?, ?)";
        $ok = $this->conexion->ejecutarComandoSql(
            $sql,
            [$t->getTermino(), $t->getTerminoIngles()]
        );

        $this->conexion->cerrarBd();
        return $ok;
    }

    public function modificar(string $idOriginal, TerminoClave $terminoClave): bool {
        $this->conexion->abrirBd();
        $sql = "UPDATE termino_clave SET termino = ?, termino_ingles = ? WHERE id = ?";
        $ok = $this->conexion->ejecutarComandoSql(
            $sql,
            [$terminoClave->getTermino(), $terminoClave->getTerminoIngles(), $idOriginal]
        );

        $this->conexion->cerrarBd();
        return $ok;
    }

    // BORRAR: se hace un soft delete, es decir, se marca con fecha_borrado en lugar de eliminar físicamente la fila.
    public function borrar(string $codigo): bool {
        $this->conexion->abrirBd();
        $sql = "UPDATE termino_clave SET fecha_borrado = CURRENT_TIMESTAMP WHERE id = ?";

        // UPDATE tabla SET fecha_borrado = CURRENT_TIMESTAMP WHERE clave = ?
        $ok = $this->conexion->ejecutarComandoSql($sql, [$codigo]);

        $this->conexion->cerrarBd();
        return $ok;
    }

    public function contar(): int {
        $this->conexion->abrirBd();
        $sql = "SELECT COUNT(*) as total FROM termino_clave WHERE fecha_borrado IS NULL";
        // COUNT(*) cuenta todas las filas. "as total" le da un alias al resultado.
        $r = $this->conexion->ejecutarSelect($sql);

        $this->conexion->cerrarBd();
        return (int)($r[0]['total'] ?? 0);
    }
}
?>