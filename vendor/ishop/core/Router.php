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
    public static function getRoute()
    {
        return self::$route;
    }

    public static function dispatch($url)
    {
        if(self::matchRoute($url)){
            $controller = 'app\controllers\\' . self::$route['prefix'] . self::$route['controller'] . 'Controller';
            if(class_exists($controller)){
                $controllerObject = new $controller(self::$route);
                $action = self::lowerCamelCase(self::$route['action']) . 'Action';
                if(method_exists($controllerObject, $action)){
                    $controllerObject->$action();
                    $controllerObject->getView();
                }else{
                    throw new \Exception("Метод $controller->$action не найден");
                }
            }else{
                throw new \Exception("Контроллер $controller не найден", 404);
            }
        }else{
            throw new \Exception("Страница не найдена", 404);
        }
    }

    public static function matchRoute($url)
    {
        //проходимся по таблице маршрутов
        foreach (self::$routes as $pattern => $route){
            //если есть совпаления с регексом
            if(preg_match("#{$pattern}#", $url, $matches)){
                //получаем массив типа controller => page и view => add
                //и записываем в переменную route под этими ключами эти значения
                //записываем значения в контроллер и вьюшку
                foreach ($matches as $key => $value){
                    if(is_string($key)){
                        $route[$key] = $value;
                    }
                }
                if(empty($route['action'])){
                    $route['action'] = 'index';
                }
                if(!isset($route['prefix'])){
                    $route['prefix'] = '';
                }
                else{
                    $route['prefix'] .= '\\';
                }
                $route['controller'] = self::upperCamelCase($route['controller']);
                self::$route = $route;
                return true;
            }
        }
        return false;
    }

    //CamelCase
    protected static function upperCamelCase($name)
    {
        return str_replace(' ', '', ucwords(str_replace('-', ' ', $name)));

    }

    //camelCase
    protected static function lowerCamelCase($name)
    {
        return lcfirst(self::upperCamelCase($name));
    }


}