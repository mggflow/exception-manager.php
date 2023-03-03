<?php

namespace MGGFLOW\ExceptionManager\Abstracted;

use MGGFLOW\ExceptionManager\Interfaces\CodeMaker;
use MGGFLOW\ExceptionManager\Interfaces\MessageMaker;
use MGGFLOW\ExceptionManager\Interfaces\UniException;

abstract class ExceptionBase extends \Exception implements UniException
{
    const LOG_LVL_FATAL = 0;
    const LOG_LVL_ERROR = 1;
    const LOG_LVL_WARNING = 2;
    const LOG_LVL_INFO = 3;

    const INTERNAL_ERROR_MESSAGE = 'Internal Error';

    public int $logLvl = self::LOG_LVL_FATAL;
    public bool $isInternal = false;

    protected array $messageParts = [];

    protected string $internalMessage;

    public function addMessagePart(array $part)
    {
        $this->messageParts[] = $part;
    }

    public function getMessageParts(): array
    {
        return $this->messageParts;
    }

    public function getLogLvl(): int
    {
        return $this->logLvl;
    }

    public function isInternal(): bool
    {
        return $this->isInternal;
    }

    public function getInternalMessage(): string
    {
        return ($this->internalMessage ?? $this->message);
    }

    public function setLogLvl(int $lvl)
    {
        $this->logLvl = $lvl;
    }

    public function setInternal(bool $flag = true)
    {
        $this->isInternal = $flag;
    }

    public function fill(CodeMaker $codeMaker, MessageMaker $messageMaker)
    {
        $this->code = $codeMaker->make($this->getMessageParts());

        if ($this->isInternal()) {
            $this->message = self::INTERNAL_ERROR_MESSAGE;
            $this->internalMessage = $messageMaker->make($this->getMessageParts());
        } else {
            $this->message = $messageMaker->make($this->getMessageParts());
        }
    }
}