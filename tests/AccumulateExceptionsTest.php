<?php

namespace MGGFLOW\ExceptionManager\Tests;

use MGGFLOW\ExceptionManager\AccumulateException;
use MGGFLOW\ExceptionManager\ManageException;

class AccumulateExceptionsTest extends \PHPUnit\Framework\TestCase
{
    public function testAccumulation(){
        $e1 = ManageException::build()
            ->log()->warning()->b()
            ->desc()->internal()
            ->context(uniqid())->b()->fill();
        $e2 = ManageException::build()
            ->log()->info()->b()
            ->desc()->expired('Time')
            ->context(uniqid())->b()->fill();

        $accumulatedExceptions = AccumulateException::getAccumulated();

        $this->assertCount(2, $accumulatedExceptions);
        $this->assertEquals($e1->toArray(false), $accumulatedExceptions[0]->toArray(false));
        $this->assertEquals($e2->toArray(false), $accumulatedExceptions[1]->toArray(false));
    }
}