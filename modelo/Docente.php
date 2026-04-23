<?php
// ============================================================
// MODELO - CLASE: Docente
// Representa la tabla 'docente' de la base de datos.
// ============================================================

class Docente {
    // Propiedades privadas
    private ?string $id;
    private string $cedula;
    private string $nombres;
    private string $apellidos;
    private ?string $genero;
    private ?string $cargo;
    private ?DateTime $fecha_nacimiento;
    private ?string $correo;
    private ?string $telefono;
    private ?string $url_cvlac;
    private ?string $escalafon;
    private ?string $perfil;
    private ?string $cat_minciencia;
    private ?string $conv_minciencia;
    private ?string $nacionalidad;
    private ?string $linea_investigacion_principal;
    private ?DateTime $fecha_creacion;
    private ?DateTime $fecha_actualizacion;

    // Constructor
    public function __construct(
        ?string $id = null,
        string $cedula = '',
        string $nombres = '',
        string $apellidos = '',
        ?string $genero = null,
        ?string $cargo = null,
        ?DateTime $fecha_nacimiento = null,
        ?string $correo = null,
        ?string $telefono = null,
        ?string $url_cvlac = null,
        ?string $escalafon = null,
        ?string $perfil = null,
        ?string $cat_minciencia = null,
        ?string $conv_minciencia = null,
        ?string $nacionalidad = null,
        ?string $linea_investigacion_principal = null,
        ?DateTime $fecha_creacion = null,
        ?DateTime $fecha_actualizacion = null
    ) {
        $this->id = $id;
        $this->cedula = $cedula;
        $this->nombres = $nombres;
        $this->apellidos = $apellidos;
        $this->genero = $genero;
        $this->cargo = $cargo;
        $this->fecha_nacimiento = $fecha_nacimiento;
        $this->correo = $correo;
        $this->telefono = $telefono;
        $this->url_cvlac = $url_cvlac;
        $this->escalafon = $escalafon;
        $this->perfil = $perfil;
        $this->cat_minciencia = $cat_minciencia;
        $this->conv_minciencia = $conv_minciencia;
        $this->nacionalidad = $nacionalidad;
        $this->linea_investigacion_principal = $linea_investigacion_principal;
        $this->fecha_creacion = $fecha_creacion;
        $this->fecha_actualizacion = $fecha_actualizacion;
    }

    // GETTERS
    public function getId(): ?string { return $this->id; }
    public function getCedula(): string { return $this->cedula; }
    public function getNombres(): string { return $this->nombres; }
    public function getApellidos(): string { return $this->apellidos; }
    public function getGenero(): ?string { return $this->genero; }
    public function getCargo(): ?string { return $this->cargo; }
    public function getFechaNacimiento(): ?DateTime { return $this->fecha_nacimiento; }
    public function getCorreo(): ?string { return $this->correo; }
    public function getTelefono(): ?string { return $this->telefono; }
    public function getUrlCvlac(): ?string { return $this->url_cvlac; }
    public function getEscalafon(): ?string { return $this->escalafon; }
    public function getPerfil(): ?string { return $this->perfil; }
    public function getCatMinciencia(): ?string { return $this->cat_minciencia; }
    public function getConvMinciencia(): ?string { return $this->conv_minciencia; }
    public function getNacionalidad(): ?string { return $this->nacionalidad; }
    public function getLineaInvestigacionPrincipal(): ?string { return $this->linea_investigacion_principal; }
    public function getFechaCreacion(): ?DateTime { return $this->fecha_creacion; }
    public function getFechaActualizacion(): ?DateTime { return $this->fecha_actualizacion; }

    // SETTERS
    public function setId(string $id): void { $this->id = $id; }
    public function setCedula(string $cedula): void { $this->cedula = $cedula; }
    public function setNombres(string $nombres): void { $this->nombres = $nombres; }
    public function setApellidos(string $apellidos): void { $this->apellidos = $apellidos; }
    public function setGenero(?string $genero): void { $this->genero = $genero; }
    public function setCargo(?string $cargo): void { $this->cargo = $cargo; }
    public function setFechaNacimiento(?DateTime $fecha_nacimiento): void { $this->fecha_nacimiento = $fecha_nacimiento; }
    public function setCorreo(?string $correo): void { $this->correo = $correo; }
    public function setTelefono(?string $telefono): void { $this->telefono = $telefono; }
    public function setUrlCvlac(?string $url_cvlac): void { $this->url_cvlac = $url_cvlac; }
    public function setEscalafon(?string $escalafon): void { $this->escalafon = $escalafon; }
    public function setPerfil(?string $perfil): void { $this->perfil = $perfil; }
    public function setCatMinciencia(?string $cat_minciencia): void { $this->cat_minciencia = $cat_minciencia; }
    public function setConvMinciencia(?string $conv_minciencia): void { $this->conv_minciencia = $conv_minciencia; }
    public function setNacionalidad(?string $nacionalidad): void { $this->nacionalidad = $nacionalidad; }
    public function setLineaInvestigacionPrincipal(?string $linea_investigacion_principal): void { $this->linea_investigacion_principal = $linea_investigacion_principal; }
    public function setFechaCreacion(?DateTime $fecha_creacion): void { $this->fecha_creacion = $fecha_creacion; }
    public function setFechaActualizacion(?DateTime $fecha_actualizacion): void { $this->fecha_actualizacion = $fecha_actualizacion; }
}
?>