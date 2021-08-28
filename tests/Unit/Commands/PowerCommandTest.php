<?php

namespace App\Tests\Unit\Commands;

use PHPUnit\Framework\TestCase;
use Jakmall\Recruitment\Calculator\Commands\PowerCommand;

class PowerCommandTest extends TestCase
{
    private $mockPowerCommand;
    private $powerCommand;

    public function setUp(): void
    {
        $this->mockPowerCommand = $this->getMockBuilder(PowerCommand::class)
            ->disableOriginalConstructor()
            ->getMock();

        $this->powerCommand = new PowerCommand();
    }

    public function testCommandExists()
    {
        $this->assertNotNull($this->powerCommand);
    }

    /**
     * @dataProvider getDataTestPowerCommandProcess
     */
    public function testPowerCommandProcess($param1, $param2, $expected)
    {
        $actual = $this->powerCommand->handleCalculation([$param1, $param2]);
        $this->assertEquals($expected, $actual);
    }

    public function getDataTestPowerCommandProcess()
    {
        return [
            'data 3 ^ 2' => [
                'param1' => 3,
                'param2' => 2,
                'expected' => 9,
            ],
            'data 2 ^ 5' => [
                'param1' => 2,
                'param2' => 5,
                'expected' => 32,
            ],
        ];
    }

}