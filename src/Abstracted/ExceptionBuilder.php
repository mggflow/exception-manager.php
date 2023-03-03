<?php

namespace MGGFLOW\ExceptionManager\Abstracted;

use MGGFLOW\ExceptionManager\Interfaces\CodeMaker;
use MGGFLOW\ExceptionManager\Interfaces\DescTuner;
use MGGFLOW\ExceptionManager\Interfaces\LoggingTuner;
use MGGFLOW\ExceptionManager\Interfaces\MessageMaker;
use MGGFLOW\ExceptionManager\Interfaces\UniException;

abstract class ExceptionBuilder
{
    protected UniException $exception;
    protected LoggingTuner $loggingTuner;
    protected DescTuner $descTuner;
    protected CodeMaker $codeMaker;
    protected MessageMaker $messageMaker;

    abstract public function __construct(?UniException $exception);

    abstract public function log(): LoggingTuner;

    abstract public function desc(): DescTuner;

    abstract public function fill(): UniException;

    abstract public function e(): UniException;
}