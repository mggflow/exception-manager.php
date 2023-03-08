<?php

namespace MGGFLOW\ExceptionManager;

use MGGFLOW\ExceptionManager\Abstracted\ExceptionManager;
use MGGFLOW\ExceptionManager\Abstracted\ExceptionBuilder;

class ManageException extends ExceptionManager
{
    public static function setBuilder(ExceptionBuilder $builder): ManageException
    {
        static::$builder = $builder;

        return new static();
    }

    public static function build(): BuildException
    {
        if (empty(static::$builder)) static::setBuilder(new BuildException());
        static::$builder->setUpException();

        return static::$builder;
    }
}