<?php


namespace ishop;


class Router
{

    protected static $routes = [];
    protected static $route = [];

    /**
     * добавляет значение в таблицу маршрутов
     * @param $regexp
     * @param array $route
     */
    public static function add($regexp, $route = [])
    {
        self::$routes[$regexp] = $route;
    }

    /**
     * метод для дебага
     * возвращает таблицу маршрутов
     * @return array
     */
    public static function getRoutes(){
        return self::$routes;
    }

    /**
     * метод для дебага
     * возвращает текущий маршрут
     * @return array
     */
    public static function getRoute(){
        return self::$route;
    }

    public static function dispatch($url){
        if(self::matchRoute($url)){
            echo 'OK';
        }else{
            echo 'No';
        }
    }

    public static function matchRoute($url){
        return false;
    }

}