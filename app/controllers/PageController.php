<?php

namespace app\controllers;


class PageController extends AppController
{

    public function viewAction(){
        $this->setMeta('view');
    }

}