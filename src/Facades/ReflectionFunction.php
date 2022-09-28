<?php

declare(strict_types=1);

namespace KnightWithKnife\Exceptions\Facades;

/**
 * Class ReflectionFunction
 * @method static string getParameterName(callable $callback)
 * @see     \KnightWithKnife\Exceptions\ReflectionFunction
 * @package Knight\Exceptions\Facades
 */
class ReflectionFunction extends Facade
{
    protected static function getFacadeAccessor() : \KnightWithKnife\Exceptions\ReflectionFunction
    {
        return new \KnightWithKnife\Exceptions\ReflectionFunction();
    }
}