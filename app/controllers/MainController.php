<?php

namespace app\controllers;

use ishop\Cache;

class MainController extends AppController
{

    public function indexAction(){
        $this->setMeta('Title', 'description', 'keywords');

    }

}