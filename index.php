<?php
set_include_path(get_include_path()
    .PATH_SEPARATOR.'app/Controllers'
    .PATH_SEPARATOR.'app/Models'
    .PATH_SEPARATOR.'app/Views');

function __autoload($class){
    require_once($class.'.php');
}

$base = BaseController::getInstance();
$base->route();
echo $base->getBody();