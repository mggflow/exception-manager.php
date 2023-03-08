<?php

namespace MGGFLOW\ExceptionManager\Abstracted;

use MGGFLOW\ExceptionManager\Interfaces\CodeMaker;
use MGGFLOW\ExceptionManager\Interfaces\MessageMaker;
use MGGFLOW\ExceptionManager\Interfaces\UniException;

abstract class ExceptionBase extends \Exception implements UniException
{
    const LOG_LVL_FATAL = 2 ** 9;
    const LOG_LVL_ERROR = 2 ** 7;
    const LOG_LVL_WARNING = 2 ** 5;
    const LOG_LVL_INFO = 2 ** 3;

    const INTERNAL_ERROR_MESSAGE = 'Internal Error';

    protected int $logLvl = self::LOG_LVL_FATAL;
    protected bool $isInternal = false;

    protected array $messageParts = [];

    protected string $internalMessage;

    protected array $context = [];

    protected array $importedTrace = [];
    protected ?\Throwable $importedPrevious = null;

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
        $madeMessage = $messageMaker->make($this->getMessageParts());

        if (empty($madeMessage) and !empty($this->message)) {
            $madeMessage = $this->message;
        }

        if ($this->isInternal()) {
            $this->internalMessage = $madeMessage;
            $this->message = self::INTERNAL_ERROR_MESSAGE;
        } else {
            $this->message = $madeMessage;
        }
    }

    public function setContext($something, string $key = 'default')
    {
        $this->context[$key] = $something;
    }

    public function getContext(): array
    {
        return $this->context;
    }

    public function import(\Throwable $e): UniException
    {
        $this->file = $e->getFile();
        $this->line = $e->getLine();
        $this->code = $e->getCode();
        $this->message = $e->getMessage();

        $this->importedTrace = $e->getTrace();
        $this->importedPrevious = $e->getPrevious();

        return $this;
    }

    public function getImportedTrace(): array
    {
        return $this->importedTrace;
    }

    public function getImportedPrevious(): ?\Throwable
    {
        return $this->importedPrevious;
    }

    public function toArray(bool $excludeSensitive = true): array
    {
        $arr = [
            'code' => $this->getCode(),
            'message' => $this->getMessage(),
        ];

        if ($excludeSensitive) return $arr;

        $arr['internal'] = $this->isInternal();
        $arr['internalMessage'] = $this->getInternalMessage();

        $arr['logLvl'] = $this->getLogLvl();
        $arr['context'] = $this->getContext();
        $arr['file'] = $this->getFile();
        $arr['line'] = $this->getLine();
        $arr['trace'] = $this->getTrace();
        $arr['previous'] = $this->getPrevious();
        $arr['importedTrace'] = $this->getImportedTrace();
        $arr['importedPrevious'] = $this->getImportedPrevious();

        return $arr;
    }
}