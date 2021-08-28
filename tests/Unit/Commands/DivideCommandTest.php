<?php

namespace App\Tests\Unit\Commands;

use PHPUnit\Framework\TestCase;
use Jakmall\Recruitment\Calculator\Commands\DivideCommand;

class DivideCommandTest extends TestCase
{
    private $mockDivideCommand;
    private $divideCommand;

    public function setUp(): void
    {
        $this->mockDivideCommand = $this->getMockBuilder(DivideCommand::class)
            ->disableOriginalConstructor()
            ->getMock();

        $this->divideCommand = new DivideCommand();
    }

    public function testCommandExists()
    {
        $this->assertNotNull($this->divideCommand);
    }

    /**
     * @dataProvider getDataTestDivideCommandProcess
     */
    public function testDivideCommandProcess($param1, $param2, $param3, $expected)
    {
        $actual = $this->divideCommand->handleCalculation([$param1, $param2, $param3]);
        $this->assertEquals($expected, $actual);
    }

    public function getDataTestDivideCommandProcess()
    {
        return [
            'data 30 / 3 / 2' => [
                'param1' => 30,
                'param2' => 3,
                'param3' => 2,
                'expected' => 5,
            ],
            'data 50 / 5 / 2' => [
                'param1' => 50,
                'param2' => 5,
                'param3' => 2,
                'expected' => 5,
            ],
        ];
    }

}