
<?php

$pathName = realpath(__DIR__ . "/..");

require_once "$pathName/models/Survey.php";

class AdminService
{

    private $surveyModel;

    public function __construct()
    {
        $this->surveyModel = new SurveyModel();
    }

    public function getSurveysByUserId($userId)
    {

        return $this->surveyModel->getSurveysByUserId($userId);
    }
}
