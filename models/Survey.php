
<?php

$pathName = realpath(__DIR__ . "/..");

require_once "$pathName/includes/conexion.php";
class SurveyModel extends Connection
{

  public function getSurveysByUserId($userId)
  {

    if (!$userId) return [];

    $query = "SELECT * FROM encuestas WHERE id_usuario = $userId;";

    $result = parent::getConn()->query($query);

    $data = [];

    if (!$result) return [];

    while ($row = $result->fetch_assoc()) {
      $data[] = $row;
    }

    return $data;
  }

  public function getPlainSurveysByUserId($userId)
  {

    if (!$userId) return [];

    $query = "SELECT * FROM encuestas WHERE id_usuario = $userId;";

    $result = parent::getConn()->query($query);

    return $result;
  }
}
