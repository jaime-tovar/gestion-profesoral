<?php
// ============================================================
// MODELO - CLASE: LineaInvestigacion
// Representa la tabla 'linea_investigacion' de la base de datos.
// Tabla linea_investigacion: id (PK), nombre, descripcion
// ============================================================

class LineaInvestigacion {

    // Propiedades privadas que corresponden a las columnas de la tabla 'linea_investigacion'.
    private ?string $id;
    private string $nombre;
    private string $descripcion;
    private ?DateTime $fecha_borrado;
    private ?DateTime $fecha_creacion;

    // Constructor: se llama al crear un nuevo objeto de esta clase.
    public function __construct(
        ?string $id = null,
        string $nombre = '',
        string $descripcion = '',
        ?DateTime $fecha_borrado = null,
        ?DateTime $fecha_creacion = null
    ) {
        // $this hace referencia al objeto actual que se está creando.
        $this->id         = $id;
        $this->nombre    = $nombre;
        $this->descripcion = $descripcion;
        $this->fecha_borrado = $fecha_borrado;
        $this->fecha_creacion = $fecha_creacion;


    }

    // GETTERS: métodos para ACCEDER a las propiedades privadas.
    public function getId(): ?string   { return $this->id; }
    public function getNombre(): string   { return $this->nombre; }
    public function getDescripcion(): string { return $this->descripcion; }
    public function getFechaBorrado(): ?DateTime { return $this->fecha_borrado; }
    public function getFechaCreacion(): ?DateTime { return $this->fecha_creacion; }

    // SETTERS: métodos para MODIFICAR las propiedades privadas.
    public function setId(?string $id): void     { $this->id = $id; }
    public function setNombre(string $nombre): void     { $this->nombre = $nombre; }
    public function setDescripcion(string $descripcion): void { $this->descripcion = $descripcion; }
    public function setFechaBorrado(?DateTime $fecha_borrado): void { $this->fecha_borrado = $fecha_borrado; }
    public function setFechaCreacion(?DateTime $fecha_creacion): void { $this->fecha_creacion = $fecha_creacion; }
}
?>