<?php
    include 'conexion.php';

    if (isset($_POST['submit'])) {
        $username = $_POST['user'];
        $password = $_POST['pass'];

        $sql = "select * from usuario where email = '$username' and contraseña = '$password'";  
        $result = mysqli_query($conn, $sql);  
        $row = mysqli_fetch_array($result, MYSQLI_ASSOC);  
        $count = mysqli_num_rows($result);  
        
        if($count == 1){  
            header("Location: ../views/administrador/index.php");
        }  
        else{  
            echo  '<script>
                        window.location.href = "login.php";
                        alert("Falla al inicar sesion. Email o contraseña incorrecta!!")
                    </script>';
        }     
    }
    ?>

<?php
include 'conexion.php';
//error_reporting(0);
//Indicamos que el documento será de tipo html y con caracteres de UTF-8:
header('Content-Type: text/html; charset=UTF-8');
//Al presionar el boton que previamente le llamamos "login", traeremos los datos del formulario:
$btninicio=$_POST['submit'];
if(isset($btninicio)){
	//Traemos de los inputs los datos de usuario y contraseña:
   
    $user=$_POST['user'];
    $pass=$_POST['pass'];

    $sql="SELECT email, contraseña, concat(nombre,' ',apellido), id_tipo_usuario from usuario where email='$user' and contraseña = '$pass'";
    $res=$conn->query($sql);
    $fila=$res-> fetch_row();
    
    if($fila[0]==$user && $fila[1]==$pass){
        $_SESSION['tipo']=$fila[3];
    	$_SESSION['usuario']=$fila[2];
    	$msj="Bienvenido ".$_SESSION['usuario']."";
			switch ($_SESSION['tipo']) {
				case '1':
					# code...
					header('location:../views/administrador/index.php?mensaje=$msj');
					break;
				default:
					# code...
					header('location:../views/usuario/encuesta.php?mensaje=$msj');
					break;
			}

    }
    else{
    	$msj="Usuario y/o Contraseña Incorrectos";
        header("location:../index.php?mensaje=$msj");
    }
}
?>
