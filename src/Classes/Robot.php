<?php

namespace App\Classes;

use App\Interfaces\IRobot;

class Robot implements IRobot
{

    private static $params = array();

    public function __construct() {
        self::$params = array(
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
        if( array_key_exists($param, self::$params) ) {
            if( !empty($value) ) {
                self::$params[$param] = $value;
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
        if( array_key_exists($param, self::$params) ) {
            return self::$params[$param];
        } else {
            throw new \Exception('Нету указаного параметра [' . $param . ']');
        }
    }

    /**
     * @return mixed
     */
    public function getRobot()
    {
        foreach (self::$params as $param => $value) {
            if( empty($value) ) throw new \Exception('Не указан параметр [' . $param . ']');
        }
        return $this;
    }
}