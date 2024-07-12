
<?php

require_once "../models/User.php";
require_once "../models/Survey.php";
require_once "../models/Question.php";

$type = $_GET["type"];

session_start();

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
        "surveyQuestions" => $question->getQuestionBySurveyId($userId)
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
