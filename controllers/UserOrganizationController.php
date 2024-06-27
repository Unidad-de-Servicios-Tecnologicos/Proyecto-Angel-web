
<?php

require_once "../services/UserOrganization.php";
$type = $_GET["type"];

$service = new UserOrganizationService();

switch ($type) {

  case "create": {

      $json = file_get_contents('php://input');

      $data = json_decode($json, true);

      if (json_last_error() === JSON_ERROR_NONE) {

        $created = $service->createOne($data);

        echo json_encode(['status' => 'success', 'message' => 'Data received successfully!!', "props" => $created]);
      } else {
        echo json_encode(['status' => 'error', 'message' => 'Invalid JSON']);
      }
    }

    exit;
}
