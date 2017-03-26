<?php

class Employee
{
    public function render($dir){
        ob_start();
        include(dirname(__FILE__).'/'.$dir);
        return ob_get_clean();
    }
}