<?php

namespace Commands;

use App\AbstractCommand;
use DirectoryIterator;
use FilesystemIterator;
use InvalidArgumentException;
use RecursiveDirectoryIterator;
use RecursiveIteratorIterator;

class ListFiles extends AbstractCommand
{
    public function execute()
    {
        $path = $this->argument(0);

        if (!file_exists($path)) {
            throw new InvalidArgumentException('Path does not exist');
        }

        $dir = new DirectoryIterator($path);

        printf('-> Notice: using DirectoryIterator%s%s', PHP_EOL, PHP_EOL);

        foreach ($dir as $key => $file) {
            if ($file->isFile()) {
                printf('[%s => %s] is a file%sClass Type: %s%s', $key, $file->getPathname(), PHP_EOL, get_class($file), PHP_EOL);
            } else {
                printf('[%s => %s] is a directory%sClass Type: %s%s', $key, $file->getPathname(), PHP_EOL, get_class($file), PHP_EOL);
            }
        }

        echo PHP_EOL;
        printf('-> Notice: using RecursiveDirectoryIterator%s%s', PHP_EOL, PHP_EOL);

        $dir = new FilesystemIterator($path);

        foreach ($dir as $key => $file) {
            printf('[%s => %s] is a file%sClass Type: %s%s', $key, $file->getPathname(), PHP_EOL, get_class($file), PHP_EOL);
        }

        echo PHP_EOL;
        printf('-> Notice: using FilesystemIterator%s%s', PHP_EOL, PHP_EOL);

        $dir = new RecursiveDirectoryIterator($path);
        $dir->setFlags(FilesystemIterator::UNIX_PATHS | FilesystemIterator::SKIP_DOTS);

        $dir = new RecursiveIteratorIterator($dir, RecursiveIteratorIterator::SELF_FIRST);
        $dir->setMaxDepth(1);

        foreach ($dir as $key => $file) {
            printf('[%s => %s] is a file%sClass Type: %s%s', $key, $file->getPathname(), PHP_EOL, get_class($file), PHP_EOL);
        }
    }
}
