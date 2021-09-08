<?php

namespace App\Classes;

use App\Interfaces\IRobot;

class Robot implements IRobot
{

    private $params = array();

    public function __construct()
    {
        $this->params = array(
            'height' => null,
            'weight' => null,
            'speed' => null,
            'name' => null
        );
    }

    /**
     * @param string $param
     * @param  $value
     * @return mixed
     */
    public function set(string $param, $value)
    {
        if( array_key_exists($param, $this->params) ) {
            if( !empty($value) ) {
                $this->params[$param] = $value;
            } else {
                throw new \Exception('Не указано значение параметра [' . $param . ']');
            }
        } else {
            throw new \Exception('Не правильно указан параметр [' . $param . ']');
        }
        return true;
    }

    /**
     * @param string $param
     * @return mixed
     */
    public function get(string $param)
    {
        if( array_key_exists($param, $this->params) ) {
            return $this->params[$param];
        } else {
            throw new \Exception('Нету указаного параметра [' . $param . ']');
        }
    }

    public function getAllParams() {
        return $this->params;
    }

    /**
     * @return mixed
     */
    public function getRobot()
    {
        foreach ($this->params as $param => $value) {
            if( empty($value) ) throw new \Exception('Не указан параметр [' . $param . ']');
        }
        return $this;
    }
}