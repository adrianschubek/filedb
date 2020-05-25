<?php

use adrianschubek\FileDb\Exceptions\TableNotFound;
use adrianschubek\FileDb\FileDb;

require __DIR__ . "/../vendor/autoload.php";

$db = new FileDb(__DIR__ . "/testdb");

$db->rawEncode("user", "aabb");
