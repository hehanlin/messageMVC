<?php
/**
 * Created by PhpStorm.
 * User: hehanlin
 * Date: 2015/8/1
 * Time: 11:29
 */

namespace System;


class Config implements \ArrayAccess
{
    protected $configs = [];

    protected $path;

    public function __construct($path)
    {
        $this->path = $path;
    }

    public function offsetGet($offset)
    {
        if(empty($this->configs[$offset]))
        {
            $file_path = $this->path.'/'.$offset.'.php';
            $config = require_once $file_path;
            $this->configs[$offset] = $config;
        }
        return $this->configs[$offset];
    }

    public function offsetSet($offset,$value)
    {
        throw new \Exception('should\'t write config file');
    }

    public function offsetExists($offset)
    {
        return isset($this->configs[$offset]);
    }

    public function offsetUnset($offset)
    {
        unset($this->configs[$offset]);
    }
}