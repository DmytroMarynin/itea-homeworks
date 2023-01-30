<?php

namespace HwOop\Cars;

use HwOop\Classes\Car;

class Track extends Car
{

    protected function setCarType()
    {
        self::$type = 'Track';
    }

    public function start($before = '', $after = '') {
        $before .= PHP_EOL .
            '   o_______________}o{' . PHP_EOL .
            '   |              |   \\' . PHP_EOL .
            '   |    911       |____\_____' . PHP_EOL .
            '   | _____        |    |_o__ |' . PHP_EOL .
            '   [/ ___ \       |   / ___ \|' . PHP_EOL .
            '  []_/.-.\_\______|__/_/.-.\_[]' . PHP_EOL .
            '     |(O)|             |(O)|' . PHP_EOL .
            '      \'-\'   ScS         \'-\'' . PHP_EOL ;

        parent::start($before, '');
    }

}