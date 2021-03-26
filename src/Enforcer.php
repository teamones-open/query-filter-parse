<?php

namespace teamones\filter;

use teamones\filter\parse\WhereParse;

/**
 * Enforcer
 */
class Enforcer
{

    /**
     * @var null
     */
    protected static $_instance = null;

    /**
     * @return null
     */
    public static function instance()
    {
        if (empty(self::$_instance)) {
            self::$_instance = new WhereParse();
        }
        return self::$_instance;
    }

    /**
     * @param $name
     * @param $arguments
     * @return mixed
     */
    public static function __callStatic($name, $arguments)
    {
        return static::instance()->{$name}(... $arguments);
    }

}