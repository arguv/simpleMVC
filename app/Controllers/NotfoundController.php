<?php

class NotfoundController implements IController
{
    public function indexAction()
    {
        $fc = BaseController::getInstance();

        $model = new Employee();
        $model->message = 'Error 404 Controller not found';

        $result = $model->render('../Views/error404.php');

        $fc->setBody($result);
    }
}

