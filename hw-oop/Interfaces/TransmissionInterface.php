<?php

namespace HwOop\Interfaces;

interface TransmissionInterface
{

    /**
     * array $steps - associated array, need for set steps
     * params of $steps are (int)"step" => ["max" => "int", "min" => "int", "step" => "int"]
     * @return mixed
     */
    public function setTransmissionSteps(array $steps);

    public function changeStepBySpeed(int $old_speed, int $new_speed);

    public function setTransmissionStep(int $step_number);

    public function getCurrentTransmissionStep();

    public function getTransmissionSteps();

    /**
     * Make array by speed with steps.
     * @param bool $max where true => 'max' speed array and false => 'min' speed array
     * @return array|false
     */
    public function getTransmissionStepsBySpeed(bool $max = true);

    public function getTransmissionMaxSpeed();

}