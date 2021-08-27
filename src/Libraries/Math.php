<?php

namespace Jakmall\Recruitment\Calculator\Libraries;

class Math
{
    public function __construct()
    {
    }

    protected function getCommandVerb(): string
    {
        // print_r(['dbg', 2]); 
        return 'add';
    }

    protected function getCommandPassiveVerb(): string
    {
        // print_r(['dbg', 3]); 
        return 'added';
    }

    public function handle(): void
    {
        // print_r(['dbg', 4]); 
        // $arguments = $this->arguments();
        // print_r(['arguments', $arguments]); exit;
        $numbers = $this->getInput();
        // print_r(['numbers', $numbers]); exit;
        $description = $this->generateCalculationDescription($numbers);
        $result = $this->calculateAll($numbers);

        $this->comment(sprintf('%s = %s', $description, $result));
    }

    protected function getInput(): array
    {
        return $this->argument('numbers');
    }

    protected function generateCalculationDescription(array $numbers): string
    {
        $operator = $this->getOperator();
        $glue = sprintf(' %s ', $operator);

        return implode($glue, $numbers);
    }

    protected function getOperator(): string
    {
        return '+';
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
        return $number1 + $number2;
    }
}
