<?php

include_once "../vendor/autoload.php";

$transmission_default_array = [
    '1' => [
        "max" => 20,
        "min" => 0,
        "step" => 1
    ],
    '2' => [
        "max" => 40,
        "min" => 20,
        "step" => 2
    ],
    '3' => [
        "max" => 70,
        "min" => 40,
        "step" => 3
    ],
    '4' => [
        "max" => 120,
        "min" => 70,
        "step" => 4
    ],
    '5' => [
        "max" => 168,
        "min" => 120,
        "step" => 5
    ]
];
$default_type = 'default';

$cars['bus'] = new \HwOop\Cars\Bus(new \HwOop\Classes\Engine($default_type), new \HwOop\Classes\Transmission($default_type, $transmission_default_array));
$cars['cabriolet'] = new \HwOop\Cars\Cabriolet(new \HwOop\Classes\Engine($default_type), new \HwOop\Classes\Transmission($default_type, $transmission_default_array));
$cars['pick_up'] = new \HwOop\Cars\PickUp(new \HwOop\Classes\Engine($default_type), new \HwOop\Classes\Transmission($default_type, $transmission_default_array));
$cars['track'] = new \HwOop\Cars\Track(new \HwOop\Classes\Engine($default_type), new \HwOop\Classes\Transmission($default_type, $transmission_default_array));

$stop = 2;
$start = 4;

foreach ($cars as $car) {
    $car->start();

    // try to make not logic things #1
    $err = rand(1, 6);
    if ($err == $stop) {
        $car->stop();
    } elseif ($err == $start) {
        $car->stop();
    }

    for ($i=0; $i<5; $i++) {
        if (rand(1,2) == 2) {
            $car->up();
        } else {
            $car->down();
        }
    }

    // try to make not logic things #2
    $err = rand(1, 6);
    if ($err == $stop) {
        $car->stop();
    } elseif ($err == $start) {
        $car->stop();
    }

    $car->stop();
}