<?php

namespace Tests\Unit;

use App\Models\IndexModel;
use PHPUnit\Framework\TestCase;

class IndexModelTest extends TestCase
{
    /**
     * @dataProvider nameProvider
     *
     * @param $parameter
     * @param $expectedMessage
     * @throws ReflectionException
     */
    public function testSetName($parameter, $expectedMessage): void
    {
        $reflector = new \ReflectionClass(IndexModel::class);
        $instance  = $reflector->newInstanceWithoutConstructor();
        $method    = $reflector->getMethod('setName');
        $method->setAccessible(true);
        $this->expectExceptionMessage($expectedMessage);
        $method->invoke($instance, $parameter);
    }

    public function nameProvider()
    {
        return [
            [null, 'Name field is required'],
            ['', 'Name field is required']
        ];
    }

    /**
     * @dataProvider nameWithoutExceptionProvider
     *
     * @param $parameter
     * @param $expected
     * @throws Exception
     */
    public function testSetNameWithoutException($parameter, $expected): void
    {
        $reflector = new \ReflectionClass(IndexModel::class);
        $instance  = $reflector->newInstanceWithoutConstructor();
        $method    = $reflector->getMethod('setName');
        $method->setAccessible(true);

        $this->assertEquals($expected, $method->invoke($instance, $parameter));
    }

    public function nameWithoutExceptionProvider()
    {
        return [
            ['Test', 'Test'],
            ['123', '123']
        ];
    }

    public function testGetName(): void
    {
        $mockedClass = $this->createMock(IndexModel::class);
        $mockedClass->method('getName')
            ->willReturn('Test');
        $this->assertEquals('Test', $mockedClass->getName());
    }

    /**
     * @dataProvider emailProvider
     *
     * @param $parameter
     * @param $expectedMessage
     * @throws ReflectionException
     */
    public function testSetEmail($parameter, $expectedMessage): void
    {
        $reflector = new \ReflectionClass(IndexModel::class);
        $instance  = $reflector->newInstanceWithoutConstructor();
        $method    = $reflector->getMethod('setEmail');
        $method->setAccessible(true);
        $this->expectExceptionMessage($expectedMessage);
        $method->invoke($instance, $parameter);
    }

    public function emailProvider()
    {
        return [
            [null, 'Email field is required or invalid'],
            ['', 'Email field is required or invalid'],
            ['sdfsdfs', 'Email field is required or invalid']
        ];
    }

    /**
     * @dataProvider emailWithoutExceptionProvider
     *
     * @param $parameter
     * @param $expected
     * @throws Exception
     */
    public function testSetEmailWithoutException($parameter, $expected): void
    {
        $reflector = new \ReflectionClass(IndexModel::class);
        $instance  = $reflector->newInstanceWithoutConstructor();
        $method    = $reflector->getMethod('setEmail');
        $method->setAccessible(true);

        $this->assertEquals($expected, $method->invoke($instance, $parameter));
    }

    public function emailWithoutExceptionProvider()
    {
        return [
            ['test@test.com', 'test@test.com'],
            ['123@123.com', '123@123.com']
        ];
    }

    public function testGetEmail(): void
    {
        $mockedClass = $this->createMock(IndexModel::class);
        $mockedClass->method('getEmail')
            ->willReturn('test@test.com');
        $this->assertEquals('test@test.com', $mockedClass->getEmail());
    }

    /**
     * @dataProvider messageProvider
     *
     * @param $parameter
     * @param $expectedMessage
     * @throws ReflectionException
     */
    public function testSetMessage($parameter, $expectedMessage): void
    {
        $reflector = new \ReflectionClass(IndexModel::class);
        $instance  = $reflector->newInstanceWithoutConstructor();
        $method    = $reflector->getMethod('setMessage');
        $method->setAccessible(true);
        $this->expectExceptionMessage($expectedMessage);
        $method->invoke($instance, $parameter);
    }

    public function messageProvider()
    {
        return [
            [null, 'Message field is required'],
            ['', 'Message field is required']
        ];
    }

    /**
     * @dataProvider messageWithoutExceptionProvider
     *
     * @param $parameter
     * @param $expected
     * @throws Exception
     */
    public function testSetMessageWithoutException($parameter, $expected): void
    {
        $reflector = new \ReflectionClass(IndexModel::class);
        $instance  = $reflector->newInstanceWithoutConstructor();
        $method    = $reflector->getMethod('setMessage');
        $method->setAccessible(true);

        $this->assertEquals($expected, $method->invoke($instance, $parameter));
    }

    public function messageWithoutExceptionProvider()
    {
        return [
            ['Test', 'Test'],
            ['123', '123']
        ];
    }

    public function testGetMessage(): void
    {
        $mockedClass = $this->createMock(IndexModel::class);
        $mockedClass->method('getMessage')
            ->willReturn('Test');
        $this->assertEquals('Test', $mockedClass->getMessage());
    }
}
