<?php
// ============================================================
// MODELO - CLASE: ApoyoProfesoral
// Representa la tabla 'apoyo_profesoral' de la base de datos.
// ============================================================

class ApoyoProfesoral {
    // Propiedades privadas
    private ?string $id;
    private string $estudio;
    private bool $con_apoyo;
    private ?string $institucion;
    private ?string $tipo;
    private ?DateTime $fecha_borrado;
    private ?DateTime $fecha_creacion;

    // Constructor
    public function __construct(
        ?string $id = null,
        string $estudio = '',
        bool $con_apoyo = false,
        ?string $institucion = null,
        ?string $tipo = null,
        ?DateTime $fecha_borrado = null,
        ?DateTime $fecha_creacion = null
    ) {
        $this->id = $id;
        $this->estudio = $estudio;
        $this->con_apoyo = $con_apoyo;
        $this->institucion = $institucion;
        $this->tipo = $tipo;
        $this->fecha_borrado = $fecha_borrado;
        $this->fecha_creacion = $fecha_creacion;
    }

    // GETTERS
    public function getId(): ?string { return $this->id; }
    public function getEstudio(): string { return $this->estudio; }
    public function getConApoyo(): bool { return $this->con_apoyo; }
    public function getInstitucion(): ?string { return $this->institucion; }
    public function getTipo(): ?string { return $this->tipo; }
    public function getFechaBorrado(): ?DateTime { return $this->fecha_borrado; }
    public function getFechaCreacion(): ?DateTime { return $this->fecha_creacion; }

    // SETTERS
    public function setId(string $id): void { $this->id = $id; }
    public function setEstudio(string $estudio): void { $this->estudio = $estudio; }
    public function setConApoyo(bool $con_apoyo): void { $this->con_apoyo = $con_apoyo; }
    public function setInstitucion(?string $institucion): void { $this->institucion = $institucion; }
    public function setTipo(?string $tipo): void { $this->tipo = $tipo; }
    public function setFechaBorrado(?DateTime $fecha_borrado): void { $this->fecha_borrado = $fecha_borrado; }
    public function setFechaCreacion(?DateTime $fecha_creacion): void { $this->fecha_creacion = $fecha_creacion; }
}
?>