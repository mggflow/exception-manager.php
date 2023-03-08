<?php

namespace MGGFLOW\ExceptionManager;

class AccumulateException implements Interfaces\ExceptionsAccumulator
{
    protected static array $exceptions = [];
    public static function accumulate(\Throwable $throwable)
    {
        static::$exceptions[] = $throwable;
    }

    public static function getAccumulated(): array
    {
        return static::$exceptions;
    }
}