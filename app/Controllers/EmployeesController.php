<?php

class EmployeesController implements IController
{
    public function indexAction()
    {
        $fc = BaseController::getInstance();

        $model = new Employee();
        $model->name = 'I am Employee';

        $result = $model->render('../Views/employee.php');

        $fc->setBody($result);
    }

    public function notfoundAction()
    {
        $fc = BaseController::getInstance();

        $model = new Employee();
        $model->name = 'Action not found';

        $result = $model->render('../Views/error404.php');

        $fc->setBody($result);
    }

    public function saveAction()
    {
        $fc = BaseController::getInstance();
        $value = $fc->getParams();

        $model = new Employee();
        $model->name = 'We need to save ';
        $model->val = $value;

        $result = $model->render('../Views/employee.php');

        $fc->setBody($result);
    }

    public function create()
    {

        //

    }

    public function store()
    {

        //

    }

    public function show($id)
    {

        //

    }

    public function edit($id)
    {

        //

    }

    public function update($id)
    {

        //

    }

    public function destroy($id)
    {

        //

    }
}

