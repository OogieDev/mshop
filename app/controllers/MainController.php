<?php

namespace app\controllers;

class MainController extends AppController
{

    public function indexAction(){
        $this->setMeta('Заголовок файла', 'Описание страницы', 'Ключевые слова');
        $this->getView();
    }

}