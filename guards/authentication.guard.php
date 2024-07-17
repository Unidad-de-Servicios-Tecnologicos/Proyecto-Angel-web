<?php

$innerPath = __DIR__;
$outerPath = realpath(__DIR__ . "/..");

require_once "$outerPath/models/User.php";
require_once "$innerPath/guardTraits.php";
require_once "$outerPath/includes/conexion.php";

class AuthenticationGuard extends  Connection
{

  use guardTraits;

  private $userModel;
  public function __construct()
  {
    $this->userModel = new UserModel();
  }

  public function isAdmin($id)
  {

    $user = $this->userModel->getUserById($id);

    if (!$user || $user["id_tipo_usuario"] != "1") return false;

    return true;
  }

  public function isAdminBySessionId()
  {

    $this->startSession();

    if (!isset($_SESSION["id_usuario"])) {
      $this->notAnAdminHTML();
      die();
    };

    $session = $_SESSION["id_usuario"];

    $isAdmin = $this->isAdmin($session);

    if (!$isAdmin) {
      $this->notAnAdminHTML();
      die();
    }
  }

  public function isAdminBySessionIdAndReturnBool()
  {

    $this->startSession();

    if (!isset($_SESSION["id_usuario"])) return false;
    $session = $_SESSION["id_usuario"];

    return $this->isAdmin($session);
  }
}
