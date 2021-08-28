<?php

namespace App\Tests\Unit\Commands;

use PHPUnit\Framework\TestCase;
use Jakmall\Recruitment\Calculator\Commands\AddCommand;

class AddCommandTest extends TestCase
{
    private $mockAddCommand;
    private $addCommand;

    public function setUp(): void
    {
        $this->mockAddCommand = $this->getMockBuilder(AddCommand::class)
            ->disableOriginalConstructor()
            ->getMock();

        $this->addCommand = new AddCommand();
    }

    public function testCommandExists()
    {
        $this->assertNotNull($this->addCommand);
    }

    /**
     * @dataProvider getDataTestCommandProcess
     */
    public function testCommandProcess($param1, $param2, $param3, $expected)
    {
        $actual = $this->addCommand->handleCalculation([$param1, $param2, $param3]);
        $this->assertEquals($expected, $actual);
    }

    public function getDataTestCommandProcess()
    {
        return [
            'data 1 + 2 + 3' => [
                'param1' => 1,
                'param2' => 2,
                'param3' => 3,
                'expected' => 6,
            ],
            'data 3 + 3 + 1' => [
                'param1' => 3,
                'param2' => 3,
                'param3' => 1,
                'expected' => 7,
            ],
        ];
    }

}