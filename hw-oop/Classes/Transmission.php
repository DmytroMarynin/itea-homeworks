<?php

namespace HwOop\Classes;

use HwOop\Interfaces\CarPropertiesInterface;
use HwOop\Interfaces\TransmissionInterface;

class Transmission implements CarPropertiesInterface, TransmissionInterface
{
    protected $type;
    protected $current_step;
    protected $steps;

    public function __construct($type, $steps)
    {
        $this->setType($type);
        $this->setTransmissionSteps($steps);
    }

    public function changeStepBySpeed(int $old_speed, int $new_speed) {
        $changed = false;
        if ($old_speed < $new_speed) {
            if (empty($this->current_step) || $this->current_step['max'] < $new_speed) {
                $max_speeds = $this->getTransmissionStepsBySpeed();
                if ($max_speeds) {
                    foreach ($max_speeds as $speed => $step) {
                        if ($speed > $new_speed) {
                            $this->setTransmissionStep($step);
                            $changed = true;
                            break;
                        }
                    }
                }

            }
        } else {
            if (0 < $new_speed || (!empty($this->current_step) && $this->current_step['min'] > $new_speed)) {
                $min_speeds = $this->getTransmissionStepsBySpeed(false);
                if ($min_speeds) {
                    $step_to_change = false;
                    foreach ($min_speeds as $speed => $step) {
                        if ($speed < $new_speed) {
                            $changed = true;
                            $step_to_change = $step;
                        }
                    }
                    if ($step_to_change != false && $changed == true) {
                        $this->setTransmissionStep($step_to_change);
                    }
                }
            }
        }

        return $changed;
    }

    public function setType(string $type)
    {
        if ($type) {
            $this->type = $type;
        } else {
            return false;
        }
        return true;
    }

    public function getType()
    {
        return $this->type;
    }

    public function setTransmissionSteps(array $steps)
    {
        if (!$this->validateSteps($steps)) {
            return false;
        }
        ksort($steps);
        $this->steps = $steps;
        return true;
    }

    public function setTransmissionStep(int $step_number)
    {
        if (empty($this->steps[$step_number])) {
            return false;
        }
        $this->current_step = $this->steps[$step_number];
        return $this->current_step;
    }

    public function getCurrentTransmissionStep()
    {
        return $this->current_step;
    }

    public function getTransmissionSteps()
    {
        return $this->steps;
    }

    public function getTransmissionStepsBySpeed(bool $max = true)
    {
        if (!$this->steps) {
            return false;
        }

        $param = ($max) ? 'max' : 'min';

        $steps_by_speed = array();
        foreach ($this->steps as $step) {
            $steps_by_speed[$step[$param]] = $step['step'];
        }

        return $steps_by_speed;
    }

    public function getTransmissionMaxSpeed()
    {
        return end($this->steps)['max'];
    }

    protected function validateSteps($steps)
    {
        if (!empty($this->steps)) {
            return false;
        }

        $error = false;

        foreach ($steps as $key => $step) {
            if ($key != $step['step'] || !is_int($step['max']) || !is_int($step['min'])) {
                $error = true;
                break;
            }
        }

        return ($error === true) ? false : true;
    }
}