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
        $url = $_SERVER['SCRIPT_NAME'];
        list($d,$c,$m) = explode('/',trim($url,'/'));

        $c_low = strtolower($c);
        $c = ucwords($c);
        $class = '\\App\\Controller\\'.$c;
        $obj = new $class($c,$m);
        //TODO 路由解析部分
    }
}