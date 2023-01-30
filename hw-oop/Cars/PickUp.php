<?php

namespace HwOop\Cars;

use HwOop\Classes\Car;

class PickUp extends Car
{

    protected function setCarType()
    {
        self::$type = 'Pick-Up';
    }

    public function start($before = '', $after = '') {
        $before .= PHP_EOL .
            '                                  .------. ' . PHP_EOL .
            '                                 :|||"""`.`.' . PHP_EOL .
            '                                 :|||     7.`.' . PHP_EOL .
            '              .===+===+===+===+===||`----L7\'-`7`---.._' . PHP_EOL .
            '              []                  || ==       |       """-.' . PHP_EOL .
            '              []...._____.........||........../ _____ ____|' . PHP_EOL .
            '             c\____/,---.\_       ||_________/ /,---.\_  _/' . PHP_EOL .
            '                /_,-/ ,-. \ `._____|__________||/ ,-. \ \_[' . PHP_EOL .
            '                   /\ `-\' /                    /\ `-\' /' . PHP_EOL .
            '                     `---\'                       `---\'' . PHP_EOL ;

        parent::start($before, '');
    }

}