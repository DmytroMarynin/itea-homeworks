<?php

namespace HwOop\Classes;

use HwOop\Interfaces\EngineInterface;
use HwOop\Interfaces\MovableInterface;
use HwOop\Interfaces\TransmissionInterface;

abstract class Car implements MovableInterface
{

    protected $engine;
    protected $transmission;
    protected $state = false;

    protected static $type = '';
    protected $max_speed = 0;
    protected $current_speed = 0;


    public function __construct(EngineInterface $engine, TransmissionInterface $transmission)
    {
        $this->engine = $engine;
        $this->transmission = $transmission;
        $this->setCarType();
        $this->max_speed = $this->transmission->getTransmissionMaxSpeed();

    }

    abstract protected function setCarType();

    public function start($before = '', $after = '')
    {
        if ($this->state === false) {
            $this->transmission->setTransmissionStep(1);
            $this->state = true;
            echo
                (($before) ? $before . PHP_EOL : '')
                . " Car type " . self::getType()
                . ' is start it engine (' . $this->engine->getType() . ")" . PHP_EOL
                . ' with transmission type ' . $this->transmission->getType() . ". Set transmissions step to " . $this->transmission->getCurrentTransmissionStep()['step'] . '.' . PHP_EOL
                . ' Max car speed is ' . $this->max_speed . " km / hour." . PHP_EOL
                . (($after) ? $after . PHP_EOL : '');
        } else {
            echo "Car is already started. You can move up or down";
        }
    }

    public function stop($before = '', $after = '')
    {
        if ($this->state === true) {
            $this->transmission->setTransmissionStep(1);
            $this->state = false;
            $this->current_speed = 0;
            echo
                (($before) ? $before . PHP_EOL : '')
                . PHP_EOL . " Car type " . self::getType()
                . ' is stop it engine (' . $this->engine->getType() . ")" . PHP_EOL
                . ' with transmission type ' . $this->transmission->getType() .
                ". Transmissions step is " . $this->transmission->getCurrentTransmissionStep()['step'] . '.' . PHP_EOL
                . (($after) ? $after . PHP_EOL : '');
        } else {
            echo "Car is already stopped." . PHP_EOL;
        }
    }

    public function up()
    {
        if ($this->state === false) {
            $this->start();
        }

        echo PHP_EOL . PHP_EOL . 'Try to change speed up to 20 km per hour more' . PHP_EOL;

        if ($this->max_speed > $this->current_speed + 20) {
            $new_speed = $this->current_speed + 20;
        } else {
            echo "Can't make speed up to " . ($this->current_speed + 20) . ". Max car speed is " . $this->max_speed . PHP_EOL;
            echo 'Try to change speed up to max car speed.' . PHP_EOL;
            $new_speed = $this->max_speed;
        }


        if ($this->transmission->changeStepBySpeed($this->current_speed, $new_speed) === true) {
            $this->thinking();
            echo 'Transmission step changed. New step is ' . $this->transmission->getCurrentTransmissionStep()['step'] . PHP_EOL;
        }

        $this->current_speed = $new_speed;
        echo "Current speed is " . $this->current_speed;
    }

    public function down()
    {
        if ($this->state === false) {
            $this->start();
        }

        echo PHP_EOL . PHP_EOL . 'Try to change speed down to 20 km per hour.' . PHP_EOL;

        if (0 <= $this->current_speed - 20) {
            $new_speed = $this->current_speed - 20;
        } else {
            echo 'Can\'t make speed down. Min car speed is 0 and current speed is ' . $this->current_speed . '.' . PHP_EOL;
            if ($this->current_speed != 0) {
                echo 'Try to change speed up to min car speed.' . PHP_EOL;
            }
            $new_speed = 0;
        }


        if ($this->transmission->changeStepBySpeed($this->current_speed, $new_speed) === true) {
            $this->thinking();
            echo 'Transmission step changed. New step is ' . $this->transmission->getCurrentTransmissionStep()['step'] . PHP_EOL;
        }

        $this->current_speed = $new_speed;
        echo "Current speed is " . $this->current_speed . PHP_EOL;
    }

    public function getMaxSpeed($before = '', $after = '') {
        return $this->max_speed;
    }

    public static function getType() {
        return self::$type;
    }

    protected function thinking() {
        echo PHP_EOL . 'make changes.';
        for($i=0; $i < 2; $i++) {
            $nano = time_nanosleep(1,0);
            if ($nano === true) {
                echo '.';
            }
        }
        echo PHP_EOL;
        time_nanosleep(1, 0);
    }
}