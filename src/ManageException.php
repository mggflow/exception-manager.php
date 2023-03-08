<?php

namespace MGGFLOW\ExceptionManager;

use MGGFLOW\ExceptionManager\Abstracted\ExceptionManager;
use MGGFLOW\ExceptionManager\Abstracted\ExceptionBuilder;
use MGGFLOW\ExceptionManager\Interfaces\UniException;

class ManageException extends ExceptionManager
{
    public static function setBuilder(ExceptionBuilder $builder): ManageException
    {
        static::$builder = $builder;

        return new static();
    }

    public static function build(?UniException $exception = null): BuildException
    {
        if (empty(static::$builder)) static::setBuilder(new BuildException());

        static::$builder->setUpException($exception);

        AccumulateException::accumulate(static::$builder->e());

        return static::$builder;
    }
}