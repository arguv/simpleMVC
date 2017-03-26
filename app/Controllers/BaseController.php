<?php

class BaseController
{
    protected $_controller, $_action, $_params, $_body;
    static $_instance;

    public static function getInstance()
    {
        if(!(self::$_instance instanceof self))
            self::$_instance = new self();
        return self::$_instance;
    }

    private function __construct()
    {
        $request = $_SERVER['REQUEST_URI'];
        $splits = explode('/',trim($request,'/'));

        $controller_name = !empty($splits[0]) ? ucfirst($splits[0]) . 'Controller' : 'IndexController';
        $this->_controller = file_exists(__dir__.'\\'.$controller_name.'.php') ? $controller_name : 'NotfoundController';

        $this->_action = !empty($splits[1]) ? ucfirst($splits[1]) . 'Action' : 'indexAction';

        if(!empty($splits[2])){
            $values = array();
            for($i=2, $cnt = count($splits); $i<$cnt; $i++){
                array_push($values , $splits[$i]);
            }
            $this->_params = $values;
        }
    }

    public function route()
    {
        if(class_exists($this->getController())){
            $rc = new ReflectionClass($this->getController());
            if($rc->implementsInterface('IController')){
                if($rc->hasMethod($this->getAction())){
                    $controller = $rc->newInstance();
                    $method = $rc->getMethod($this->getAction());
                    if($this->getParams()){
                        $method->invoke($controller,$this->getParams());
                    }else{
                        $method->invoke($controller);
                    }
                }else{
                    $controller = $rc->newInstance();
                    $method = $rc->getMethod('indexAction');
                    if($this->getParams()){
                        $method->invoke($controller,$this->getParams());
                    }else{
                        $method->invoke($controller);
                    }
                    //throw new Exception('Action');
                }
            }else{
                throw new Exception('Controller');
            }
        }
    }

    public function getController()
    {
        return $this->_controller;
    }

    public function getAction()
    {
        return $this->_action;
    }

    public function getParams()
    {
        return $this->_params;
    }

    public function getBody()
    {
        return $this->_body;
    }

    public function setBody($body)
    {
        $this->_body = $body;
    }
}