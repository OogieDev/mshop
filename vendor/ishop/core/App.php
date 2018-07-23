<?php

namespace ishop;


class App
{

    //контейнер для приложения. Можем сюда положить что-то и потом достать.
    //для реализации этого контейнера используем шаблон проектирования реестр
    //на этом этапе создадим класс Regestry
    public static $app;

    public function __construct()
    {
        $query = trim($_SERVER['QUERY_STRING'], '/');
        session_start();
        //запишем в self::$app объект реестра
        self::$app = Registry::instance();
        $this->getParams();
    }

    /**
     * записываем в self::$app параметры из конфиг папки
     * из файла params.php
     */
    protected function getParams()
    {
        $params = require_once CONF . '/params.php';
        if(!empty($params)){
            foreach ($params as $key => $value){
                self::$app->setProperty($key, $value);
            }
        }
    }

}