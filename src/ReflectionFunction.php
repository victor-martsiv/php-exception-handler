<?php

declare(strict_types=1);

namespace KnightWithKnife\Exceptions;

use ReflectionException;
use ReflectionNamedType;

class ReflectionFunction
{
    /**
     * @param callable $callback
     * @return string
     * @throws ReflectionException
     */
    public function getParameterName(callable $callback): string
    {
        $callback = $callback(...);
        $reflectionFunction = new \ReflectionFunction($callback);
        $parameters = $reflectionFunction->getParameters();
        $type = $parameters[0]->getType();

        if ($type instanceof ReflectionNamedType) {
            return $type->getName();
        }
        throw new \ReflectionException("Cant get param name!");
    }
}