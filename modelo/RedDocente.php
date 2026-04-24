<?php
// ============================================================
// MODELO - CLASE: RedDocente
// Representa la tabla 'red_docente' de la base de datos.
// ============================================================

class RedDocente {
    // Propiedades privadas
    private ?string $id;
    private string $red;
    private string $docente;
    private ?DateTime $fecha_inicio;
    private ?DateTime $fecha_fin;
    private ?string $act_destacadas;
    private ?DateTime $fecha_borrado;
    private ?DateTime $fecha_creacion;

    // Constructor
    public function __construct(
        ?string $id = null,
        string $red = '',
        string $docente = '',
        ?DateTime $fecha_inicio = null,
        ?DateTime $fecha_fin = null,
        ?string $act_destacadas = null,
        ?DateTime $fecha_borrado = null,
        ?DateTime $fecha_creacion = null
    ) {
        $this->id = $id;
        $this->red = $red;
        $this->docente = $docente;
        $this->fecha_inicio = $fecha_inicio;
        $this->fecha_fin = $fecha_fin;
        $this->act_destacadas = $act_destacadas;
        $this->fecha_borrado = $fecha_borrado;
        $this->fecha_creacion = $fecha_creacion;
    }

    // GETTERS
    public function getId(): ?string { return $this->id; }
    public function getRed(): string { return $this->red; }
    public function getDocente(): string { return $this->docente; }
    public function getFechaInicio(): ?DateTime { return $this->fecha_inicio; }
    public function getFechaFin(): ?DateTime { return $this->fecha_fin; }
    public function getActDestacadas(): ?string { return $this->act_destacadas; }
    public function getFechaBorrado(): ?DateTime { return $this->fecha_borrado; }
    public function getFechaCreacion(): ?DateTime { return $this->fecha_creacion; }

    // SETTERS
    public function setId(string $id): void { $this->id = $id; }
    public function setRed(string $red): void { $this->red = $red; }
    public function setDocente(string $docente): void { $this->docente = $docente; }
    public function setFechaInicio(?DateTime $fecha_inicio): void { $this->fecha_inicio = $fecha_inicio; }
    public function setFechaFin(?DateTime $fecha_fin): void { $this->fecha_fin = $fecha_fin; }
    public function setActDestacadas(?string $act_destacadas): void { $this->act_destacadas = $act_destacadas; }
    public function setFechaBorrado(?DateTime $fecha_borrado): void { $this->fecha_borrado = $fecha_borrado; }
    public function setFechaCreacion(?DateTime $fecha_creacion): void { $this->fecha_creacion = $fecha_creacion; }
}
?>