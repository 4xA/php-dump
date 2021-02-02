<?php

namespace App\CSV;

use Exception;
use SplFileObject;

class CsvHandler
{
    protected $path;

    public function __construct($path)
    {
        if (is_null($path) || !file_exists($path)) {
            throw new Exception('invalid path');
        }
        $this->path = $path;
    }

    public function toArray()
    {
        $array = [];

        $file = new SplFileObject($this->path);
        $file->setFlags(SplFileObject::READ_CSV);

        $columns = $file->current();

        $isHeader = true;

        foreach ($file as $line) {
            if ($isHeader) {
                $isHeader = false;
                continue;
            }
            $i = 0;
            $row = [];
            foreach ($line as $column) {
                $row[$columns[$i++]] = $column;
            }
            $array[] = $row;
        }

        return $array;
    }
}
