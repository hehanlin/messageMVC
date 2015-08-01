<?php

/**
 * Created by PhpStorm.
 * User: hehanlin
 * Date: 2015/8/1
 * Time: 10:43
 */
namespace System;
class Loader
{
    public static function autoload($class)
    {
        require_once BASEDIR.'/'.str_replace('\\','/',$class).'.php';
    }
}