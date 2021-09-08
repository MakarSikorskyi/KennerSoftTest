<?php

namespace App\Classes;

use App\Interfaces\IRobot;
use App\Classes\Robot;

class Factory implements \App\Interfaces\IFactory
{
    private $types = array();
    private $robots = array();

    public function __construct()
    {
        $this->types = array();
        $this->robots = array();
    }

    public function addType(string $name, IRobot $value)
    {
        if( array_key_exists($name, $this->types) ) {
            throw new \Exception('Такой тип робота уже существует [' . $name . ']');
        }
        $this->types[$name] = $value;
        return true;
    }

    public function create(string $typeName, int $count = 1)
    {
        if( empty($this->types) ) {
            throw new \Exception('Не были задекларированы какие-либо типы роботов!');
        }
        if( !array_key_exists($typeName, $this->types) ) {
            throw new \Exception('Такой тип робота не существует [' . $typeName . ']');
        }

        for ($i = 0; $i < $count; $i++) {
            $this->robots[] = $this->types[$typeName]->getRobot();
        }
        return $this->robots;
    }
}