<?php
// ============================================================
// CLASE DE CONEXIÓN A LA BASE DE DATOS USANDO PDO
// PDO (PHP Data Objects) es la forma moderna y segura de
// conectarse a bases de datos en PHP.
// Esta clase se encarga de: abrir conexión, cerrarla,
// ejecutar INSERT/UPDATE/DELETE y ejecutar SELECT.
// ============================================================

// require_once incluye el archivo UNA sola vez.
// __DIR__ es la carpeta donde está ESTE archivo (controlador/).
// Subimos un nivel (/../) para llegar a config/configBd.php.
require_once __DIR__ . '/../config/configBd.php';

// Definimos la clase. Una clase es como un "molde" para crear objetos.
class ControlConexionPdo {

    // Propiedad privada: solo esta clase puede acceder a $conn.
    // $conn almacenará el objeto de conexión PDO.
    private $conn;

    // Constructor: se ejecuta automáticamente al hacer new ControlConexionPdo().
    // Inicializamos la conexión como null (aún no conectada).
    public function __construct() {
        $this->conn = null;
    }

    // Método para ABRIR la conexión a la base de datos.
    public function abrirBd() {
        // try-catch: intenta ejecutar el código, y si falla, captura el error.
        try {
            // DSN (Data Source Name): cadena que indica a PDO cómo conectarse.
            // Ejemplo resultado: "mysql:host=localhost;dbname=bdfacturas;port=3306"
            $dsn = "mysql:host=" . DB_SERVER . ";dbname=" . DB_NAME . ";port=" . DB_PORT;

            // Creamos la conexión PDO con el DSN, usuario y contraseña.
            $this->conn = new PDO($dsn, DB_USER, DB_PASS);

            // Configuramos PDO para que lance excepciones si hay errores SQL.
            // Esto es importante para que los errores no pasen desapercibidos.
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            // Establecemos UTF-8 para que funcionen los caracteres especiales (ñ, á, etc).
            $this->conn->exec("SET CHARACTER SET utf8");

        } catch (PDOException $e) {
            // Si la conexión falla, mostramos el error y detenemos la ejecución.
            echo "ERROR AL CONECTARSE: " . $e->getMessage();
            exit(); // Detiene todo el programa.
        }
    }

    // Método para CERRAR la conexión.
    // Al poner null, PHP libera la conexión automáticamente.
    public function cerrarBd() {
        $this->conn = null;
    }

    // Método para ejecutar comandos SQL que NO devuelven datos:
    // INSERT (crear), UPDATE (modificar), DELETE (eliminar).
    // Recibe el SQL con signos ? y un array con los valores.
    // Ejemplo: ejecutarComandoSql("INSERT INTO persona VALUES (?,?,?,?)", ['P001','Ana','ana@mail.com','301111'])
    public function ejecutarComandoSql($sql, $parametros = []) {
        try {
            // prepare() prepara la consulta SQL con placeholders (?).
            // Esto PREVIENE inyección SQL (un ataque muy común).
            $stmt = $this->conn->prepare($sql);

            // execute() ejecuta la consulta reemplazando los ? por los valores del array.
            // Retorna true si fue exitoso, false si no.
            return $stmt->execute($parametros);

        } catch (PDOException $e) {
            echo "Error SQL: " . $e->getMessage();
            return false; // Retornamos false para indicar que falló.
        }
    }

    // Método para ejecutar consultas SELECT (que SÍ devuelven datos).
    // Retorna un array de arrays asociativos con los resultados.
    // Ejemplo resultado: [['codigo'=>'P001','nombre'=>'Ana'], ['codigo'=>'P002','nombre'=>'Carlos']]
    public function ejecutarSelect($sql, $params = []) {
        try {
            // Preparamos la consulta (misma protección contra inyección SQL).
            $stmt = $this->conn->prepare($sql);

            // Ejecutamos con los parámetros.
            $stmt->execute($params);

            // fetchAll() obtiene TODAS las filas del resultado.
            // PDO::FETCH_ASSOC hace que cada fila sea un array asociativo
            // (con nombres de columna como claves, no números).
            return $stmt->fetchAll(PDO::FETCH_ASSOC);

        } catch (PDOException $e) {
            echo "Error SELECT: " . $e->getMessage();
            return []; // Retornamos array vacío si falla.
        }
    }
}
?>