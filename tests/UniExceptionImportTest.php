<?php

namespace MGGFLOW\ExceptionManager\Tests;

use MGGFLOW\ExceptionManager\BuildException;
use MGGFLOW\ExceptionManager\UnexpectedError;

class UniExceptionImportTest extends \PHPUnit\Framework\TestCase
{
    public function testImport()
    {
        $e = (new \ParseError());
        $uniE = (new BuildException(new UnexpectedError()))->e();

        $uniE->import($e);

        $this->assertEquals($e->getCode(), $uniE->getCode());
        $this->assertEquals($e->getMessage(), $uniE->getMessage());
        $this->assertEquals($e->getLine(), $uniE->getLine());
        $this->assertEquals($e->getFile(), $uniE->getFile());
        $this->assertEquals($e->getTrace(), $uniE->getImportedTrace());
        $this->assertEquals($e->getPrevious(), $uniE->getImportedPrevious());
    }
}