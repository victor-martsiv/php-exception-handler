<?php

declare(strict_types=1);


namespace KnightWithKnife\Exceptions\Facades;

use RuntimeException;

abstract class Facade
{
    /**
     * @param string $method
     * @param mixed $arguments
     * @return mixed
     */
    public static function __callStatic(string $method, $arguments)
    {
        $instance = static::getFacadeRoot();

        if (!method_exists($instance, $method)) {
            $instance = get_class($instance);
            throw new RuntimeException("Method {$instance}::{$method}() not exists");
        }

        return $instance->$method(...$arguments);
    }

    /**
     * @return object
     */
    private static function getFacadeRoot(): object
    {
        $instance = static::getFacadeAccessor();

        if (is_string($instance) && class_exists($instance)) {
            return new $instance();
        }

        if (is_object($instance)) {
            return $instance;
        }

        throw new RuntimeException('Bad Facade accessor');
    }

    /**
     * @return mixed
     */
    protected static function getFacadeAccessor()
    {
        throw new RuntimeException('Facade does not implement getFacadeAccessor method.');
    }
}