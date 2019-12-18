<?php

namespace Nickcheek\Handwriting\Tests;

use Nickcheek\Handwriting\Writer;
use PHPUnit\Framework\TestCase;

class HandwritingTest extends TestCase
{
    /** @test */
    public function test_handwriting_class_returns_an_object(): void
    {
        $class = new Writer('user','pass');
        $this->assertIsObject($class);
    }

    public function test_that_builder_works()
    {
        $builder = new Writer('test','test');
        $url = $builder->build();
        $this->assertContains('handwriting_id',$url,true);
    }
}
