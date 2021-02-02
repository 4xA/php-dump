<?php

namespace Commands;

use App\AbstractCommand;
use App\CSV\CsvHandler;

class PrintCSV extends AbstractCommand
{
    public function execute()
    {
        $csvHandler = new CsvHandler($this->argument(0));
        print_r($csvHandler->toArray());
    }
}
