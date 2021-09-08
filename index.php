<?php
require_once __DIR__ . '/vendor/autoload.php';

use App\Classes\Robot;

echo 'Start';

$robot = new Robot();

$robot = $robot->getRobot();

var_dump($robot);