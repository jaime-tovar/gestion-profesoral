<?php
// ============================================================================
// CONTROLADOR DE ÁREA DE CONOCIMIENTO
// El controlador es el INTERMEDIARIO entre el modelo (AreaConocimiento)
// y la base de datos (ControlConexionPdo).
// ============================================================================

// Incluimos las clases que necesitamos.
require_once __DIR__ . '/ControlConexionPdo.php';  // Para conectarnos a la BD
require_once __DIR__ . '/../modelo/AreaConocimiento.php';   // El modelo AreaConocimiento

class ControlAreaConocimiento {

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

        $sql = "SELECT * FROM area_conocimiento WHERE fecha_borrado IS NULL";
        $resultado = $this->conexion->ejecutarSelect($sql);

        $this->conexion->cerrarBd();

        $areas = []; // Array para almacenar los objetos AreaConocimiento
        foreach ($resultado as $fila) {
            $areas[] = new AreaConocimiento($fila['id'], $fila['gran_area'], $fila['area'], $fila['disciplina']);
        }
        return $areas;
    }

    public function buscarPorId(string $id): ?AreaConocimiento {
        $this->conexion->abrirBd();

        $sql = "SELECT * FROM area_conocimiento WHERE id = ?";
        $resultado = $this->conexion->ejecutarSelect($sql, [$id]);

        $this->conexion->cerrarBd();

        // Si encontró resultados, creamos el objeto con la primera fila.
        if (!empty($resultado)) {
            $f = $resultado[0]; // Primera (y única) fila del resultado
            return new AreaConocimiento($f['id'], $f['gran_area'], $f['area'], $f['disciplina']);
        }
        return null; // Si no encontró nada, retornamos null.
    }

    public function guardar(AreaConocimiento $a): bool {
        $this->conexion->abrirBd();

        $sql = "INSERT INTO area_conocimiento (gran_area, area, disciplina) VALUES (?, ?, ?)";
        $ok = $this->conexion->ejecutarComandoSql(
            $sql,
            [$a->getGranArea(), $a->getArea(), $a->getDisciplina()]
        );

        $this->conexion->cerrarBd();
        return $ok;
    }

    public function modificar(string $idOriginal, AreaConocimiento $a): bool {
        $this->conexion->abrirBd();
        $sql = "UPDATE area_conocimiento SET gran_area = ?, area = ?, disciplina = ? WHERE id = ?";
        $ok = $this->conexion->ejecutarComandoSql(
            $sql,
            [$a->getGranArea(), $a->getArea(), $a->getDisciplina(), $idOriginal]
        );

        $this->conexion->cerrarBd();
        return $ok;
    }

    // BORRAR: se hace un soft delete, es decir, se marca con fecha_borrado en lugar de eliminar físicamente la fila.
    public function borrar(string $codigo): bool {
        $this->conexion->abrirBd();
        $sql = "UPDATE area_conocimiento SET fecha_borrado = CURRENT_TIMESTAMP WHERE id = ?";

        // UPDATE tabla SET fecha_borrado = CURRENT_TIMESTAMP WHERE clave = ?
        $ok = $this->conexion->ejecutarComandoSql($sql, [$codigo]);

        $this->conexion->cerrarBd();
        return $ok;
    }

    public function contar(): int {
        $this->conexion->abrirBd();
        $sql = "SELECT COUNT(*) as total FROM area_conocimiento WHERE fecha_borrado IS NULL";
        // COUNT(*) cuenta todas las filas. "as total" le da un alias al resultado.
        $r = $this->conexion->ejecutarSelect($sql);

        $this->conexion->cerrarBd();
        return (int)($r[0]['total'] ?? 0);
    }
}
?>