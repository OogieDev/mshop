<?php

namespace app\controllers;

use ishop\Cache;

class MainController extends AppController
{

    public function indexAction(){
        $posts = \R::findAll('test');
        $this->setMeta('Title', 'description', 'keywords');
        $name = 'john';
        $age = '30';
        $this->set(compact('age', 'name', 'posts'));
        $cache = Cache::instance();
        $data = $cache->get('test');
        if(!$data){
            $cache->set('test', $name);
        }
        debug($data);
    }

}