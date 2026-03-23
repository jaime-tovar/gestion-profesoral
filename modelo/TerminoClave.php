<?php
// ============================================================
// MODELO - CLASE: TerminoClave
// Representa la tabla 'termino_clave' de la base de datos.
// Tabla termino_clave: id (PK), termino, termino_ingles
// ============================================================

class TerminoClave {

    // Propiedades privadas que corresponden a las columnas de la tabla 'termino_clave'.
    private string $id;        // Corresponde a la columna 'id' VARCHAR(36) PK con UUID()
    private string $termino;      // Corresponde a la columna 'termino' VARCHAR(30)
    private string $termino_ingles; // Corresponde a la columna 'termino_ingles' VARCHAR(30)

    // Constructor: se llama al crear un nuevo objeto de esta clase.
    public function __construct($id = '', $termino = '', $termino_ingles = '') {
        // $this hace referencia al objeto actual que se está creando.
        $this->id         = $id;
        $this->termino    = $termino;
        $this->termino_ingles = $termino_ingles;
    }

    // GETTERS: métodos para ACCEDER a las propiedades privadas.
    // Se nombran con get + NombrePropiedad.
    public function getId(): string   { return $this->id; }
    public function getTermino(): string   { return $this->termino; }
    public function getTerminoIngles(): string { return $this->termino_ingles; }

    // SETTERS: métodos para MODIFICAR las propiedades privadas.
    // Se nombran con set + NombrePropiedad.
    public function setId(string $id): void     { $this->id = $id; }
    public function setTermino(string $termino): void     { $this->termino = $termino; }
    public function setTerminoIngles(string $termino_ingles): void { $this->termino_ingles = $termino_ingles; }
}
?>