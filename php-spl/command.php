<?php

require __DIR__ . '/vendor/autoload.php';

$commands = require __DIR__ . '/config/commands.php';

if (count($argv) <= 1) {
    throw new Exception('You must specify a command to run...');
}

$command = $argv[1];

if (!array_key_exists($command, $commands)) {
    throw new Exception('Specified command does not exist...');
}

$className = $commands[$command];

$method = new ReflectionMethod($className, 'execute');

$method->invoke(new $className(array_splice($argv, 2)));
