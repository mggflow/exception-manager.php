<?php

namespace MGGFLOW\ExceptionManager\Tests;

use MGGFLOW\ExceptionManager\BuildException;
use MGGFLOW\ExceptionManager\UnexpectedError;

class MakeExceptionCodeTest extends \PHPUnit\Framework\TestCase
{
    public function testMake(){
        $codes = (new BuildException(new UnexpectedError()))->desc()->getCodes();
        $phraseKeys = array_rand($codes, 3);

        $builder = new BuildException(new UnexpectedError());
        foreach ($phraseKeys as $phraseKey){
            $builder->desc()->$phraseKey();
        }

        $expectedCodes = array_map(
            function ($phraseKey) use ($codes) {
                    $codePart = (string)($codes[$phraseKey][0]);
                    return (strlen($codePart)==2) ? $codePart : '0'.$codePart;
                },
            $phraseKeys
        );

        $expectedCode = (int)join('', $expectedCodes);

        $e = $builder->fill();

        self::assertEquals($expectedCode, $e->getCode());
    }
}