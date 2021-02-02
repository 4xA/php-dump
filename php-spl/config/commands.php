<?php

use Commands\DumpFileContents;
use Commands\PrintCSV;
use Commands\ListFiles;
use Commands\ListFilesByPattern;
use Commands\ListFilesByRegex;
use Commands\ListFilesDetails;

return [
    'PrintCSV' => PrintCSV::class,
    'DumpFileContents' => DumpFileContents::class,
    'ListFiles' => ListFiles::class,
    'ListFilesDetails' => ListFilesDetails::class,
    'ListFilesByPattern' => ListFilesByPattern::class,
    'ListFilesByRegex' => ListFilesByRegex::class,
];
