<?php

namespace HwOop\Cars;

use HwOop\Classes\Car;

class Bus extends Car
{

    protected function setCarType()
    {
        self::$type = 'Bus';
    }

    public function start($before = '', $after = '') {
        $before .= PHP_EOL .
            '                                __ ' . PHP_EOL .
            '        .-----------------------\'  |' . PHP_EOL .
            '       /| _ .---. .---. .---. .---.|' . PHP_EOL .
            '       |j||||___| |___| |___| |___||' . PHP_EOL .
            '       |=|||=======================|' . PHP_EOL .
            '       [_|j||(O)\__________|(O)\___] ' . PHP_EOL ;

        parent::start($before, '');
    }

}