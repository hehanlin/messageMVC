<?php
/**
 * Created by PhpStorm.
 * User: hehanlin
 * Date: 2015/8/1
 * Time: 10:41
 */


define('BASEDIR',__DIR__);

require_once BASEDIR . '/System/Loader.php';

spl_autoload_register('\\System\\Loader::autoload');

System\Application::getInstance(BASEDIR)->dispatch();