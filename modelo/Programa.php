<?php
// ============================================================
// MODELO - CLASE: Programa
// Representa la tabla 'programa' de la base de datos.
// Tabla programa: id (PK), nombre, tipo, nivel, fecha_creacion, fecha_cierre, numero_cohortes, cant_graduados, fecha_actualizacion, ciudad, facultad
// ============================================================

class Programa {

    // Propiedades privadas que corresponden a las columnas de la tabla 'programa'.
    private string $id;        // Corresponde a la columna 'id' VARCHAR(36) PK con UUID()
    private string $nombre;      // Corresponde a la columna 'nombre' VARCHAR(100)
    private string $tipo;        // Corresponde a la columna 'tipo' VARCHAR(45)
    private string $nivel;       // Corresponde a la columna 'nivel' VARCHAR(45)
    private ?DateTime $fecha_creacion; // Corresponde a la columna 'fecha_creacion' DATETIME
    private ?DateTime $fecha_cierre;   // Corresponde a la columna 'fecha_cierre' DATETIME
    private string $numero_cohortes; // Corresponde a la columna 'numero_cohortes' VARCHAR(45)
    private string $cant_graduados;  // Corresponde a la columna 'cant_graduados' VARCHAR(45)
    private ?DateTime $fecha_actualizacion; // Corresponde a la columna 'fecha_actualizacion' DATETIME
    private string $ciudad;      // Corresponde a la columna 'ciudad' VARCHAR(45)
    private int $facultad;        // Corresponde a la columna 'facultad' INT

    // Constructor: se llama al crear un nuevo objeto de esta clase.
    public function __construct(
        $id = '',
        $nombre = '',
        $tipo = '',
        $nivel = '',
        $fecha_creacion = null,
        $fecha_cierre = null,
        $numero_cohortes = '',
        $cant_graduados = '',
        $fecha_actualizacion = null,
        $ciudad = '',
        $facultad = 0
    ) {
        // $this hace referencia al objeto actual que se está creando.
        $this->id         = $id;
        $this->nombre    = $nombre;
        $this->tipo       = $tipo;
        $this->nivel      = $nivel;
        $this->fecha_creacion = $fecha_creacion;
        $this->fecha_cierre   = $fecha_cierre;
        $this->numero_cohortes = $numero_cohortes;
        $this->cant_graduados  = $cant_graduados;
        $this->fecha_actualizacion = $fecha_actualizacion;
        $this->ciudad      = $ciudad;
        $this->facultad    = $facultad;
    }

    // GETTERS: métodos para ACCEDER a las propiedades privadas.
    // Se nombran con get + NombrePropiedad.
    public function getId(): string   { return $this->id; }
    public function getNombre(): string   { return $this->nombre; }
    public function getTipo(): string   { return $this->tipo; }
    public function getNivel(): string   { return $this->nivel; }
    public function getFechaCreacion(): ?DateTime   { return $this->fecha_creacion; }
    public function getFechaCierre(): ?DateTime   { return $this->fecha_cierre; }
    public function getNumeroCohortes(): string   { return $this->numero_cohortes; }
    public function getCantGraduados(): string   { return $this->cant_graduados; }
    public function getFechaActualizacion(): ?DateTime   { return $this->fecha_actualizacion; }
    public function getCiudad(): string   { return $this->ciudad; }
    public function getFacultad(): int   { return $this->facultad; }

    // SETTERS: métodos para MODIFICAR las propiedades privadas.
    // Se nombran con set + NombrePropiedad.
    public function setId(string $id): void     { $this->id = $id; }
    public function setNombre(string $nombre): void     { $this->nombre = $nombre; }
    public function setTipo(string $tipo): void     { $this->tipo = $tipo; }
    public function setNivel(string $nivel): void     { $this->nivel = $nivel; }
    public function setFechaCreacion(?DateTime $fecha_creacion): void     { $this->fecha_creacion = $fecha_creacion; }
    public function setFechaCierre(?DateTime $fecha_cierre): void     { $this->fecha_cierre = $fecha_cierre; }
    public function setNumeroCohortes(string $numero_cohortes): void     { $this->numero_cohortes = $numero_cohortes; }
    public function setCantGraduados(string $cant_graduados): void     { $this->cant_graduados = $cant_graduados; }
    public function setFechaActualizacion(?DateTime $fecha_actualizacion): void     { $this->fecha_actualizacion = $fecha_actualizacion; }
    public function setCiudad(string $ciudad): void     { $this->ciudad = $ciudad; }
    public function setFacultad(int $facultad): void     { $this->facultad = $facultad; }
}
?>