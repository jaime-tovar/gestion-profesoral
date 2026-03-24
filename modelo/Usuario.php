<?php
// ============================================================
// MODELO - CLASE: Usuario
// Representa la tabla 'usuario' de la base de datos.
// ============================================================


class Usuario{
    // Propiedades privadas que corresponden a las columnas de la tabla 'usuario'.
    private ?string $id;
    private string $username;
    private string $password;
    private string $email;
    private string $nombre_completo;
    private int $activo;
    private ?DateTime $fecha_creacion;
    private ?DateTime $fecha_actualizacion;



    // Constructor: se llama al crear un nuevo objeto de esta clase.
    public function __construct(
        ?string $id = null,
        string $username = '',
        string $password = '',
        string $email = '',
        string $nombre_completo = '',
        int $activo = 1,
        ?DateTime $fecha_creacion = null,
        ?DateTime $fecha_actualizacion = null
    ) {
        // $this hace referencia al objeto actual que se está creando.
        $this->id         = $id;
        $this->username    = $username;
        $this->password = $password;
        $this->email = $email;
        $this->nombre_completo = $nombre_completo;
        $this->activo = $activo;
        $this->fecha_creacion = $fecha_creacion;
        $this->fecha_actualizacion = $fecha_actualizacion;
    }

    // GETTERS: métodos para ACCEDER a las propiedades privadas.
    // Se nombran con get + NombrePropiedad.
    public function getId(): ?string   { return $this->id; }
    public function getNombre(): string   { return $this->username; }
    public function getUsername(): string   { return $this->username; }
    public function getPassword(): string   { return $this->password; }
    public function getEmail(): string   { return $this->email; }
    public function getNombreCompleto(): string   { return $this->nombre_completo; }
    public function getActivo(): int  { return $this->activo; }
    public function getFechaCreacion(): ?DateTime { return $this->fecha_creacion; }
    public function getFechaActualizacion(): ?DateTime { return $this->fecha_actualizacion; }

    // SETTERS: métodos para MODIFICAR las propiedades privadas.
    // Se nombran con set + NombrePropiedad.
    public function setId(string $id): void     { $this->id = $id; }
    public function setNombre(string $nombre): void     { $this->username = $nombre; }
    public function setUsername(string $username): void     { $this->username = $username; }
    public function setPassword(string $password): void     { $this->password = $password; }
    public function setEmail(string $email): void     { $this->email = $email; }
    public function setNombreCompleto(string $nombre_completo): void     { $this->nombre_completo = $nombre_completo; }
    public function setActivo(int $activo): void     { $this->activo = $activo; }
    public function setFechaCreacion(?DateTime $fecha_creacion): void { $this->fecha_creacion = $fecha_creacion; }
    public function setFechaActualizacion(?DateTime $fecha_actualizacion): void { $this->fecha_actualizacion = $fecha_actualizacion; }

}
?>