<?php

namespace App\Core;

class Application
{
    private static $bindings = [];
    public static function bind($key, $handler)
    {
        self::$bindings[$key] = $handler;
    }
    public static function get($key)
    {
        if (!array_key_exists($key, self::$bindings)) {
            throw new Exception("We can not resolve anything for the given: $key !");
        }

        return self::$bindings[$key];
    }
}
