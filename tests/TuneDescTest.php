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
        $this->codes = (new BuildException(new UnexpectedError()))->desc()->getCodes();
    }

    public function testCodeMethodsRepresentation(){
        foreach ($this->codes as $phraseKey=>$desc){
            self::assertTrue(method_exists((new BuildException(new UnexpectedError()))
                ->desc(), $phraseKey), $phraseKey. ' method does not exist');
        }
    }

    public function testCodeMatching(){
        foreach ($this->codes as $phraseKey=>$desc){
            $e = (new BuildException(new UnexpectedError()))->desc()->$phraseKey()->b()->fill();
            self::assertInstanceOf(UniException::class, $e);
            self::assertEquals($desc[0], $e->getCode(), 'Desc has code: '.$desc[0].' but e returns: '.$e->getCode());
        }
    }

    public function testInternalBehavior(){
        $e = (new BuildException(new UnexpectedError()))->desc()->internal()->b()->fill();
        self::assertEquals(ExceptionBase::INTERNAL_ERROR_MESSAGE, $e->getMessage());
    }

    public function testUnexpectedBehaviorWithFilling(){
        $e = (new BuildException(new UnexpectedError()))->desc()->b()->fill();
        $unexpectedE = new UnexpectedError();
        self::assertEquals($unexpectedE->getMessage(), $e->getMessage());
    }

    public function testUnexpectedBehaviorWithoutFilling(){
        $e = (new BuildException(new UnexpectedError()))->desc()->b()->e();
        $unexpectedE = new UnexpectedError();
        self::assertEquals($unexpectedE->getMessage(), $e->getMessage());
        self::assertEquals($unexpectedE->getCode(), $e->getCode());
    }

    public function testInternalUnexpectedBehavior(){
        $e = (new BuildException(new UnexpectedError()))->desc()->internal()->b()->fill();
        $unexpectedE = new UnexpectedError();

        self::assertEquals(ExceptionBase::INTERNAL_ERROR_MESSAGE, $e->getMessage());
        self::assertEquals($unexpectedE->getMessage(), $e->getInternalMessage());
        self::assertEquals($unexpectedE->getCode(), $e->getCode());
    }

    public function testContext(){
        $context = uniqid();
        $key = 'id';
        $e = (new BuildException(new UnexpectedError()))->desc()->context($context, $key)->b()->fill();

        self::assertEquals($context, $e->getContext()[$key]);
    }
}