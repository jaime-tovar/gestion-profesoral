<?php
// ============================================================================
// CONTROLADOR DE PROGRAMA
// El controlador es el INTERMEDIARIO entre el modelo (Programa) y la vista (programa_listar.php, programa_form.php).
// Aquí se procesan las solicitudes del usuario, se llaman a los métodos del modelo para obtener
// y la base de datos (ControlConexionPdo).
// ============================================================================

// Incluimos las clases que necesitamos.
require_once __DIR__ . '/ControlConexionPdo.php';  // Para conectarnos a la BD
require_once __DIR__ . '/../modelo/Programa.php';   // El modelo Programa

class ControlPrograma {

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

        $sql = "SELECT * FROM programa WHERE fecha_borrado IS NULL";
        $resultado = $this->conexion->ejecutarSelect($sql);

        $this->conexion->cerrarBd();

        $programa = []; // Array para almacenar los objetos Programa
        foreach ($resultado as $fila) {
            $programa[] = new Programa(
                $fila['id'], 
                $fila['nombre'], 
                $fila['tipo'],
                $fila['nivel'],
                $fila['fecha_cierre'] ? new DateTime($fila['fecha_cierre']) : null,
                $fila['numero_cohortes'],
                $fila['cant_graduados'],
                $fila['ciudad'],
                (int)$fila['facultad'],
                null,
                $fila['fecha_creacion'] ? new DateTime($fila['fecha_creacion']) : null
            );
        }
        return $programa;
    }

    public function buscarPorId(string $id): ?Programa {
        $this->conexion->abrirBd();

        $sql = "SELECT * FROM programa WHERE id = ?";
        $resultado = $this->conexion->ejecutarSelect($sql, [$id]);

        $this->conexion->cerrarBd();

        // Si encontró resultados, creamos el objeto con la primera fila.
        if (!empty($resultado)) {
            $p = $resultado[0]; // Primera (y única) fila del resultado
            return new Programa(
                $p['id'],
                $p['nombre'],
                $p['tipo'],
                $p['nivel'],
                $p['fecha_cierre'] ? new DateTime($p['fecha_cierre']) : null,
                $p['numero_cohortes'],
                $p['cant_graduados'],
                $p['ciudad'],
                (int)$p['facultad'],
                null,
                $p['fecha_creacion'] ? new DateTime($p['fecha_creacion']) : null
            );
        }
        return null; // Si no encontró nada, retornamos null.
    }

    public function guardar(Programa $programa): bool {
        $this->conexion->abrirBd();

        $sql = "INSERT INTO programa (nombre, tipo, nivel, fecha_cierre, numero_cohortes, cant_graduados, ciudad, facultad, fecha_creacion) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)";
        $ok = $this->conexion->ejecutarComandoSql(
            $sql,
            [
                $programa->getNombre(),
                $programa->getTipo(),
                $programa->getNivel(),
                $programa->getFechaCierre() ? $programa->getFechaCierre()->format('Y-m-d') : null,
                $programa->getNumeroCohortes(),
                $programa->getCantGraduados(),
                $programa->getCiudad(),
                $programa->getFacultad(),
                $programa->getFechaCreacion() ? $programa->getFechaCreacion()->format('Y-m-d H:i:s') : null
            ]
        );

        $this->conexion->cerrarBd();
        return $ok;
    }

    public function modificar(string $idOriginal, Programa $programa): bool {
        $this->conexion->abrirBd();
        $sql = "UPDATE programa SET nombre = ?, tipo = ?, nivel = ?, fecha_cierre = ?, numero_cohortes = ?, cant_graduados = ?, ciudad = ?, facultad = ?, fecha_creacion = ? WHERE id = ?";
        $ok = $this->conexion->ejecutarComandoSql(
            $sql,
            [
                $programa->getNombre(),
                $programa->getTipo(),
                $programa->getNivel(),
                $programa->getFechaCierre() ? $programa->getFechaCierre()->format('Y-m-d') : null,
                $programa->getNumeroCohortes(),
                $programa->getCantGraduados(),
                $programa->getCiudad(),
                $programa->getFacultad(),
                $programa->getFechaCreacion() ? $programa->getFechaCreacion()->format('Y-m-d H:i:s') : null,
                $idOriginal
            ]
        );

        $this->conexion->cerrarBd();
        return $ok;
    }

    // BORRAR: se hace un soft delete, es decir, se marca con fecha_borrado en lugar de eliminar físicamente la fila.
    public function borrar(string $codigo): bool {
        $this->conexion->abrirBd();
        $sql = "UPDATE programa SET fecha_borrado = CURRENT_TIMESTAMP WHERE id = ?";

        // UPDATE tabla SET fecha_borrado = CURRENT_TIMESTAMP WHERE clave = ?
        $ok = $this->conexion->ejecutarComandoSql($sql, [$codigo]);

        $this->conexion->cerrarBd();
        return $ok;
    }

    public function contar(): int {
        $this->conexion->abrirBd();
        $sql = "SELECT COUNT(*) as total FROM programa WHERE fecha_borrado IS NULL";
        // COUNT(*) cuenta todas las filas. "as total" le da un alias al resultado.
        $r = $this->conexion->ejecutarSelect($sql);

        $this->conexion->cerrarBd();
        return (int)($r[0]['total'] ?? 0);
    }
}
?>