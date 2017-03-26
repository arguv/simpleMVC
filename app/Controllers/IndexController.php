<?php

class IndexController implements IController
{
    public function indexAction()
    {
        $fc = BaseController::getInstance();

        $model = new Employee();
        $model->message = 'Hello this is common page, please go your page - /employees';

        $result = $model->render('../Views/index.php');

        $fc->setBody($result);
    }
    
    public function error404Action()
    {
        $fc = BaseController::getInstance();

        $model = new Employee();
        $result = $model->render('../Views/error404.php');

        $fc->setBody($result);
    }
}

