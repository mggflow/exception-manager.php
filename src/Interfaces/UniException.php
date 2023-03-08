<?php

namespace MGGFLOW\ExceptionManager\Interfaces;

interface UniException extends \Throwable
{
    public function addMessagePart(array $part);

    public function getMessageParts(): array;

    public function setLogLvl(int $lvl);

    public function getLogLvl(): int;

    public function setInternal(bool $flag);

    public function isInternal(): bool;

    public function getInternalMessage(): string;

    public function fill(CodeMaker $codeMaker, MessageMaker $messageMaker);

    public function setContext($something, string $key='default');

    public function getContext(): array;

    public function toArray(bool $excludeSensitive): array;

    public function import(\Throwable $e): self;

    public function getImportedTrace(): array;


    public function getImportedPrevious(): ?\Throwable;
}