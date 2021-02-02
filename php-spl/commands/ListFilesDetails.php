<?php

namespace Commands;

use App\AbstractCommand;
use FilesystemIterator;
use InvalidArgumentException;

class ListFilesDetails extends AbstractCommand
{
    public function execute()
    {
        $path = $this->argument(0);

        if (!file_exists($path)) {
            throw new InvalidArgumentException('Path does not exist');
        }

        $filesystemIterator = new FilesystemIterator($path);

        $filesystemIterator->setFlags(FilesystemIterator::UNIX_PATHS);

        foreach ($filesystemIterator as $file) {
            printf(
                <<<EOF
                Path: %s
                Path Info: %s
                Size: %s
                Type: %s
                Is File: %s
                Owner: %s%s
                EOF,
                $file->getPath(),
                $file->getPathName(),
                $file->getSize(),
                $file->getType(),
                $file->isFile() ? 'true' : 'false',
                $file->getOwner(),
                PHP_EOL
            );
            echo PHP_EOL;
        }
    }
}
