<?php

namespace HwOop\Cars;

use HwOop\Classes\Car;

class Cabriolet extends Car
{

    protected function setCarType()
    {
        self::$type = 'Cabriolet';
    }

    public function start($before = '', $after = '') {
        $before .= PHP_EOL .
            '                  .' . PHP_EOL .
            '    __            |\\' . PHP_EOL .
            ' __/__\___________| \_' . PHP_EOL .
            '|   ___    |  ,|   ___`-.' . PHP_EOL .
            '|  /   \   |___/  /   \  `-.' . PHP_EOL .
            '|_| (O) |________| (O) |____|' . PHP_EOL .
            '   \___/          \___/' . PHP_EOL;

        parent::start($before, '');
    }

}