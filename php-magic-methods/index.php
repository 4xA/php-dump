<?php

/**
 * Here I am demonstrating the use of magic methods to manipulate objects
 */

require __DIR__ . '/vendor/autoload.php';

use App\DataStore;
use App\Logger\FileLog;

$log = new FileLog();
$log->path = "/logs";

$dataStore = new DataStore($log);

$dataStore->datum = "m,czkjads";

$copyDataStore = clone $dataStore;

$dataStore->datum = "clear_text";
$log->path = "/var/logs";

print_r($dataStore);
print_r($copyDataStore);

