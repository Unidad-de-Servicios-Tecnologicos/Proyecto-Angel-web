
<?php

$pathName = realpath(__DIR__ . "/..");

require_once "$pathName/models/Survey.php";
require_once "$pathName/models/User.php";

class AdminService
{

    private $surveyModel;
    private $userModel;

    public function __construct()
    {
        $this->surveyModel = new SurveyModel();
        $this->userModel = new UserModel();
    }

    public function getSurveysByUserId($userId)
    {

        return $this->surveyModel->getSurveysByUserId($userId);
    }

    public function getUserInformationById($userId)
    {

        return $this->userModel->getFullUser($userId);
    }
}
