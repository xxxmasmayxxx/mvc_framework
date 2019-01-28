<?php


class Config
{
    protected static $settings = [];

    public static function get($key)
    {
        return self::$settings[$key] ?? null;
    }

    public static function set($key, $val)
    {
        self::$settings[$key] = $val;
    }
}