<?php

namespace Commands;

use App\AbstractCommand;
use FilesystemIterator;
use InvalidArgumentException;
use RegexIterator;

class ListFilesByRegex extends AbstractCommand
{
    public function execute()
    {
        $path = $this->argument(0);
        $regex = $this->argument(1);

        if (!file_exists($path)) {
            throw new InvalidArgumentException('Path does not exists');
        }

        $files = new FilesystemIterator($path);

        $regexIterator = new RegexIterator($files, $regex);

        foreach ($regexIterator as $file) {
            echo $file->getPathname() . PHP_EOL;
        }
    }
}
