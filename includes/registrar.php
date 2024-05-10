<?php
    include "conexion.php";

    if(isset($_POST['submit'])){
        $nombre = $_POST['nombre'];
        $apellido = $_POST['apellido'];
        $email = $_POST['email'];
        $contraseña = $_POST['contraseña'];

        
        $q = " INSERT INTO `usuarios`(`nombre, `apellido`, `email`, `contraseña`) VALUES ( '$nombre', '$apellido', '$email', '$contraseña' )";

        $query = mysqli_query($conn,$q);
    }
?>
