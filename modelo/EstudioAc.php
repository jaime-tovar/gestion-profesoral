<?php
// ============================================================
// MODELO - CLASE: EstudioAc
// Representa la tabla 'estudio_ac' de la base de datos.
// ============================================================

class EstudioAc {
    // Propiedades privadas
    private ?string $id;
    private string $estudio;
    private string $area_conocimiento;
    private ?DateTime $fecha_borrado;
    private ?DateTime $fecha_creacion;

    // Constructor
    public function __construct(
        ?string $id = null,
        string $estudio = '',
        string $area_conocimiento = '',
        ?DateTime $fecha_borrado = null,
        ?DateTime $fecha_creacion = null
    ) {
        $this->id = $id;
        $this->estudio = $estudio;
        $this->area_conocimiento = $area_conocimiento;
        $this->fecha_borrado = $fecha_borrado;
        $this->fecha_creacion = $fecha_creacion;
    }

    // GETTERS
    public function getId(): ?string { return $this->id; }
    public function getEstudio(): string { return $this->estudio; }
    public function getAreaConocimiento(): string { return $this->area_conocimiento; }
    public function getFechaBorrado(): ?DateTime { return $this->fecha_borrado; }
    public function getFechaCreacion(): ?DateTime { return $this->fecha_creacion; }

    // SETTERS
    public function setId(string $id): void { $this->id = $id; }
    public function setEstudio(string $estudio): void { $this->estudio = $estudio; }
    public function setAreaConocimiento(string $area_conocimiento): void { $this->area_conocimiento = $area_conocimiento; }
    public function setFechaBorrado(?DateTime $fecha_borrado): void { $this->fecha_borrado = $fecha_borrado; }
    public function setFechaCreacion(?DateTime $fecha_creacion): void { $this->fecha_creacion = $fecha_creacion; }
}
?>