
<?php

require_once "../includes/conexion.php";
class UserOrganization
{

  public $años_de_experiencia;
  public $nombre_de_la_or;
  public $sigla_de_la_or;
  public $cargo_en_la_or;
  public $naturaleza_de_la_or;
  public $clase_de_la_or;
  public $ciudad_de_la_or;
  public $departamento_de_la_or;
  public $direccion_de_la_or;
  public $telefono_de_la_or;
  public $pagina_de_la_or;
  public $usuario_id;

  // Constructor
  public function __construct($años_de_experiencia, $nombre_de_la_or, $sigla_de_la_or, $cargo_en_la_or, $naturaleza_de_la_or, $clase_de_la_or, $ciudad_de_la_or, $departamento_de_la_or, $direccion_de_la_or, $telefono_de_la_or, $pagina_de_la_or, $usuario_id)
  {
    $this->años_de_experiencia = $años_de_experiencia;
    $this->nombre_de_la_or = $nombre_de_la_or;
    $this->sigla_de_la_or = $sigla_de_la_or;
    $this->cargo_en_la_or = $cargo_en_la_or;
    $this->naturaleza_de_la_or = $naturaleza_de_la_or;
    $this->clase_de_la_or = $clase_de_la_or;
    $this->ciudad_de_la_or = $ciudad_de_la_or;
    $this->departamento_de_la_or = $departamento_de_la_or;
    $this->direccion_de_la_or = $direccion_de_la_or;
    $this->telefono_de_la_or = $telefono_de_la_or;
    $this->pagina_de_la_or = $pagina_de_la_or;
    $this->usuario_id = $usuario_id;
  }
}

class UserOrganizationModel extends Connection
{

  function createQuery(UserOrganization $model)
  {

    return "
    INSERT INTO organizacion(
    años_de_experiencia,
    nombre_de_la_or,
    sigla_de_la_or,
    cargo_en_la_or,
    naturaleza_de_la_or,
    clase_de_la_or,
    ciudad_de_la_or,
    departamento_de_la_or,
    direccion_de_la_or,
    telefono_de_la_or,
    pagina_de_la_or,
    usuario_id
    )
    VALUES (
    $model->años_de_experiencia,
    '$model->nombre_de_la_or',
    '$model->sigla_de_la_or',
    '$model->cargo_en_la_or',
    '$model->naturaleza_de_la_or',
    '$model->clase_de_la_or',
    '$model->ciudad_de_la_or',
    '$model->departamento_de_la_or',
    '$model->direccion_de_la_or',
    '$model->telefono_de_la_or',
    '$model->pagina_de_la_or',
    '$model->usuario_id'
    );
    ";
  }

  public function createOne(UserOrganization $model)
  {

    $query = $this->createQuery($model);

    $result = parent::getConn()->query($query);
    parent::closeConn();

    return $result;
  }
}
