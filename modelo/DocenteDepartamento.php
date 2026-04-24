<?php
// ============================================================
// MODELO - CLASE: DocenteDepartamento
// Representa la tabla 'docente_departamento' de la base de datos.
// ============================================================

class DocenteDepartamento {
    // Propiedades privadas
    private ?string $id;
    private string $docente;
    private string $programa;
    private ?string $dedicacion;
    private ?string $modalidad;
    private ?DateTime $fecha_ingreso;
    private ?DateTime $fecha_salida;
    private ?DateTime $fecha_borrado;
    private ?DateTime $fecha_creacion;

    // Constructor
    public function __construct(
        ?string $id = null,
        string $docente = '',
        string $programa = '',
        ?string $dedicacion = null,
        ?string $modalidad = null,
        ?DateTime $fecha_ingreso = null,
        ?DateTime $fecha_salida = null,
        ?DateTime $fecha_borrado = null,
        ?DateTime $fecha_creacion = null,
    ) {
        $this->id = $id;
        $this->docente = $docente;
        $this->programa = $programa;
        $this->dedicacion = $dedicacion;
        $this->modalidad = $modalidad;
        $this->fecha_ingreso = $fecha_ingreso;
        $this->fecha_salida = $fecha_salida;
        $this->fecha_borrado = $fecha_borrado;
        $this->fecha_creacion = $fecha_creacion;
    }

    // GETTERS
    public function getId(): ?string { return $this->id; }
    public function getDocente(): string { return $this->docente; }
    public function getPrograma(): string { return $this->programa; }
    public function getDedicacion(): ?string { return $this->dedicacion; }
    public function getModalidad(): ?string { return $this->modalidad; }
    public function getFechaIngreso(): ?DateTime { return $this->fecha_ingreso; }
    public function getFechaSalida(): ?DateTime { return $this->fecha_salida; }
    public function getFechaBorrado(): ?DateTime { return $this->fecha_borrado; }
    public function getFechaCreacion(): ?DateTime { return $this->fecha_creacion; }

    // SETTERS
    public function setId(string $id): void { $this->id = $id; }
    public function setDocente(string $docente): void { $this->docente = $docente; }
    public function setPrograma(string $programa): void { $this->programa = $programa; }
    public function setDedicacion(?string $dedicacion): void { $this->dedicacion = $dedicacion; }
    public function setModalidad(?string $modalidad): void { $this->modalidad = $modalidad; }
    public function setFechaIngreso(?DateTime $fecha_ingreso): void { $this->fecha_ingreso = $fecha_ingreso; }
    public function setFechaSalida(?DateTime $fecha_salida): void { $this->fecha_salida = $fecha_salida; }
    public function setFechaBorrado(?DateTime $fecha_borrado): void { $this->fecha_borrado = $fecha_borrado; }
    public function setFechaCreacion(?DateTime $fecha_creacion): void { $this->fecha_creacion = $fecha_creacion; }
}
?>