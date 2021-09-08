<?php

namespace App\Classes;

use App\Interfaces\IRobot;
use App\Classes\Robot;

class Merge implements \App\Interfaces\IMerge
{

    private $robots = array();

    private static $frankenstein;

    public function __construct(){
        $this->frankenstein = new Robot();
    }

    public function addRobot(IRobot $robot)
    {
        array_push($this->robots, $robot);
    }

    public function create()
    {
        if( empty($this->robots) ) {
            throw new \Exception('Нету с чего делать франкенштейна :)');
        }

        foreach ($this->robots as $robot) {
            if (
                is_null($this->frankenstein->get('speed')) ||
                ( !is_null($this->frankenstein->get('speed')) && $this->frankenstein->get('speed') > $robot->get('speed') )
            ) {
                $this->frankenstein->set('speed', $robot->get('speed'));
            }

            if( is_null($this->frankenstein->get('weight')) ) {
                $this->frankenstein->set('weight', $robot->get('weight'));
            } else {
                $sum = $this->frankenstein->get('weight') + $robot->get('weight');
                $this->frankenstein->set('weight', $sum);
            }
        }

        // Defaults param
        $this->frankenstein->set('name', 'Frankenstein');
        $this->frankenstein->set('height', 50);

        return $this->frankenstein;
    }
}