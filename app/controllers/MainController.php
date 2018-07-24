<?php

namespace app\controllers;

class MainController extends AppController
{

    public function __construct($route)
    {
        debug($route);
    }

    public function indexAction(){
        echo __METHOD__;
        echo '<br>hello world';
    }

}