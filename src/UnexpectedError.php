<?php

namespace MGGFLOW\ExceptionManager;

use MGGFLOW\ExceptionManager\Abstracted\ExceptionBase;

class UnexpectedError extends ExceptionBase
{
    protected int $logLvl = self::LOG_LVL_FATAL;

    protected $code = 00;
    protected $message = 'Unexpected Error';
}