<?php

namespace Jakmall\Recruitment\Calculator\Commands;

class DivideCommand extends Base\CalculationBase
{
    protected static $commandName = 'divide';

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
        parent::handleCalculation();
    }

}
