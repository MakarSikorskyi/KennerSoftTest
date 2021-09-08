<?php
require_once __DIR__ . '/vendor/autoload.php';

use App\Classes\Robot;
use App\Classes\Factory;
use App\Classes\Merge;

function msg($text) {
    echo PHP_EOL.$text.PHP_EOL;
}

msg( '---- Start ----' );

$robot = new Robot();
$robot->set('name', 'Ninja');
$robot->set('speed', 50);
$robot->set('weight', 5);
$robot->set('height', 25);

$robot2 = new Robot();
$robot2->set('name', 'Killer');
$robot2->set('speed', 5);
$robot2->set('weight', 50);
$robot2->set('height', 25);


$factory = new Factory();
$factory->addType('Ninja', $robot);

msg('---- Factory ----');
$facRobot = $factory->create('Ninja', 2);
var_dump($facRobot);

msg('---- Merge ----');

$mergeRobot = new Merge();

var_dump($robot->getAllParams());
$mergeRobot->addRobot($robot);

$mergeRobot->addRobot($robot2);

foreach ($facRobot as $item) {
    $mergeRobot->addRobot($item);
}
$merge = $mergeRobot->create();
var_dump($merge->getAllParams());