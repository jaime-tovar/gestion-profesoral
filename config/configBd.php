<?php
// ============================================================
// ARCHIVO DE CONFIGURACIÓN DE LA BASE DE DATOS
// Este archivo define las constantes necesarias para conectarse
// a MySQL/MariaDB desde PHP usando PDO.
// ============================================================

// define() crea una CONSTANTE: un valor que NO se puede cambiar después.
// A diferencia de una variable ($var), una constante no lleva $ y es inmutable.

// Servidor donde está MySQL. 'localhost' significa "esta misma máquina".
define('DB_SERVER', 'localhost');

// Usuario de MySQL. 'root' es el usuario administrador por defecto en XAMPP.
define('DB_USER', 'root');

// Contraseña de MySQL. En XAMPP por defecto viene vacía ''.
define('DB_PASS', '');

// Nombre de la base de datos a la que nos vamos a conectar.
define('DB_NAME', 'db_gestion_profesoral');

// Puerto de MySQL. 3306 es el puerto estándar por defecto.
define('DB_PORT', 3306);
?>