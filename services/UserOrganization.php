
<?php

require "../models/UserOrganization.php";


class UserOrganizationService
{

  private $userOrganizationService;

  public function __construct()
  {

    $this->userOrganizationService = new UserOrganizationModel();
  }
  public function createOne($data)
  {

    [
      "años_de_experiencia" => $años_de_experiencia,
      "nombre_de_la_or" => $nombre_de_la_or,
      "sigla_de_la_or" => $sigla_de_la_or,
      "cargo_en_la_or" => $cargo_en_la_or,
      "naturaleza_de_la_or" => $naturaleza_de_la_or,
      "clase_de_la_or" => $clase_de_la_or,
      "ciudad_de_la_or" => $ciudad_de_la_or,
      "departamento_de_la_or" => $departamento_de_la_or,
      "direccion_de_la_or" => $direccion_de_la_or,
      "telefono_de_la_or" => $telefono_de_la_or,
      "pagina_de_la_or" => $pagina_de_la_or,
      // "usuario_id" => $usuario_id
    ] = $data;

    $model = new UserOrganization(
      $años_de_experiencia,
      $nombre_de_la_or,
      $sigla_de_la_or,
      $cargo_en_la_or,
      $naturaleza_de_la_or,
      $clase_de_la_or,
      $ciudad_de_la_or,
      $departamento_de_la_or,
      $direccion_de_la_or,
      $telefono_de_la_or,
      $pagina_de_la_or,
      "1"
    );

    return $this->userOrganizationService->createOne($model);
  }
}
