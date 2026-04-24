<?php
// ============================================================
// MODELO - CLASE: InteresesFuturos
// Representa la tabla 'intereses_futuros' de la base de datos.
// ============================================================

class InteresesFuturos {
    // Propiedades privadas
    private ?string $id;
    private string $docente;
    private string $termino_clave;
    private ?DateTime $fecha_borrado;
    private ?DateTime $fecha_creacion;

    // Constructor
    public function __construct(
        ?string $id = null,
        string $docente = '',
        string $termino_clave = '',
        ?DateTime $fecha_borrado = null,
        ?DateTime $fecha_creacion = null,
    ) {
        $this->id = $id;
        $this->docente = $docente;
        $this->termino_clave = $termino_clave;
        $this->fecha_borrado = $fecha_borrado;
        $this->fecha_creacion = $fecha_creacion;
    }

    // GETTERS
    public function getId(): ?string { return $this->id; }
    public function getDocente(): string { return $this->docente; }
    public function getTerminoClave(): string { return $this->termino_clave; }
    public function getFechaBorrado(): ?DateTime { return $this->fecha_borrado; }
    public function getFechaCreacion(): ?DateTime { return $this->fecha_creacion; }

    // SETTERS
    public function setId(string $id): void { $this->id = $id; }
    public function setDocente(string $docente): void { $this->docente = $docente; }
    public function setTerminoClave(string $termino_clave): void { $this->termino_clave = $termino_clave; }
    public function setFechaBorrado(?DateTime $fecha_borrado): void { $this->fecha_borrado = $fecha_borrado; }
    public function setFechaCreacion(?DateTime $fecha_creacion): void { $this->fecha_creacion = $fecha_creacion; }
}
?>