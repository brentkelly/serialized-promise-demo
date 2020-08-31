<?php

require __DIR__ . '/vendor/autoload.php';

use Services\Store;

$id = array_pop($argv);
(new Store($id))
	->retrieve()
	->resolve('fantastic');