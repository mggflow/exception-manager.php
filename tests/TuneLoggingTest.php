<?php

namespace MGGFLOW\ExceptionManager\Tests;

use MGGFLOW\ExceptionManager\Abstracted\ExceptionBase;
use MGGFLOW\ExceptionManager\BuildException;

class TuneLoggingTest extends \PHPUnit\Framework\TestCase
{
    public function testSettingLvl(){
        $lvl = 7;
        $e = (new BuildException())->log()->setLvl($lvl)->b()->e();
        self::assertEquals($lvl, $e->getLogLvl());
    }

    public function testFatalLvl(){
        $e = (new BuildException())->log()->fatal()->b()->e();

        self::assertEquals(ExceptionBase::LOG_LVL_FATAL, $e->getLogLvl());
    }

    public function testErrorLvl(){
        $e = (new BuildException())->log()->error()->b()->e();

        self::assertEquals(ExceptionBase::LOG_LVL_ERROR, $e->getLogLvl());
    }

    public function testWarningLvl(){
        $e = (new BuildException())->log()->warning()->b()->e();

        self::assertEquals(ExceptionBase::LOG_LVL_WARNING, $e->getLogLvl());
    }

    public function testInfoLvl(){
        $e = (new BuildException())->log()->info()->b()->e();

        self::assertEquals(ExceptionBase::LOG_LVL_INFO, $e->getLogLvl());
    }
}