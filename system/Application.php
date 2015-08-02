<?php
/**
 * Created by PhpStorm.
 * User: hehanlin
 * Date: 2015/8/1
 * Time: 11:05
 */

namespace System;


class Application
{
    protected static $instance;

    public $base_dir;

    public $config;

    public static function getInstance($base_dir = '')
    {
        if(empty(self::$instance))
        {
            self::$instance = new self($base_dir);
        }
        return self::$instance;
    }

    protected function __construct($base_dir)
    {
        $this->base_dir = $base_dir;
        $this->config = new Config($base_dir.'/Configs');
    }

    public function dispatch()
    {
        //获取当前脚本的url
        $url = $_SERVER['PATH_INFO'];
        list($c,$m) = explode('/',trim($url,'/'));

        $c_low = strtolower($c);
        $c = ucwords($c);

        $controller_config = $this->config['controller'];

        $decorators = array();

        if(isset($controller_config[$c_low]['decorator']))
        {
            $conf_decorator = $controller_config[$c_low]['decorator'];
            foreach ($conf_decorator as $class) {
                $decorators[] = new $class;
            }
        }

        foreach($decorators as $decorator)
        {
            $decorator->beforeRequest();
        }
        $class = '\\App\\Controller\\'.$c;
        $obj = new $class();
        $obj->$m();

        foreach($decorators as $decorator)
        {
            $decorator->afterRequest();
        }

    }
}