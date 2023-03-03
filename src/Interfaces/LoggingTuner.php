<?php

namespace MGGFLOW\ExceptionManager\Interfaces;

use MGGFLOW\ExceptionManager\Abstracted\ExceptionBuilder;

interface LoggingTuner
{
    public function b(): ExceptionBuilder;

    public function setLvl(int $lvl): LoggingTuner;
}