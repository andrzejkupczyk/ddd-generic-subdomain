<?php

declare(strict_types=1);

namespace WebGarden\Model\Tests\ValueObject;

use PHPUnit\Framework\TestCase;

/**
 * @covers \WebGarden\Model\ValueObject\SimpleComparison
 *
 * @internal
 */
class SimpleComparisonTest extends TestCase
{
    public function testForObjectsByTheirValues()
    {
        $firstObject = new ValueObjectStub('foo');
        $secondObject = new ValueObjectStub('foo');
        $thirdObject = new ValueObjectStub('bar');

        $this->assertTrue($firstObject->sameValueAs($secondObject));
        $this->assertTrue($secondObject->sameValueAs($firstObject));
        $this->assertFalse($firstObject->sameValueAs($thirdObject));
    }

    public function testForObjectsByTheirTypes()
    {
        $firstObject = new ValueObjectStub('foo');
        $secondObject = new class('foo') extends ValueObjectStub {
        };

        $this->assertFalse($firstObject->sameValueAs($secondObject));
    }
}
