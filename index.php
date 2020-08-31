<?php

require __DIR__ . '/vendor/autoload.php';

// use Services\Store;
use Services\Guest;

$id = (new Guest('Andrew'))->welcome();
echo "Saved guest to $id\n";
echo "To resolve the promise in a separate thread run: php resolve.php $id\n";