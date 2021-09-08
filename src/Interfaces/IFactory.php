<?php

namespace App\Interfaces;

interface IFactory {

    public function addType(string $name, IRobot $value);

    public function create(string $typeName, int $count);

}
