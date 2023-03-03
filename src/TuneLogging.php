<?php

namespace MGGFLOW\ExceptionManager;

use MGGFLOW\ExceptionManager\Abstracted\ExceptionBuilder;
use MGGFLOW\ExceptionManager\Abstracted\ExceptionBase;
use MGGFLOW\ExceptionManager\Interfaces\LoggingTuner;
use MGGFLOW\ExceptionManager\Interfaces\UniException;

class TuneLogging implements LoggingTuner
{
    protected ExceptionBuilder $builder;
    protected UniException $exception;

    public function __construct(ExceptionBuilder $builder, UniException $exception)
    {
        $this->builder = $builder;
        $this->exception = $exception;
    }

    public function b(): BuildException
    {
        return $this->builder;
    }

    public function fatal(): self
    {
        $this->exception->setLogLvl(ExceptionBase::LOG_LVL_FATAL);

        return $this;
    }

    public function error(): self
    {
        $this->exception->setLogLvl(ExceptionBase::LOG_LVL_ERROR);

        return $this;
    }

    public function warning(): self
    {
        $this->exception->setLogLvl(ExceptionBase::LOG_LVL_WARNING);

        return $this;
    }

    public function info(): self
    {
        $this->exception->setLogLvl(ExceptionBase::LOG_LVL_INFO);

        return $this;
    }

    public function setLvl(int $lvl): TuneLogging
    {
        $this->exception->setLogLvl($lvl);

        return $this;
    }
}