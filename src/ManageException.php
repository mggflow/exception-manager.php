<?php

namespace MGGFLOW\ExceptionManager;

use MGGFLOW\ExceptionManager\Abstracted\ExceptionManager;
use MGGFLOW\ExceptionManager\Abstracted\ExceptionBuilder;

class ManageException extends ExceptionManager
{
    public static function setBuilder(ExceptionBuilder $builder): ManageException
    {
        self::$builder = $builder;

        return new static();
    }

    public static function build(): BuildException
    {
        if (empty(self::$builder)) self::setBuilder(new BuildException());

        return self::$builder;
    }
}