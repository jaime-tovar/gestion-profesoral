<?php
// ============================================================
// MODELO - CLASE: Programa
// Representa la tabla 'programa' de la base de datos.
// ============================================================

class Programa {

    // Propiedades privadas que corresponden a las columnas de la tabla 'programa'.
    private ?string $id;
    private string $nombre;
    private string $tipo;
    private string $nivel;
    private ?DateTime $fecha_cierre;
    private string $numero_cohortes;
    private string $cant_graduados;
    private string $ciudad;
    private int $facultad;
    private ?DateTime $fecha_borrado;
    private ?DateTime $fecha_creacion;  

    // Constructor: se llama al crear un nuevo objeto de esta clase.
    public function __construct(
        ?string $id = '',
        string $nombre = '',
        string $tipo = '',
        string $nivel = '',
        ?DateTime $fecha_cierre = null,
        string $numero_cohortes = '',
        string $cant_graduados = '',
        string $ciudad = '',
        int $facultad = 0,
        ?DateTime $fecha_borrado = null,
        ?DateTime $fecha_creacion = null
    ) {
        // $this hace referencia al objeto actual que se está creando.
        $this->id         = $id;
        $this->nombre    = $nombre;
        $this->tipo       = $tipo;
        $this->nivel      = $nivel;
        $this->fecha_cierre   = $fecha_cierre;
        $this->numero_cohortes = $numero_cohortes;
        $this->cant_graduados  = $cant_graduados;
        $this->ciudad      = $ciudad;
        $this->facultad    = $facultad;
        $this->fecha_borrado = null;
        $this->fecha_creacion = $fecha_creacion;
    }

    // GETTERS: métodos para ACCEDER a las propiedades privadas.
    // Se nombran con get + NombrePropiedad.
    public function getId(): string   { return $this->id; }
    public function getNombre(): string   { return $this->nombre; }
    public function getTipo(): string   { return $this->tipo; }
    public function getNivel(): string   { return $this->nivel; }
    public function getFechaCierre(): ?DateTime   { return $this->fecha_cierre; }
    public function getNumeroCohortes(): string   { return $this->numero_cohortes; }
    public function getCantGraduados(): string   { return $this->cant_graduados; }
    public function getCiudad(): string   { return $this->ciudad; }
    public function getFacultad(): int   { return $this->facultad; }
    public function getFechaBorrado(): ?DateTime { return $this->fecha_borrado; }
    public function getFechaCreacion(): ?DateTime { return $this->fecha_creacion; }
    // SETTERS: métodos para MODIFICAR las propiedades privadas.
    public function setId(string $id): void     { $this->id = $id; }
    public function setNombre(string $nombre): void     { $this->nombre = $nombre; }
    public function setTipo(string $tipo): void     { $this->tipo = $tipo; }
    public function setNivel(string $nivel): void     { $this->nivel = $nivel; }
    public function setFechaCierre(?DateTime $fecha_cierre): void     { $this->fecha_cierre = $fecha_cierre; }
    public function setNumeroCohortes(string $numero_cohortes): void     { $this->numero_cohortes = $numero_cohortes; }
    public function setCantGraduados(string $cant_graduados): void     { $this->cant_graduados = $cant_graduados; }
    public function setCiudad(string $ciudad): void     { $this->ciudad = $ciudad; }
    public function setFacultad(int $facultad): void     { $this->facultad = $facultad; }
    public function setFechaBorrado(?DateTime $fecha_borrado): void     { $this->fecha_borrado = $fecha_borrado; }
    public function setFechaCreacion(?DateTime $fecha_creacion): void     { $this->fecha_creacion = $fecha_creacion; }
}