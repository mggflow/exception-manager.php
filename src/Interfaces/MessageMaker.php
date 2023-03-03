<?php

namespace MGGFLOW\ExceptionManager\Interfaces;

interface MessageMaker
{
    public function make(array $messageParts): string;
}