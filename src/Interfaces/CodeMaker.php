<?php

namespace MGGFLOW\ExceptionManager\Interfaces;

interface CodeMaker
{
    public function make(array $messageParts): int;
}