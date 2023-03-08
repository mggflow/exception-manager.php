<?php

namespace MGGFLOW\ExceptionManager;

use MGGFLOW\ExceptionManager\Abstracted\ExceptionBuilder;
use MGGFLOW\ExceptionManager\Interfaces\UniException;

class BuildException extends ExceptionBuilder
{

    public function __construct(?UniException $exception = null)
    {
        if(!is_null($exception)) $this->setUpException($exception);
    }

    public function setUpException(?UniException $exception = null){
        $this->exception = ($exception ?? new UnexpectedError());

        $this->descTuner = new TuneDesc($this, $this->exception);
        $this->loggingTuner = new TuneLogging($this, $this->exception);
        $this->codeMaker = new MakeExceptionCode();
        $this->messageMaker = new MakeExceptionMessage();
    }

    public function log(): TuneLogging
    {
        return $this->loggingTuner;
    }

    public function desc(): TuneDesc
    {
        return $this->descTuner;
    }

    public function fill(): UniException
    {
        $this->exception->fill($this->codeMaker, $this->messageMaker);

        return $this->e();
    }

    public function e(): UniException
    {
        return $this->exception;
    }
}