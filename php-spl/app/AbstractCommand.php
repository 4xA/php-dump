<?php

namespace App;

use InvalidArgumentException;

/**
 * This abstract class is the parent class for any command in this framwork
 */
abstract class AbstractCommand
{
    /**
     * Command-line arguemnts array
     * 
     * @var array
     */
    private $arguments = [];

    public function __construct($arguments)
    {
        $this->arguments = $arguments;
    }

    /**
     * Entry point of command
     * 
     * @return void
     */
    public abstract function execute();

    /**
     * Access command line argument by index
     * 
     * @param int $index The index of the command-line argument (starts from 0)
     * 
     * @throws InvalidArgumentException
     * 
     * @return mixed
     */
    protected function argument(int $index)
    {
        if (count($this->arguments) <= $index) {
            throw new InvalidArgumentException('Not enough arguments are passed');
        }
        return $this->arguments[$index];
    }
}
