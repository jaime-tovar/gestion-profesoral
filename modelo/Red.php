<?php
// ============================================================
// MODELO - CLASE: Red
// Representa la tabla 'red' de la base de datos.
// ============================================================

class Red {

    // Propiedades privadas que corresponden a las columnas de la tabla 'red'.
    private string $id;
    private string $nombre;
    private string $url;
    private string $pais;
    private ?DateTime $fecha_borrado;

    // Constructor: se llama al crear un nuevo objeto de esta clase.
    public function __construct(
        ?string $id = null,
        string $nombre = '',
        string $url = '',
        string $pais = '',
        ?DateTime $fecha_borrado = null
    ) {
        // $this hace referencia al objeto actual que se está creando.
        $this->id         = $id;
        $this->nombre    = $nombre;
        $this->url = $url;
        $this->pais = $pais;
        $this->fecha_borrado = $fecha_borrado;
    }

    // GETTERS: métodos para ACCEDER a las propiedades privadas.
    // Se nombran con get + NombrePropiedad.
    public function getId(): string   { return $this->id; }
    public function getNombre(): string   { return $this->nombre; }
    public function getUrl(): string   { return $this->url; }
    public function getPais(): string   { return $this->pais; }
    public function getFechaBorrado(): ?DateTime { return $this->fecha_borrado; }

    // SETTERS: métodos para MODIFICAR las propiedades privadas.
    // Se nombran con set + NombrePropiedad.
    public function setId(string $id): void     { $this->id = $id; }
    public function setNombre(string $nombre): void     { $this->nombre = $nombre; }
    public function setUrl(string $url): void     { $this->url = $url; }
    public function setPais(string $pais): void     { $this->pais = $pais; }
    public function setFechaBorrado(?DateTime $fecha_borrado): void { $this->fecha_borrado = $fecha_borrado; }

}
?>