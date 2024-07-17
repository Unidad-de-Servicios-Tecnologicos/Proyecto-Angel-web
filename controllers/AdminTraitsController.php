
<?php

$outerPath = realpath(__DIR__ . "/..");

require_once "$outerPath/models/User.php";
require_once "$outerPath/models/Survey.php";
require_once "$outerPath/models/Question.php";
require_once "$outerPath/guards/guardTraits.php";
require_once "$outerPath/guards/authentication.guard.php";

$traits = new UseGuardTrait();

$authGuard = new AuthenticationGuard();

// if (!$authGuard->isAdminBySessionIdAndReturnBool()) {
// 
//   http_response_code(403);
//   echo json_encode([
//     "message" => "Acción no permitida"
//   ]);
//   exit;
// }

$traits->startSession();
$type = $_GET["type"];

switch ($type) {

  case "getUsersInformation": {
      $userController = new UserModel();

      echo json_encode([
        "users" => $userController->getFullUsers()
      ]);
      break;
    }

  case "getSurveys": {
      $surveyController = new SurveyModel();

      $userId = $_GET["userId"] ?? null;

      echo json_encode([
        "userSurveys" => $surveyController->getSurveysByUserId($userId)
      ]);
      break;
    }

  case "getQuestionsBySurveyId": {
      $question = new QuestionModel();

      $surveyId = $_GET["surveyId"] ?? null;

      echo json_encode([
        "surveyQuestions" => $question->getQuestionBySurveyId($surveyId)
      ]);

      break;
    }

  case "getQuestionOptions": {
      $question = new QuestionModel();

      $questionId = $_GET["questionId"] ?? null;

      echo json_encode([
        "questionOptions" => $question->getQuestionOptionsByQuestionId($questionId)
      ]);

      break;
    }
}

exit;
