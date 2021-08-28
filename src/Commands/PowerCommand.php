<?php

namespace Jakmall\Recruitment\Calculator\Commands;

class PowerCommand extends Base\CalculationBase
{
    protected static $commandName = 'power';

    public function __construct()
    {
        self::$scenario = self::$commandName;
        $commandVerb = $this->getCommandVerb();

        $this->signature = sprintf(
            '%s {numbers : The numbers to be %s} {power : The %s value}',
            $commandVerb,
            $this->getCommandPassiveVerb(),
            $this->getCommandPassiveVerb()
        );
        $this->description = sprintf('%s all given Numbers', ucfirst($commandVerb));

        parent::__construct();
    }

    public function handle(): void
    {
        self::$scenario = self::$commandName;
        $input = [$this->getInputItem('numbers'), $this->getInputItem('power')];
        parent::handleCalculation($input);
    }

}
