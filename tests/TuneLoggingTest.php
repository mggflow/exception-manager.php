<?php

namespace MGGFLOW\ExceptionManager\Tests;

use MGGFLOW\ExceptionManager\Abstracted\ExceptionBase;
use MGGFLOW\ExceptionManager\BuildException;
use MGGFLOW\ExceptionManager\UnexpectedError;

class TuneLoggingTest extends \PHPUnit\Framework\TestCase
{
    public function testSettingLvl(){
        $lvl = 7;
        $e = (new BuildException(new UnexpectedError()))->log()->setLvl($lvl)->b()->e();
        self::assertEquals($lvl, $e->getLogLvl());
    }

    public function testFatalLvl(){
        $e = (new BuildException(new UnexpectedError()))->log()->fatal()->b()->e();

        self::assertEquals(ExceptionBase::LOG_LVL_FATAL, $e->getLogLvl());
    }

    public function testErrorLvl(){
        $e = (new BuildException(new UnexpectedError()))->log()->error()->b()->e();

        self::assertEquals(ExceptionBase::LOG_LVL_ERROR, $e->getLogLvl());
    }

    public function testWarningLvl(){
        $e = (new BuildException(new UnexpectedError()))->log()->warning()->b()->e();

        self::assertEquals(ExceptionBase::LOG_LVL_WARNING, $e->getLogLvl());
    }

    public function testInfoLvl(){
        $e = (new BuildException(new UnexpectedError()))->log()->info()->b()->e();

        self::assertEquals(ExceptionBase::LOG_LVL_INFO, $e->getLogLvl());
    }
}