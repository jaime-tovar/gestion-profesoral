<?php
// ============================================================
// MODELO - CLASE: Beca
// Representa la tabla 'beca' de la base de datos.
// ============================================================

class Beca {
    // Propiedades privadas
    private ?string $id;
    private string $estudio;
    private string $tipo;
    private string $institucion;
    private ?DateTime $fecha_inicio;
    private ?DateTime $fecha_fin;
    private ?DateTime $fecha_borrado;
    private ?DateTime $fecha_creacion;

    // Constructor
    public function __construct(
        ?string $id = null,
        string $estudio = '',
        string $tipo = '',
        string $institucion = '',
        ?DateTime $fecha_inicio = null,
        ?DateTime $fecha_fin = null,
        ?DateTime $fecha_borrado = null,
        ?DateTime $fecha_creacion = null
    ) {
        $this->id = $id;
        $this->estudio = $estudio;
        $this->tipo = $tipo;
        $this->institucion = $institucion;
        $this->fecha_inicio = $fecha_inicio;
        $this->fecha_fin = $fecha_fin;
        $this->fecha_borrado = $fecha_borrado;
        $this->fecha_creacion = $fecha_creacion;
    }

    // GETTERS
    public function getId(): ?string { return $this->id; }
    public function getEstudio(): string { return $this->estudio; }
    public function getTipo(): string { return $this->tipo; }
    public function getInstitucion(): string { return $this->institucion; }
    public function getFechaInicio(): ?DateTime { return $this->fecha_inicio; }
    public function getFechaFin(): ?DateTime { return $this->fecha_fin; }
    public function getFechaBorrado(): ?DateTime { return $this->fecha_borrado; }
    public function getFechaCreacion(): ?DateTime { return $this->fecha_creacion; }

    // SETTERS
    public function setId(string $id): void { $this->id = $id; }
    public function setEstudio(string $estudio): void { $this->estudio = $estudio; }
    public function setTipo(string $tipo): void { $this->tipo = $tipo; }
    public function setInstitucion(string $institucion): void { $this->institucion = $institucion; }
    public function setFechaInicio(?DateTime $fecha_inicio): void { $this->fecha_inicio = $fecha_inicio; }
    public function setFechaFin(?DateTime $fecha_fin): void { $this->fecha_fin = $fecha_fin; }
    public function setFechaBorrado(?DateTime $fecha_borrado): void { $this->fecha_borrado = $fecha_borrado; }
    public function setFechaCreacion(?DateTime $fecha_creacion): void { $this->fecha_creacion = $fecha_creacion; }
}
?>