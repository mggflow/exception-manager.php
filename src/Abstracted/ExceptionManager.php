<?php

namespace MGGFLOW\ExceptionManager\Abstracted;

abstract class ExceptionManager
{
    protected static ExceptionBuilder $builder;

    abstract public static function setBuilder(ExceptionBuilder $builder): self;

    abstract public static function build(): ExceptionBuilder;
}