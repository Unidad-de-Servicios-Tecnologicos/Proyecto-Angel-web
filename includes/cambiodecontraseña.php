<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['clave'])&& isset($_POST['id_usuario'])) {
        // Incluir archivo de conexión a base de datos
        include("conexion.php");

        // Obtener valores
        $cedula          = $_POST['id_usuario'];
        $contraseña      = $_POST['clave'];

        // Preparar la consulta
        $query = "UPDATE usuarios SET clave='$contraseña' WHERE id_usuario='$cedula'";

        // Ejecutar la consulta
        if ($con->query($query) === TRUE) {
            header("Location: ../views/login/registro.php");
            exit();
        } else {
            echo "Error: " . $query . "<br>" . $con->error;
        }

        // Cerrar la conexión
        $con->close();
    } else {
        echo "Todos los campos son obligatorios.";
    }
} else {
    echo "Método de solicitud no válido.";
}

?>
