<?php

namespace MGGFLOW\ExceptionManager\Abstracted;

use MGGFLOW\ExceptionManager\Interfaces\UniException;

abstract class ExceptionManager
{
    protected static ExceptionBuilder $builder;

    abstract public static function setBuilder(ExceptionBuilder $builder): self;

    abstract public static function build(?UniException $exception): ExceptionBuilder;
}