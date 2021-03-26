<?php

namespace teamones\filter;

use teamones\filter\parse\WhereParse;

/**
 * Enforcer
 *
 * @method static string parseWhere($where)
 */
class Enforcer
{

    /**
     * @var \teamones\filter\parse\WhereParse
     */
    protected static $_instance = null;

    /**
     * @return WhereParse
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