<?php

declare(strict_types=1);

namespace KnightWithKnife\Exceptions;

use KnightWithKnife\Exceptions\Facades\ReflectionFunction as KnightReflectionFunction;
use RuntimeException;
use Throwable;

use function get_class;
use function in_array;

class Handler
{
    /**
     * Contain ignored Exceptions
     * @var array
     */
    private array $ignored;
    /**
     * Contains closure handler for specific Exception
     * @var array
     */
    private array $handlers = [];
    /**
     * @var bool
     */
    private bool $isRegistered = false;

    public function __construct()
    {
        $this->ignored = [];
    }

    /**
     * @param callable $handler - exception handler
     *
     * @return void
     */
    public function setHandler(callable $handler) : void
    {
        $this->handlers[] = $handler;
    }

    /**
     * Handle throw Exception
     *
     * @param Throwable $e
     *
     * @return void
     * @throws Throwable
     */
    public function handleException(Throwable $e) : void
    {
        $exceptionClassName = get_class($e);
        if ($this->isInIgnored($exceptionClassName)) {
            throw $e;
        }
        foreach ($this->handlers as $handler) {
            if (KnightReflectionFunction::getParameterName($handler) === $exceptionClassName) {
                $handler($e);

                return;
            }
        }
        throw $e;
    }

    /**
     * @param string $ignoredException
     *
     * @throws RuntimeException
     */
    public function setIgnored(string $ignoredException) : void
    {
        if ($this->isInIgnored($ignoredException)) {
            return;
        }
        $this->ignored[] = $ignoredException;
    }

    /**
     * @param string $exceptionClassName - Ignored exception class name
     *
     * @return bool
     */
    protected function isInIgnored(string $exceptionClassName) : bool
    {
        return in_array($exceptionClassName, $this->ignored, true);
    }

    public function register() : void
    {
        if ($this->isRegistered) {
            return;
        }
        set_exception_handler([$this, 'handleException']);
        $this->isRegistered = true;
    }

    /**
     * @return void
     */
    public function restoreHandler() : void
    {
        restore_exception_handler();
        $this->isRegistered = false;
    }

    /**
     * @return bool
     */
    public function isRegistered() : bool
    {
        return $this->isRegistered;
    }
}