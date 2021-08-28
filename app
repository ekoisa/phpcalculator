#!/usr/bin/env php
<?php

use Illuminate\Console\Application;
use Illuminate\Container\Container;
use Illuminate\Events\Dispatcher;
use Symfony\Component\Console\Input\ArgvInput;
use Symfony\Component\Console\Output\ConsoleOutput;

try {
    require_once __DIR__.'/vendor/autoload.php';

    $container = new Container();
    $dispatcher = new Dispatcher();
    $app = new Application($container, $dispatcher, '0.1');
    $app->setName('Calculator');

    $commands = require_once __DIR__.'/commands.php';
    $commands = collect($commands)
        ->map(
            function ($command) use ($app) {
                return $app->getLaravel()->make($command);
            }
        )
        ->all()
    ;

    $app->addCommands($commands);

    $app->run(new ArgvInput(), new ConsoleOutput());

} catch (Throwable $e) {

    $output = new ConsoleOutput();
    $output->writeln('<comment>debugging:</comment>');
    $output->writeln('<comment>code = '.$e->getCode().'; file = '.$e->getFile().'; line = '.$e->getLine().'</comment>');
    $output->writeln('<comment>message = '. $e->getMessage() .'</comment>');

}
