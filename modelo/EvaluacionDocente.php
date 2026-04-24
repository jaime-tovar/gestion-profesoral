<?php
// ============================================================
// MODELO - CLASE: EvaluacionDocente
// Representa la tabla 'evaluacion_docente' de la base de datos.
// ============================================================

class EvaluacionDocente {
    // Propiedades privadas
    private ?string $id;
    private float $calificacion;
    private string $semestre;
    private string $docente;
    private ?DateTime $fecha_borrado;
    private ?DateTime $fecha_creacion;

    // Constructor
    public function __construct(
        ?string $id = null,
        float $calificacion = 0.0,
        string $semestre = '',
        string $docente = '',
        ?DateTime $fecha_borrado = null,
        ?DateTime $fecha_creacion = null,
        ?DateTime $fecha_actualizacion = null
    ) {
        $this->id = $id;
        $this->calificacion = $calificacion;
        $this->semestre = $semestre;
        $this->docente = $docente;
        $this->fecha_borrado = $fecha_borrado;
        $this->fecha_creacion = $fecha_creacion;
    }

    // GETTERS
    public function getId(): ?string { return $this->id; }
    public function getCalificacion(): float { return $this->calificacion; }
    public function getSemestre(): string { return $this->semestre; }
    public function getDocente(): string { return $this->docente; }
    public function getFechaBorrado(): ?DateTime { return $this->fecha_borrado; }
    public function getFechaCreacion(): ?DateTime { return $this->fecha_creacion; }

    // SETTERS
    public function setId(string $id): void { $this->id = $id; }
    public function setCalificacion(float $calificacion): void { $this->calificacion = $calificacion; }
    public function setSemestre(string $semestre): void { $this->semestre = $semestre; }
    public function setDocente(string $docente): void { $this->docente = $docente; }
    public function setFechaBorrado(?DateTime $fecha_borrado): void { $this->fecha_borrado = $fecha_borrado; }
    public function setFechaCreacion(?DateTime $fecha_creacion): void { $this->fecha_creacion = $fecha_creacion; }
}
?>