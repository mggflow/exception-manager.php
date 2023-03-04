<?php

namespace MGGFLOW\ExceptionManager\Tests;

use MGGFLOW\ExceptionManager\Abstracted\ExceptionBase;
use MGGFLOW\ExceptionManager\BuildException;
use MGGFLOW\ExceptionManager\Interfaces\UniException;
use MGGFLOW\ExceptionManager\UnexpectedError;

class TuneDescTest extends \PHPUnit\Framework\TestCase
{
    protected array $codes;

    protected function setUp(): void
    {
        $this->codes = (new BuildException())->desc()->getCodes();
    }

    public function testCodeMethodsRepresentation(){
        foreach ($this->codes as $phraseKey=>$desc){
            self::assertTrue(method_exists((new BuildException())->desc(), $phraseKey), $phraseKey. ' method does not exist');
        }
    }

    public function testCodeMatching(){
        foreach ($this->codes as $phraseKey=>$desc){
            $e = (new BuildException())->desc()->$phraseKey()->b()->fill();
            self::assertInstanceOf(UniException::class, $e);
            self::assertEquals($desc[0], $e->getCode(), 'Desc has code: '.$desc[0].' but e returns: '.$e->getCode());
        }
    }

    public function testInternalBehavior(){
        $e = (new BuildException())->desc()->internal()->b()->fill();
        self::assertEquals(ExceptionBase::INTERNAL_ERROR_MESSAGE, $e->getMessage());
    }

    public function testUnexpectedBehaviorWithFilling(){
        $e = (new BuildException())->desc()->b()->fill();
        $unexpectedE = new UnexpectedError();
        self::assertEquals($unexpectedE->getMessage(), $e->getMessage());
    }

    public function testUnexpectedBehaviorWithoutFilling(){
        $e = (new BuildException())->desc()->b()->e();
        $unexpectedE = new UnexpectedError();
        self::assertEquals($unexpectedE->getMessage(), $e->getMessage());
        self::assertEquals($unexpectedE->getCode(), $e->getCode());
    }

    public function testInternalUnexpectedBehavior(){
        $e = (new BuildException())->desc()->internal()->b()->fill();
        $unexpectedE = new UnexpectedError();

        self::assertEquals(ExceptionBase::INTERNAL_ERROR_MESSAGE, $e->getMessage());
        self::assertEquals($unexpectedE->getMessage(), $e->getInternalMessage());
        self::assertEquals($unexpectedE->getCode(), $e->getCode());
    }
}