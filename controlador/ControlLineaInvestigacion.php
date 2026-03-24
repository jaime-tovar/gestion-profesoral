<?php
// ============================================================================
// CONTROLADOR DE LINEA DE INVESTIGACION
// El controlador es el INTERMEDIARIO entre el modelo (LineaInvestigacion) y la vista (lineaInvestigacion_listar.php, lineaInvestigacion_form.php).
// Aquí se procesan las solicitudes del usuario, se llaman a los métodos del modelo para obtener
// y la base de datos (ControlConexionPdo).
// ============================================================================

// Incluimos las clases que necesitamos.
require_once __DIR__ . '/ControlConexionPdo.php';  // Para conectarnos a la BD
require_once __DIR__ . '/../modelo/LineaInvestigacion.php';   // El modelo LineaInvestigacion

class ControlLineaInvestigacion {

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

        $sql = "SELECT * FROM linea_investigacion WHERE fecha_borrado IS NULL";
        $resultado = $this->conexion->ejecutarSelect($sql);

        $this->conexion->cerrarBd();

        $lineas = []; // Array para almacenar los objetos LineaInvestigacion
        foreach ($resultado as $fila) {
            $lineas[] = new LineaInvestigacion(
                $fila['id'], 
                $fila['nombre'], 
                $fila['descripcion'],
                null, 
                $fila['fecha_creacion'] ? new DateTime($fila['fecha_creacion']) : null);
        }
        return $lineas;
    }

    public function buscarPorId(string $id): ?LineaInvestigacion {
        $this->conexion->abrirBd();

        $sql = "SELECT * FROM linea_investigacion WHERE id = ?";
        $resultado = $this->conexion->ejecutarSelect($sql, [$id]);

        $this->conexion->cerrarBd();

        // Si encontró resultados, creamos el objeto con la primera fila.
        if (!empty($resultado)) {
            $f = $resultado[0]; // Primera (y única) fila del resultado
            return new LineaInvestigacion(
                $f['id'],
                $f['nombre'],
                $f['descripcion'],
                null,
                $f['fecha_creacion'] ? new DateTime($f['fecha_creacion']) : null
            );
        }
        return null; // Si no encontró nada, retornamos null.
    }

    public function guardar(LineaInvestigacion $l): bool {
        $this->conexion->abrirBd();

        $sql = "INSERT INTO linea_investigacion (nombre, descripcion) VALUES (?, ?)";
        $ok = $this->conexion->ejecutarComandoSql(
            $sql,
            [$l->getNombre(), $l->getDescripcion()]
        );

        $this->conexion->cerrarBd();
        return $ok;
    }

    public function modificar(string $idOriginal, LineaInvestigacion $lineaInvestigacion): bool {
        $this->conexion->abrirBd();
        $sql = "UPDATE linea_investigacion SET nombre = ?, descripcion = ? WHERE id = ?";
        $ok = $this->conexion->ejecutarComandoSql(
            $sql,
            [$lineaInvestigacion->getNombre(), $lineaInvestigacion->getDescripcion(), $idOriginal]
        );

        $this->conexion->cerrarBd();
        return $ok;
    }

    // BORRAR: se hace un soft delete, es decir, se marca con fecha_borrado en lugar de eliminar físicamente la fila.
    public function borrar(string $codigo): bool {
        $this->conexion->abrirBd();
        $sql = "UPDATE linea_investigacion SET fecha_borrado = CURRENT_TIMESTAMP WHERE id = ?";

        // UPDATE tabla SET fecha_borrado = CURRENT_TIMESTAMP WHERE clave = ?
        $ok = $this->conexion->ejecutarComandoSql($sql, [$codigo]);

        $this->conexion->cerrarBd();
        return $ok;
    }

    public function contar(): int {
        $this->conexion->abrirBd();
        $sql = "SELECT COUNT(*) as total FROM linea_investigacion WHERE fecha_borrado IS NULL";
        // COUNT(*) cuenta todas las filas. "as total" le da un alias al resultado.
        $r = $this->conexion->ejecutarSelect($sql);

        $this->conexion->cerrarBd();
        return (int)($r[0]['total'] ?? 0);
    }
}
?>