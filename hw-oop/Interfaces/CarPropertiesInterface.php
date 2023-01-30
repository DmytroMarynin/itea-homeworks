<?php

namespace HwOop\Interfaces;

interface CarPropertiesInterface {

    /**
     * Property type setter
     * @param string $type
     */
    public function setType(string $type);

    /**
     * Property type getter
     * @return mixed
     */
    public function getType();

}