<?php

namespace App;

class PriorityVector
{
    protected int $priority;
    protected $value;

    public function __construct($priority, $value)
    {
        $this->priority = $priority;
        $this->value = $value;
    }

    public function getPriority()
    {
        return $this->priority;
    }

    public function getValue()
    {
        return $this->value;
    }
}
