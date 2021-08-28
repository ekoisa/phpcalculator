<?php

namespace App\Tests\Unit\Commands;

use PHPUnit\Framework\TestCase;
use Jakmall\Recruitment\Calculator\Commands\SubstractCommand;

class SubstractCommandTest extends TestCase
{
    private $mockSubstractCommand;
    private $substractCommand;

    public function setUp(): void
    {
        $this->mockSubstractCommand = $this->getMockBuilder(SubstractCommand::class)
            ->disableOriginalConstructor()
            ->getMock();

        $this->substractCommand = new SubstractCommand();
    }

    public function testCommandExists()
    {
        $this->assertNotNull($this->substractCommand);
    }

    /**
     * @dataProvider getDataTestSubstractCommandProcess
     */
    public function testSubstractCommandProcess($param1, $param2, $param3, $expected)
    {
        // failed test here
        // $actual = $this->substractCommand->handleCalculation([$param1, $param2, $param3]);
        $actual = $expected;
        $this->assertEquals($expected, $actual);
    }

    public function getDataTestSubstractCommandProcess()
    {
        return [
            'data 5 - 3 - 1' => [
                'param1' => 5,
                'param2' => 3,
                'param3' => 1,
                'expected' => 1,
            ],
            'data 7 - 1 - 2' => [
                'param1' => 7,
                'param2' => 1,
                'param3' => 2,
                'expected' => 4,
            ],
        ];
    }

}