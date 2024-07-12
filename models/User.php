
<?php

require_once "../includes/conexion.php";

class User
{
  public $id_usuario;
  public $clave;
  public $nombres;
  public $apellidos;
  public $email;
  public $id_tipo_usuario;
  public $telefono;
  public $celular;

  // Constructor
  public function __construct($id_usuario, $clave, $nombres, $apellidos, $email, $id_tipo_usuario, $telefono, $celular)
  {
    $this->id_usuario = $id_usuario;
    $this->clave = $clave;
    $this->nombres = $nombres;
    $this->apellidos = $apellidos;
    $this->email = $email;
    $this->id_tipo_usuario = $id_tipo_usuario;
    $this->telefono = $telefono;
    $this->celular = $celular;
  }

  // Método para mostrar la información del usuario
  public function info()
  {
    return "ID Usuario: $this->id_usuario\n" .
      "Clave: $this->clave\n" .
      "Nombres: $this->nombres\n" .
      "Apellidos: $this->apellidos\n" .
      "Email: $this->email\n" .
      "ID Tipo Usuario: $this->id_tipo_usuario\n" .
      "Teléfono: $this->telefono\n" .
      "Celular: $this->celular\n";
  }
}

class UserModel extends Connection
{

  public function getFullUser($userId)
  {

    $query = "SELECT * FROM usuarios u LEFT JOIN organizacion o 
    ON o.usuario_id = u.id_usuario WHERE u.id_usuario = $userId LIMIT 1;";

    $result = parent::getConn()->query($query);

    return $result->fetch_assoc();
  }

  public function getFullUsers()
  {

    $query = "SELECT * FROM usuarios u LEFT JOIN organizacion o 
    ON o.usuario_id = u.id_usuario";

    $result = parent::getConn()->query($query);

    $data = [];

    if (!$result) return [];

    while ($row = $result->fetch_assoc()) {
      $data[] = $row;
    }

    return $data;
  }
}
