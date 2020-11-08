<?php

declare(strict_types=1);

namespace WebGarden\Model\Tests\ValueObject;

use PHPUnit\Framework\TestCase;
use function WebGarden\Model\immutable;
use WebGarden\Model\ValueObject\ImmutableValueObject;

/**
 * @covers \WebGarden\Model\ValueObject\ImmutableValueObject
 *
 * @internal
 */
class ImmutableValueObjectTest extends TestCase
{
    public function testPreventsFromUsingConstructorAfterInitialization()
    {
        $this->expectException('LogicException');

        $proxiedValueObject = new ImmutableValueObject(new ValueObjectStub('foo'));
        $proxiedValueObject->__construct(new ValueObjectStub('bar'));
    }

    public function testReturnsItsStringRepresentation()
    {
        $proxiedValueObject = new ImmutableValueObject(new ValueObjectStub('foo'));

        $string = $proxiedValueObject->__toString();

        $this->assertSame('foo', $string);
    }

    public function testComparesEquality()
    {
        $standardValueObject = new ValueObjectStub('foo');
        $proxiedValueObject = new ImmutableValueObject(new ValueObjectStub('foo'));
        $otherValueObject = new ValueObjectStub('bar');

        $this->assertTrue($standardValueObject->sameValueAs($proxiedValueObject));
        $this->assertTrue($proxiedValueObject->sameValueAs($standardValueObject));
        $this->assertFalse($proxiedValueObject->sameValueAs($otherValueObject));
    }

    public function testTriggersWarningWhenWritingDataToInaccessibleProperty()
    {
        $this->expectWarning();
        $this->expectWarningMessageMatches('/.*object is immutable.*/');

        $proxiedValueObject = new ImmutableValueObject(new ValueObjectStub('foo'));

        $proxiedValueObject->a = 'test';
    }

    public function testTriggersWarningWhenUnsetIsUsedOnInaccessibleProperty()
    {
        $this->expectWarning();
        $this->expectWarningMessageMatches('/.*object is immutable.*/');

        $proxiedValueObject = new ImmutableValueObject(new ValueObjectStub('foo'));

        unset($proxiedValueObject->a);
    }

    public function testInitializableUsingHelperFunction()
    {
        $standardValueObject = new ValueObjectStub('foo');

        $proxiedValueObject = immutable($standardValueObject);

        $this->assertInstanceOf(ImmutableValueObject::class, $proxiedValueObject);
        $this->assertTrue($proxiedValueObject->sameValueAs($standardValueObject));
    }
}
