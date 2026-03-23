<?php
// ============================================================
// MODELO - CLASE: Red
// Representa la tabla 'red' de la base de datos.
// Tabla red: id (PK), nombre, url, pais
// ============================================================

class Red {

    // Propiedades privadas que corresponden a las columnas de la tabla 'red'.
    private string $id;        // Corresponde a la columna 'id' VARCHAR(36) PK con UUID()
    private string $nombre;      // Corresponde a la columna 'nombre' VARCHAR(45)
    private string $url; // Corresponde a la columna 'url' VARCHAR(45)
    private string $pais; // Corresponde a la columna 'pais' VARCHAR(45)

    // Constructor: se llama al crear un nuevo objeto de esta clase.
    public function __construct($id = '', $nombre = '', $url = '', $pais = '') {
        // $this hace referencia al objeto actual que se está creando.
        $this->id         = $id;
        $this->nombre    = $nombre;
        $this->url = $url;
        $this->pais = $pais;
    }

    // GETTERS: métodos para ACCEDER a las propiedades privadas.
    // Se nombran con get + NombrePropiedad.
    public function getId(): string   { return $this->id; }
    public function getNombre(): string   { return $this->nombre; }
    public function getUrl(): string   { return $this->url; }
    public function getPais(): string   { return $this->pais; }

    // SETTERS: métodos para MODIFICAR las propiedades privadas.
    // Se nombran con set + NombrePropiedad.
    public function setId(string $id): void     { $this->id = $id; }
    public function setNombre(string $nombre): void     { $this->nombre = $nombre; }
    public function setUrl(string $url): void     { $this->url = $url; }
    public function setPais(string $pais): void     { $this->pais = $pais; }
}
?>