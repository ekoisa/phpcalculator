<?php

namespace Jakmall\Recruitment\Calculator\Commands;

class MultiplyCommand extends Base\CalculationBase
{
    protected static $commandName = 'multiply';

    public function __construct()
    {
        self::$scenario = self::$commandName;
        $commandVerb = $this->getCommandVerb();

        $this->signature = sprintf(
            '%s {numbers* : The numbers to be %s}',
            $commandVerb,
            $this->getCommandPassiveVerb()
        );
        $this->description = sprintf('%s all given Numbers', ucfirst($commandVerb));

        parent::__construct();
    }

    public function handle(): void
    {
        self::$scenario = self::$commandName;
        $result = parent::handleCalculation();
        $this->comment(sprintf('%s = %s', $this->resultDescription, $result));
    }

}
