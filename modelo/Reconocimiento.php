<?php
// ============================================================
// MODELO - CLASE: Reconocimiento
// Representa la tabla 'reconocimiento' de la base de datos.
// ============================================================

class Reconocimiento {
    // Propiedades privadas
    private ?string $id;
    private string $tipo;
    private string $nombre;
    private ?string $institucion;
    private ?string $ambito;
    private ?DateTime $fecha;
    private string $docente;
    private ?DateTime $fecha_borrado;
    private ?DateTime $fecha_creacion;

    // Constructor
    public function __construct(
        ?string $id = null,
        string $tipo = '',
        string $nombre = '',
        ?string $institucion = null,
        ?string $ambito = null,
        ?DateTime $fecha = null,
        string $docente = '',
        ?DateTime $fecha_borrado = null,
        ?DateTime $fecha_creacion = null
    ) {
        $this->id = $id;
        $this->tipo = $tipo;
        $this->nombre = $nombre;
        $this->institucion = $institucion;
        $this->ambito = $ambito;
        $this->fecha = $fecha;
        $this->docente = $docente;
        $this->fecha_borrado = $fecha_borrado;
        $this->fecha_creacion = $fecha_creacion;
    }

    // GETTERS
    public function getId(): ?string { return $this->id; }
    public function getTipo(): string { return $this->tipo; }
    public function getNombre(): string { return $this->nombre; }
    public function getInstitucion(): ?string { return $this->institucion; }
    public function getAmbito(): ?string { return $this->ambito; }
    public function getFecha(): ?DateTime { return $this->fecha; }
    public function getDocente(): string { return $this->docente; }
    public function getFechaBorrado(): ?DateTime { return $this->fecha_borrado; }
    public function getFechaCreacion(): ?DateTime { return $this->fecha_creacion; }

    // SETTERS
    public function setId(string $id): void { $this->id = $id; }
    public function setTipo(string $tipo): void { $this->tipo = $tipo; }
    public function setNombre(string $nombre): void { $this->nombre = $nombre; }
    public function setInstitucion(?string $institucion): void { $this->institucion = $institucion; }
    public function setAmbito(?string $ambito): void { $this->ambito = $ambito; }
    public function setFecha(?DateTime $fecha): void { $this->fecha = $fecha; }
    public function setDocente(string $docente): void { $this->docente = $docente; }
    public function setFechaBorrado(?DateTime $fecha_borrado): void { $this->fecha_borrado = $fecha_borrado; }
    public function setFechaCreacion(?DateTime $fecha_creacion): void { $this->fecha_creacion = $fecha_creacion; }
}
?>