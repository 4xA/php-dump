<?php

namespace Commands;

use App\AbstractCommand;
use InvalidArgumentException;
use SplFileObject;

class DumpFileContents extends AbstractCommand
{
    public function execute()
    {
        $path = $this->argument(0);

        if (!file_exists($path)) {
            throw new InvalidArgumentException('Path does not exist');
        }

        $file = new SplFileObject($path, 'r');

        foreach ($file as $line) {
            echo $line;
        }

        echo PHP_EOL;

        $file->seek(1);

        echo 'line 2: ' . $file->current();
    }
}
