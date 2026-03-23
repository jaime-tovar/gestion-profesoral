<?php
// ============================================================
// MODELO - CLASE: LineaInvestigacion
// Representa la tabla 'linea_investigacion' de la base de datos.
// Tabla linea_investigacion: id (PK), nombre, descripcion
// ============================================================

class LineaInvestigacion {

    // Propiedades privadas que corresponden a las columnas de la tabla 'linea_investigacion'.
    private string $id;        // Corresponde a la columna 'id' VARCHAR(36) PK con UUID()
    private string $nombre;      // Corresponde a la columna 'nombre' VARCHAR(100)
    private string $descripcion; // Corresponde a la columna 'descripcion' TEXT

    // Constructor: se llama al crear un nuevo objeto de esta clase.
    public function __construct($id = '', $nombre = '', $descripcion = '') {
        // $this hace referencia al objeto actual que se está creando.
        $this->id         = $id;
        $this->nombre    = $nombre;
        $this->descripcion = $descripcion;
    }

    // GETTERS: métodos para ACCEDER a las propiedades privadas.
    // Se nombran con get + NombrePropiedad.
    public function getId(): string   { return $this->id; }
    public function getNombre(): string   { return $this->nombre; }
    public function getDescripcion(): string { return $this->descripcion; }

    // SETTERS: métodos para MODIFICAR las propiedades privadas.
    // Se nombran con set + NombrePropiedad.
    public function setId(string $id): void     { $this->id = $id; }
    public function setNombre(string $nombre): void     { $this->nombre = $nombre; }
    public function setDescripcion(string $descripcion): void { $this->descripcion = $descripcion; }
}
?>