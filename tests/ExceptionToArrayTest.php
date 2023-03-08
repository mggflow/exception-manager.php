<?php

namespace MGGFLOW\ExceptionManager\Tests;

use MGGFLOW\ExceptionManager\BuildException;
use MGGFLOW\ExceptionManager\UnexpectedError;

class ExceptionToArrayTest extends \PHPUnit\Framework\TestCase
{
    public function testToArrayWithoutSensitive(){
        $code = 12913;
        $message = uniqid();
        $e = new UnexpectedError($message, $code);

        $eArr = $e->toArray(true);

        self::assertCount(2, $eArr);
        self::assertEquals($code, $eArr['code']);
        self::assertEquals($message, $eArr['message']);
    }

    public function testToArrayWithSensitive(){
        $e = (new BuildException())
            ->log()->warning()->b()
            ->desc()->internal()
            ->context(uniqid())->b()->fill();
        $eArr = $e->toArray(false);

        self::assertEquals($e->getCode(), $eArr['code']);
        self::assertEquals($e->getMessage(), $eArr['message']);

        self::assertEquals($e->isInternal(), $eArr['internal']);
        self::assertEquals($e->getInternalMessage(), $eArr['internalMessage']);

        self::assertEquals($e->getLogLvl(), $eArr['logLvl']);
        self::assertEquals($e->getContext(), $eArr['context']);
        self::assertEquals($e->getFile(), $eArr['file']);
        self::assertEquals($e->getLine(), $eArr['line']);
        self::assertEquals($e->getTrace(),$eArr['trace']);
        self::assertEquals($e->getPrevious(), $eArr['previous'] );
        self::assertEquals($e->getImportedTrace(),$eArr['importedTrace']);
        self::assertEquals($e->getImportedPrevious(),$eArr['importedPrevious']);
    }
}