<?php
// ============================================================
// MODELO - CLASE: AreaConocimiento
// Representa la tabla 'area_conocimiento' de la base de datos.
// ============================================================

class AreaConocimiento {

    // Propiedades privadas que corresponden a las columnas de la tabla 'area_conocimiento'.
    private ?string $id;
    private string $gran_area;
    private string $area;
    private string $disciplina;
    private ?DateTime $fecha_borrado;

    // Constructor: se llama al crear un nuevo objeto de esta clase.
    public function __construct(
        ?string $id = null,
        string $gran_area = '',
        string $area = '',
        string $disciplina = '',
        ?DateTime $fecha_borrado = null
    ) {
        // $this hace referencia al objeto actual que se está creando.
        $this->id         = $id;
        $this->gran_area  = $gran_area;
        $this->area       = $area;
        $this->disciplina = $disciplina;
        $this->fecha_borrado = $fecha_borrado;
    }

    // GETTERS: métodos para ACCEDER a las propiedades privadas.
    public function getId(): ?string   { return $this->id; }
    public function getGranArea(): string   { return $this->gran_area; }
    public function getArea(): string   { return $this->area; }
    public function getDisciplina(): string { return $this->disciplina; }
    public function getFechaBorrado(): ?DateTime { return $this->fecha_borrado; }

    // SETTERS: métodos para MODIFICAR las propiedades privadas.
    public function setId(?string $id): void     { $this->id = $id; }
    public function setGranArea(string $gran_area): void     { $this->gran_area = $gran_area; }
    public function setArea(string $area): void     { $this->area = $area; }
    public function setDisciplina(string $disciplina): void { $this->disciplina = $disciplina; }
    public function setFechaBorrado(?DateTime $fecha_borrado): void { $this->fecha_borrado = $fecha_borrado; }
}
?>