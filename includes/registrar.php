<?php
    include "conexion.php";

    if(isset($_POST['submit'])){
        $id = $_POST['cedula'];
        $nombre = $_POST['nombre'];
        $apellido = $_POST['apellido'];
        $telefono = $_POST['telefono'];
        $celular = $_POST['celular'];
        $email = $_POST['email'];
        $contraseña = $_POST['contraseña'];
        $tipo_usuario = $_POST['tipo_usuario'];

        
        $q = " INSERT INTO `usuario`(`id_usuario`, `nombre`, `apellido`, `telefono`, `celular`, `email`, `contraseña`, `id_tipo_usuario`) VALUES ( '$id', '$nombre', '$apellido', '$telefono', '$celular', '$email', '$contraseña', '$tipo_usuario' )";

        $query = mysqli_query($conn,$q);
    }
?>
