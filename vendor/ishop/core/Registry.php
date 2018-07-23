<?php
/*
 *Class Regestry, using template singleton
 *
 */

namespace ishop;


class Registry
{

    use TSingleton;


    /**
     * сюда будем складывать все свойства.
     * @var array
     */
    private static $properties = [];

    /**
     * функция которая заносит в контейнер какие-то свойства
     * по передаваемым ключю $name и значению $value.
     * @param $name
     * @param $value
     */
    public function setProperty($name, $value)
    {
        self::$properties[$name] = $value;
    }


    /**
     * получаем свойство из контейнера по ключу $name
     * @param $name
     * @return mixed|null
     */
    public function getProperty($name)
    {
        if(isset(self::$properties[$name])){
            return self::$properties[$name];
        }
        return null;
    }

    /**
     * функция для дебага. Возвращает все содержимое контейнера.
     * @return array
     */
    public function getProperties()
    {
        return self::$properties;
    }

}