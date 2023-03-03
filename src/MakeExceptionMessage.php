<?php

namespace MGGFLOW\ExceptionManager;

use MGGFLOW\ExceptionManager\Interfaces\MessageMaker;

class MakeExceptionMessage implements MessageMaker
{
    public function make(array $messageParts): string
    {
        $message = '';

        foreach ($messageParts as $messagePart) {
            $message .= join(' ', $messagePart[1]) . ' ';
        }

        return ucfirst(trim($message));
    }
}