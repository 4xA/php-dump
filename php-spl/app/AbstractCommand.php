<?php

namespace App;

use InvalidArgumentException;

abstract class AbstractCommand
{
    private $arguments = [];

    public function __construct($arguments)
    {
        $this->arguments = $arguments;
    }

    public abstract function execute();

    protected function argument(int $index)
    {
        if (count($this->arguments) <= $index) {
            throw new InvalidArgumentException('Not enough arguments are passed');
        }
        return $this->arguments[$index];
    }
}
