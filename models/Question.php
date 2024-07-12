
<?php

require_once "../includes/conexion.php";

class QuestionModel extends Connection
{

  public function getQuestionBySurveyId($surveyId)
  {

    if (!$surveyId) return [];

    $query = "SELECT * FROM preguntas p 
    RIGHT JOIN tipo_pregunta t 
    ON p.id_tipo_pregunta = t.id_tipo_pregunta WHERE p.id_encuesta = $surveyId;";

    $result = parent::getConn()->query($query);

    $data = [];

    if (!$result) return [];

    while ($row = $result->fetch_assoc()) {
      $data[] = $row;
    }

    return $data;
  }

  public function getQuestionOptionsByQuestionId($questionId)
  {

    if (!$questionId) return [];

    $query = "SELECT op.* FROM opciones op INNER JOIN preguntas p ON p.id_pregunta = op.id_pregunta WHERE p.id_pregunta = $questionId";

    $result = parent::getConn()->query($query);

    $data = [];

    if (!$result) return [];

    while ($row = $result->fetch_assoc()) {
      $data[] = $row;
    }

    return $data;
  }
}
