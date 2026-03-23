<?php
// ============================================================
// MODELO - CLASE: TerminoClave
// Representa la tabla 'termino_clave' de la base de datos.
// ============================================================

class TerminoClave {

    // Propiedades privadas que corresponden a las columnas de la tabla 'termino_clave'.
    private ?string $id;
    private string $termino;
    private string $termino_ingles;
    private ?DateTime $fecha_borrado;

    // Constructor: se llama al crear un nuevo objeto de esta clase.
    public function __construct(
        ?string $id = null,
        string $termino = '',
        string $termino_ingles = '',
        ?DateTime $fecha_borrado = null
    ) {
        // $this hace referencia al objeto actual que se está creando.
        $this->id         = $id;
        $this->termino    = $termino;
        $this->termino_ingles = $termino_ingles;
        $this->fecha_borrado = $fecha_borrado;
    }

    // GETTERS: métodos para ACCEDER a las propiedades privadas.
    // Se nombran con get + NombrePropiedad.
    public function getId(): string   { return $this->id; }
    public function getTermino(): string   { return $this->termino; }
    public function getTerminoIngles(): string { return $this->termino_ingles; }
    public function getFechaBorrado(): ?DateTime { return $this->fecha_borrado; }

    // SETTERS: métodos para MODIFICAR las propiedades privadas.
    // Se nombran con set + NombrePropiedad.
    public function setId(string $id): void     { $this->id = $id; }
    public function setTermino(string $termino): void     { $this->termino = $termino; }
    public function setTerminoIngles(string $termino_ingles): void { $this->termino_ingles = $termino_ingles; }
    public function setFechaBorrado(?DateTime $fecha_borrado): void { $this->fecha_borrado = $fecha_borrado; }
}
?>