<?php

namespace Commands;

use App\AbstractCommand;
use Exception;
use GlobIterator;

class ListFilesByPattern extends AbstractCommand
{
    public function execute()
    {
        $path = $this->argument(0);

        if (!file_exists($path)) {
            throw new Exception('Path not found');
        }

        $files = new GlobIterator($path);

        foreach ($files as $file) {
            echo $file->getPathname() . PHP_EOL;
        }
    }
}
