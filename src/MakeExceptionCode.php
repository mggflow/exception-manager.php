<?php

namespace MGGFLOW\ExceptionManager;

use MGGFLOW\ExceptionManager\Interfaces\CodeMaker;

class MakeExceptionCode implements CodeMaker
{
    public function make(array $messageParts): int
    {
        $textCode = '';
        foreach ($messageParts as $part) {
            if ($part[0] < 10) {
                $textCode .= '0';
            }

            $textCode .= $part[0];
        }

        return (int)$textCode;
    }
}