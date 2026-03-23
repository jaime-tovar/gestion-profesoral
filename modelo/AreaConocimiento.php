<?php
// ============================================================
// MODELO - CLASE: AreaConocimiento
// Representa la tabla 'area_conocimiento' de la base de datos.
// Tabla area_conocimiento: id (PK), gran_area, area, disciplina
// ============================================================

class AreaConocimiento {

    // Propiedades privadas que corresponden a las columnas de la tabla 'area_conocimiento'.
    private string $id;        // Corresponde a la columna 'id' VARCHAR(36) PK con UUID()
    private string $gran_area; // Corresponde a la columna 'gran_area' VARCHAR(60)
    private string $area;      // Corresponde a la columna 'area' VARCHAR(60)
    private string $disciplina; // Corresponde a la columna 'disciplina' VARCHAR(60)

    // Constructor: se llama al crear un nuevo objeto de esta clase.
    public function __construct($id = '', $gran_area = '', $area = '', $disciplina = '') {
        // $this hace referencia al objeto actual que se está creando.
        $this->id         = $id;
        $this->gran_area  = $gran_area;
        $this->area       = $area;
        $this->disciplina = $disciplina;
    }

    // GETTERS: métodos para ACCEDER a las propiedades privadas.
    // Se nombran con get + NombrePropiedad.
    public function getId(): string   { return $this->id; }
    public function getGranArea(): string   { return $this->gran_area; }
    public function getArea(): string   { return $this->area; }
    public function getDisciplina(): string { return $this->disciplina; }

    // SETTERS: métodos para MODIFICAR las propiedades privadas.
    // Se nombran con set + NombrePropiedad.
    public function setId(string $id): void     { $this->id = $id; }
    public function setGranArea(string $gran_area): void     { $this->gran_area = $gran_area; }
    public function setArea(string $area): void     { $this->area = $area; }
    public function setDisciplina(string $disciplina): void { $this->disciplina = $disciplina; }
}
?>