<?php

namespace App\Interfaces;

interface IRobot {

    public function set(string $param, $value);

    public function get(string $param);

    public function getRobot();

}
