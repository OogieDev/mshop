<?php

namespace ishop\base;


abstract class Controller
{

    public $route;
    public $controller;
    public $view;
    public $layout;
    public $model;
    public $prefix;
    public $data = [];
    public $meta = ['title' => '', 'desk' => '', 'keywords' => ''];

    public function __construct($route)
    {
        $this->route = $route;
        $this->controller = $route['controller'];
        $this->view = $route['action'];
        $this->prefix = $route['prefix'];
        $this->model = $route['controller'];
    }

    /**
     * Устанавливает значения для передачи их во вью
     * @param $data
     */
    public function set($data){
        $this->data = $data;
    }

    /**
     * устанавливаем метаданные
     * @param string $title
     * @param string $desctiption
     * @param string $keywords
     */
    public function setMeta($title = '', $desctiption = '', $keywords = ''){
        $this->meta['title'] = $title;
        $this->meta['desk'] = $desctiption;
        $this->meta['keywords'] = $keywords;
    }

    public function getView(){
        $viewObject = new View($this->route, $this->layout, $this->view, $this->meta);

        $viewObject->render($this->data);
    }

    function is_ajax() {
        return (isset($_SERVER['HTTP_X_REQUESTED_WITH']) && (strtolower(getenv('HTTP_X_REQUESTED_WITH')) === 'xmlhttprequest'));
    }

    public function loadView($view, $vars = [])
    {
        extract($vars);
        require APP . "/views/{$this->prefix}{$this->controller}/{$view}.php";
        die;
    }

}