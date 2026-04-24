<?php
// ============================================================
// MODELO - CLASE: EstudiosRealizados
// Representa la tabla 'estudios_realizados' de la base de datos.
// ============================================================

class EstudiosRealizados {
    // Propiedades privadas
    private ?string $id;
    private string $docente;
    private string $titulo;
    private string $universidad;
    private ?DateTime $fecha;
    private ?string $tipo;
    private ?string $ciudad;
    private ?string $pais;
    private ?bool $ins_acreditada;
    private ?string $metodologia;
    private ?string $perfil_egresado;
    private ?DateTime $fecha_borrado;
    private ?DateTime $fecha_creacion;

    // Constructor
    public function __construct(
        ?string $id = null,
        string $docente = '',
        string $titulo = '',
        string $universidad = '',
        ?DateTime $fecha = null,
        ?string $tipo = null,
        ?string $ciudad = null,
        ?string $pais = null,
        ?bool $ins_acreditada = null,
        ?string $metodologia = null,
        ?string $perfil_egresado = null,
        ?DateTime $fecha_creacion = null,
        ?DateTime $fecha_borrado = null
    ) {
        $this->id = $id;
        $this->docente = $docente;
        $this->titulo = $titulo;
        $this->universidad = $universidad;
        $this->fecha = $fecha;
        $this->tipo = $tipo;
        $this->ciudad = $ciudad;
        $this->pais = $pais;
        $this->ins_acreditada = $ins_acreditada;
        $this->metodologia = $metodologia;
        $this->perfil_egresado = $perfil_egresado;
        $this->fecha_creacion = $fecha_creacion;
        $this->fecha_borrado = $fecha_borrado;
    }

    // GETTERS
    public function getId(): ?string { return $this->id; }
    public function getDocente(): string { return $this->docente; }
    public function getTitulo(): string { return $this->titulo; }
    public function getUniversidad(): string { return $this->universidad; }
    public function getFecha(): ?DateTime { return $this->fecha; }
    public function getTipo(): ?string { return $this->tipo; }
    public function getCiudad(): ?string { return $this->ciudad; }
    public function getPais(): ?string { return $this->pais; }
    public function getInsAcreditada(): ?bool { return $this->ins_acreditada; }
    public function getMetodologia(): ?string { return $this->metodologia; }
    public function getPerfilEgresado(): ?string { return $this->perfil_egresado; }
    public function getFechaCreacion(): ?DateTime { return $this->fecha_creacion; }
    public function getFechaBorrado(): ?DateTime { return $this->fecha_borrado; }

    // SETTERS
    public function setId(string $id): void { $this->id = $id; }
    public function setDocente(string $docente): void { $this->docente = $docente; }
    public function setTitulo(string $titulo): void { $this->titulo = $titulo; }
    public function setUniversidad(string $universidad): void { $this->universidad = $universidad; }
    public function setFecha(?DateTime $fecha): void { $this->fecha = $fecha; }
    public function setTipo(?string $tipo): void { $this->tipo = $tipo; }
    public function setCiudad(?string $ciudad): void { $this->ciudad = $ciudad; }
    public function setPais(?string $pais): void { $this->pais = $pais; }
    public function setInsAcreditada(?bool $ins_acreditada): void { $this->ins_acreditada = $ins_acreditada; }
    public function setMetodologia(?string $metodologia): void { $this->metodologia = $metodologia; }
    public function setPerfilEgresado(?string $perfil_egresado): void { $this->perfil_egresado = $perfil_egresado; }
    public function setFechaCreacion(?DateTime $fecha_creacion): void { $this->fecha_creacion = $fecha_creacion; }
    public function setFechaBorrado(?DateTime $fecha_borrado): void { $this->fecha_borrado = $fecha_borrado; }
}
?>