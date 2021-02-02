<?php

namespace App;

class DataStore
{
    public $log;

    private $data = [];

    public function __construct($log = null)
    {
        $this->log = $log;
    }

    public function __set($name, $value)
    {
        $this->data[$name] = $value;
    }

    public function __get($name)
    {
        return $this->data[$name];
    }

    public function __clone()
    {
        $this->log = clone $this->log;
    }
}
