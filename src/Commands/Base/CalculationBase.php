<?php

namespace Jakmall\Recruitment\Calculator\Commands\Base;

use Illuminate\Console\Command;

class CalculationBase extends Command
{
    /**
     * @var string
     */
    protected $signature;

    /**
     * @var string
     */
    protected $description;

    private static $scenarioList = [
        'add' => [
            'command' => 'add',
            'passive_verb' => 'added',
            'operator' => '+',
        ],
        'substract' => [
            'command' => 'substract',
            'passive_verb' => 'substracted',
            'operator' => '-',
        ],
        'multiply' => [
            'command' => 'multiply',
            'passive_verb' => 'multiplied',
            'operator' => '*',
        ],
        'divide' => [
            'command' => 'divide',
            'passive_verb' => 'divided',
            'operator' => '/',
        ],
        'power' => [
            'command' => 'power',
            'passive_verb' => 'powered',
            'operator' => '^',
        ]
    ];

    protected static $scenario = null;

    protected function getCommandVerb(): string
    {
        if (empty(self::$scenarioList[self::$scenario])) {
            throw new \Exception('Uknown command');
        }
        return self::$scenarioList[self::$scenario]['command'];
    }

    protected function getCommandPassiveVerb(): string
    {
        if (empty(self::$scenarioList[self::$scenario])) {
            throw new \Exception('Uknown command');
        }
        return self::$scenarioList[self::$scenario]['passive_verb'];
    }

    protected function getInput(): array
    {
        return $this->argument('numbers');
    }

    protected function getInputItem($itemName = 'numbers'): string
    {
        return $this->argument($itemName);
    }

    protected function generateCalculationDescription(array $numbers): string
    {
        $operator = $this->getOperator();
        $glue = sprintf(' %s ', $operator);

        return implode($glue, $numbers);
    }

    protected function getOperator(): string
    {
        return self::$scenarioList[self::$scenario]['operator'];
    }

    public function handleCalculation($forceInput = null): void
    {
        if (is_null($forceInput)) {
            $numbers = $this->getInput();
        } else {
            $numbers = $forceInput;
        }
        $description = $this->generateCalculationDescription($numbers);
        $result = $this->calculateAll($numbers);

        $this->comment(sprintf('%s = %s', $description, $result));
    }

    /**
     * @param array $numbers
     *
     * @return float|int
     */
    protected function calculateAll(array $numbers)
    {
        $number = array_pop($numbers);

        if (count($numbers) <= 0) {
            return $number;
        }

        return $this->calculate($this->calculateAll($numbers), $number);
    }

    /**
     * @param int|float $number1
     * @param int|float $number2
     *
     * @return int|float
     */
    protected function calculate($number1, $number2)
    {
        $result = 0;
        switch (self::$scenario) {
            case 'add':
                $result = $number1 + $number2;
                break;

            case 'substract':
                $result = $number1 - $number2;
                break;

            case 'multiply':
                $result = $number1 * $number2;
                break;

            case 'divide':
                $result = $number1 / $number2;
                break;

            case 'power':
                $result = pow($number1, $number2);
                break;

            default:
                break;
        }

        return $result;
    }
}
