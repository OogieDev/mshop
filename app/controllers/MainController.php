<?php

namespace app\controllers;

class MainController extends AppController
{

    public function indexAction(){
        $this->setMeta('Title', 'description', 'keywords');
        $name = 'john';
        $age = '30';
        $this->set(compact('age', 'name'));

    }

}