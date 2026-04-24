<?php
// ============================================================
// MODELO - CLASE: Experiencia
// Representa la tabla 'experiencia' de la base de datos.
// ============================================================

class Experiencia {
    // Propiedades privadas
    private ?string $id;
    private string $nombre_cargo;
    private string $institucion;
    private ?string $tipo;
    private DateTime $fecha_inicio;
    private ?DateTime $fecha_fin;
    private string $docente;
    private ?DateTime $fecha_borrado;
    private ?DateTime $fecha_creacion;

    // Constructor
    public function __construct(
        ?string $id = null,
        string $nombre_cargo = '',
        string $institucion = '',
        ?string $tipo = null,
        ?DateTime $fecha_inicio = null,
        ?DateTime $fecha_fin = null,
        string $docente = '',
        ?DateTime $fecha_borrado = null,
        ?DateTime $fecha_creacion = null
    ) {
        $this->id = $id;
        $this->nombre_cargo = $nombre_cargo;
        $this->institucion = $institucion;
        $this->tipo = $tipo;
        $this->fecha_inicio = $fecha_inicio ?? new DateTime(); // asegura valor
        $this->fecha_fin = $fecha_fin;
        $this->docente = $docente;
        $this->fecha_borrado = $fecha_borrado;
        $this->fecha_creacion = $fecha_creacion;
    }

    // GETTERS
    public function getId(): ?string { return $this->id; }
    public function getNombreCargo(): string { return $this->nombre_cargo; }
    public function getInstitucion(): string { return $this->institucion; }
    public function getTipo(): ?string { return $this->tipo; }
    public function getFechaInicio(): DateTime { return $this->fecha_inicio; }
    public function getFechaFin(): ?DateTime { return $this->fecha_fin; }
    public function getDocente(): string { return $this->docente; }
    public function getFechaBorrado(): ?DateTime { return $this->fecha_borrado; }
    public function getFechaCreacion(): ?DateTime { return $this->fecha_creacion; }

    // SETTERS
    public function setId(string $id): void { $this->id = $id; }
    public function setNombreCargo(string $nombre_cargo): void { $this->nombre_cargo = $nombre_cargo; }
    public function setInstitucion(string $institucion): void { $this->institucion = $institucion; }
    public function setTipo(?string $tipo): void { $this->tipo = $tipo; }
    public function setFechaInicio(DateTime $fecha_inicio): void { $this->fecha_inicio = $fecha_inicio; }
    public function setFechaFin(?DateTime $fecha_fin): void { $this->fecha_fin = $fecha_fin; }
    public function setDocente(string $docente): void { $this->docente = $docente; }
    public function setFechaBorrado(?DateTime $fecha_borrado): void { $this->fecha_borrado = $fecha_borrado; }
    public function setFechaCreacion(?DateTime $fecha_creacion): void { $this->fecha_creacion = $fecha_creacion; }
}
?>