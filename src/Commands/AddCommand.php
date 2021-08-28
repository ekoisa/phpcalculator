<?php

namespace Jakmall\Recruitment\Calculator\Commands;

class AddCommand extends Base\CalculationBase
{
    protected static $commandName = 'add';

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
