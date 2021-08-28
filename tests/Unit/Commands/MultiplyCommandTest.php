<?php

namespace App\Tests\Unit\Commands;

use PHPUnit\Framework\TestCase;
use Jakmall\Recruitment\Calculator\Commands\MultiplyCommand;

class MultiplyCommandTest extends TestCase
{
    private $mockMultiplyCommand;
    private $multiplyCommand;

    public function setUp(): void
    {
        $this->mockMultiplyCommand = $this->getMockBuilder(MultiplyCommand::class)
            ->disableOriginalConstructor()
            ->getMock();

        $this->multiplyCommand = new MultiplyCommand();
    }

    public function testCommandExists()
    {
        $this->assertNotNull($this->multiplyCommand);
    }

    /**
     * @dataProvider getDataTestMultiplyCommandProcess
     */
    public function testMultiplyCommandProcess($param1, $param2, $param3, $expected)
    {
        $actual = $this->multiplyCommand->handleCalculation([$param1, $param2, $param3]);
        $this->assertEquals($expected, $actual);
    }

    public function getDataTestMultiplyCommandProcess()
    {
        return [
            'data 3 * 2 * 5' => [
                'param1' => 3,
                'param2' => 2,
                'param3' => 5,
                'expected' => 30,
            ],
            'data 1 / 2 / 3' => [
                'param1' => 1,
                'param2' => 2,
                'param3' => 3,
                'expected' => 6,
            ],
        ];
    }

}