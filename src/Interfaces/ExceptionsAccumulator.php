<?php

namespace MGGFLOW\ExceptionManager\Interfaces;

interface ExceptionsAccumulator
{
    public static function accumulate(\Throwable $throwable);
    public static function getAccumulated(): array;
}