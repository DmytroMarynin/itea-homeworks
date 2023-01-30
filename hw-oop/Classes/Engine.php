<?php

namespace HwOop\Classes;

use HwOop\Interfaces\CarPropertiesInterface;
use HwOop\Interfaces\EngineInterface;

class Engine implements CarPropertiesInterface, EngineInterface
{
    private $type;

    public function __construct($type = null)
    {
        $this->setType($type ?? 'default');
        $this->type = $type;
    }

    public function setType(string $type = 'default')
    {
        $this->type = $type;
    }

    public function getType()
    {
        return $this->type;
    }

}