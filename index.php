<?php
/**
 * Created by PhpStorm.
 * User: hehanlin
 * Date: 2015/8/1
 * Time: 10:41
 */

//定义工程根目录
define('BASEDIR',__DIR__);
//引入自动加载类文件
require_once BASEDIR.'/System/Loader.php';
//调用spl库自动加载函数
spl_autoload_register('\\System\\Loader::autoload');
//单例application
System\Application::getInstance(BASEDIR)->dispatch();